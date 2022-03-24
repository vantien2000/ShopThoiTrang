<?php
    if (!function_exists('covert_image_webp')) {
        function convert_image_webp($image) {
            //get company string
            $image_str = basename($image->getClientOriginalName());
            //đổi đuôi file sang webp
            $image_webp = Image::make($image)->encode('webp', 90)->resize(200, 250);
            //format base 64
            return $image_webp->save(public_path('admins/images/'  .  $image_str . '.webp'));
        }
    }
?>