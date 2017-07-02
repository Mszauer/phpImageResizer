<?php

$image = "./";
$size = getImagesize($image);

if($size === false && mime_content_type($image) === 'image/webp'){
	$resource = imagecreatefromwebp($image);
	$size['w'] = imagesx($resource);
	$size['h'] = imagesy($resource);
	imagedestroy($resource);
}