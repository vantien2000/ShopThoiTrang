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
?>