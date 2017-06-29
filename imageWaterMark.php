<?php
$original = ".resize/hoover.jpg";
$destination = './output/';

$sizes = [	//all sizes are width
	'small'		=> 300,
	'small@2'	=> 600,
	'large' 	=> 450,
	'large@2'	=> 900
];

$resource = imagecreatefromjpeg($original); //create switch case here depending on image type

$w = imagesx($resource);
$h = imagesy($resource);


$markW = 900; //width of image being used
$markH = 100; //height of image being used
$marginBottom = $marginRight = 30;

$watermark = imagecreatefrompng('.resize/watermark.png');

imagecopy($resource, $watermark, ($w - $markW - $marginRight), ($h - $markH - $marginBottom), 0, 0, $markW, $markH);

foreach ($sizes as $name => $size){
	$scaled = imagescale($resource,$size);
	$h2 = imagesy($scaled);

	imagejpeg($scaled, $destination . 'hoover_rs_' . $name . '.jpg', 100);//change?? switch??

	imagedestroy($scale);
}

imagedestroy($resource);
imagedestroy($watermark);