<?php
$image = './source/pelican.webp';
$compression = 75;
$resource = imagecreatefromwebp($image);
imagejpeg($resource,'./output/pelican.jpg',$compression);

imagedestroy($resource);
