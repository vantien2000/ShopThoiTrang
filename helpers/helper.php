<?php
    if (!function_exists('covert_image_webp')) {
        function convert_image_webp($image, $width, $height) {
            //đổi đuôi file sang webp
            $image_webp = Image::make($image)->encode('webp', 90)->resize($width, $height);
            //format base 64
            return $image_webp;
        }
    }
?>