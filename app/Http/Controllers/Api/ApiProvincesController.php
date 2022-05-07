<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiProvincesController extends Controller
{
    protected $address;
    public function __construct()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->request('GET', 'https://provinces.open-api.vn/api/?depth=3', ['verify' => false]);
        $this->address = collect(json_decode($request->getBody(), true));
    }

    public function showDistricts($id)
    {
        $provinces = $this->address->where('code', $id)->first();
        return response()->json($provinces['districts']);
    }

    public function showWards($provice_id, $district_id)
    {
        $provinces = $this->address->where('code', $provice_id)->first();
        $wards = collect($provinces['districts'])->where('code', $district_id)->first();
        return response()->json($wards['wards']);
    }


}
