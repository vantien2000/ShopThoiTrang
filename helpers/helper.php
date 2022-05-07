<?php
    if (!function_exists('covert_image_webp')) {
        function convert_image_webp($image, $width, $height) {
            //đổi đuôi file sang webp
            $image_webp = Image::make($image)->encode('webp', 90)->resize($width, $height);
            //format base 64
            return $image_webp;
        }
    }

    if (!function_exists('get_name_image')) {
        function get_name_image($image_name) {
            //đổi đuôi file sang webp
            $image_name_not_extention = substr($image_name, 0, strpos($image_name, '.'));
            //format base 64
            return $image_name_not_extention;
        }
    }

    if (!function_exists('price_sale')) {
        function price_sale($price, $sale) {
            return $price*(1 - $sale/100);
        }
    }

    if (!function_exists('sub_total')) {
        function sub_total($array) {
            $subtotal = 0;
            foreach ($array as $item) {
                $subtotal += $item['quantity'] * price_sale($item['products']['price'], $item['products']['sale']);
            }
            return $subtotal;
        }
    }

    if (!function_exists('total_order')) {
        function subtotal_order($ordersDetails) {
            $subtotal = 0;
            foreach ($ordersDetails as $detail) {
                $subtotal += $detail->quantity * price_sale($detail->products->price, $detail->products->sale);
            }
            return $subtotal;
        }
    }

    if (!function_exists('format_price_filter')) {
        function format_price_filter($price) {
            $arr_price = explode('-', $price);
            $output = number_format((double)$arr_price[0], 0, ',' , '.') . '<sup>vnđ</sup>' . ' - ' . number_format((double)$arr_price[1], 0, ',' , '.') . '<sup>vnđ</sup>';
            return $output;
        }
    }
?>