<?php

function thumb($path, $side = 250) {

    $info = pathinfo($path);
    $file = basename($path, '.' . $info['extension']);

    $new_img_file = $info['dirname'] . '/' . $file . '_thumb.jpg';
    
    if (file_exists($new_img_file)) {
        return $new_img_file;
    }

    $info = getimagesize($path);
    $w = $info[0];
    $h = $info[1];
    $mime = $info['mime'];

    if ($w > $h) {
        $h = round($h / floatval($w / $side));
        $w = $side;

        $left = 0;
        $top = round(($side - $h) / 2);
    } elseif ($h > $w) {
        $w = round($w / floatval($h / $side));
        $h = $side;

        $left = round(($side - $w) / 2);
        $top = 0;
    } else {
        $w = $side;
        $h = $side;
        $left = 0;
        $top = 0;
    }

    switch ($mime) {
        case 'image/jpeg':
            $img_original = imagecreatefromjpeg($path);
            break;
        case 'image/png':
            $img_original = imagecreatefrompng($path);
            break;
    }

    $img_dest = imagecreatetruecolor($side, $side);
    $color = imagecolorallocate($img_dest, 255, 255, 255);
    imagefill($img_dest, 0, 0, $color);

    imagecopyresampled($img_dest, $img_original, $left, $top, 0, 0, $w, $h, imagesx($img_original), imagesy($img_original));

    imagejpeg($img_dest, $new_img_file, 100);
    
    return $new_img_file;

}
