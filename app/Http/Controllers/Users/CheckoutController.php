<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CheckoutRequest;
use App\Jobs\ApiProvincesJob;
use App\Jobs\SendMailInvoice;
use App\Mail\EmailInvoice;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\UserService;
use CKSource\CKFinder\Backend\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class CheckoutController extends Controller
{
    protected $userService, $orderService, $productService;
    public function __construct(UserService $userService, OrderService $orderService, ProductService $productService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
        $this->productService = $productService;
    }

    public function checkout(CheckoutRequest $request) {
        $email = $request->email;
        $result = '';
        $phone_number = $request->phone_number;
        $address = ApiProvincesJob::dispatchNow();
        $provinces = $address->where('code', $request->provinces)->first();
        $districts = collect($provinces['districts'])->where('code', $request->districts)->first();
        $wards = collect($districts['wards'])->where('code', $request->wards)->first();
        $address_ship = $request->home_number . '-' . $wards['name'] . '-' . $districts['name'] . '-' . $provinces['name'];
        $userOrder = $this->userService->getUserOrders($email, $phone_number);
        if (!$userOrder) {
            $error = 'Khách hàng không có trong hệ thống! Hãy đăng ký để thực hiện chức năng';
            $url = route('users.register');
            return response()->json(['error' => $error, 'url' => $url], 201);
        }
        if (session('carts')) {
            $carts = session('carts');
            $order['user_id'] = $userOrder->user_id;
            $order['order_date'] = now();
            $order['comments'] = $request->comment;
            $order['address_ship'] = $address_ship;
            $order['shipper_cost'] = sub_total((array) $carts) > 199000 ? 0 : 40000;
            if ($request->pay == PAY_COD) {
                $order['result'] = 1;
            }
            if ($request->pay == BANKING) {
                $orderAfterSave = $this->orderService->getOrderInsert();
                $order_id = $orderAfterSave->order_id + 1;
                $result = $this->bankingVNPay($order_id, $carts);
                $order['result'] = 2;
            }
            $this->orderService->storeOrder($order);
            $orderAfterSave = $this->orderService->getOrderInsert();
            foreach ($carts as $key => $value) {
                $orderDetail['order_id'] = $orderAfterSave->order_id;
                $orderDetail['product_id'] = explode('-', $key)[0];
                $orderDetail['quantity'] = $value['quantity'];
                
                $this->orderService->storeOrderDetails($orderDetail);
                $this->productService->changeQuantityProduct(explode('-', $key)[0], PRODUCT_ID_KEY, $value['quantity']);
            }
            session()->forget('carts');
            session()->forget('result');
            Mail::to($request->email)->send(new EmailInvoice($orderAfterSave));
            $result = !empty($result) ? $result : ['url' => route('users.home')];
            return response()->json($result);
        }
        $result = !empty($result) ? $result : ['data' => route('users.home')];
        return response()->json($result);
    }

    public function bankingVNPay($order_id, $carts) {
        $total = sub_total($carts) > 199000 ? sub_total($carts) + 40000 : sub_total($carts);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('users.banking');
        $vnp_TmnCode = "YJ0EY8A8";//Mã website tại VNPAY 
        $vnp_HashSecret = "WNJPNZKCJWXYLWQYRXVEVCSUHWWVJOZO"; //Chuỗi bí mật
        $vnp_TxnRef = $order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 
        $vnp_OrderInfo = 'Thanh Toán Đơn Hàng';
        $vnp_OrderType = 'Billpayment';
        $vnp_Amount =  $total * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef
    );
    
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }
    
    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);

        return $returnData;
        // vui lòng tham khảo thêm tại code demo
    }

    public function banking(Request $request) {
        $orderLast = $this->orderService->getOrderInsert(ORDER_ID_KEY);
        if (isset($request->vnp_ResponseCode)) {
            if ($request->vnp_ResponseCode == "00") {
                $this->orderService->updateResultOrder($orderLast->order_id, ORDER_ID_KEY, 2);
            } else {
                $this->orderService->deleteOrder($orderLast->order_id);
            }
        }
        return redirect()->route('users.cart');
    }
}
