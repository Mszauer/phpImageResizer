<?php
$original = "../../source/hoover.jpg";
$destination = '../../output/';

$sizes = [	//all sizes are width
	'small'		=> 300,
	'small@2'	=> 600,
	'large' 	=> 450,
	'large@2'	=> 900
];

$resource = imagecreatefromjpeg($original); //create switch case here depending on image type

$markW = 170;
$markH = 25;
$marginBottom = $marginRight = 10px; 

$watermark = imagecreatetruecolor($markW, $markH);
imagefilledrectangle($watermark	, 0, 0, $markW, $markH, 0x000000); 
imagestring($watermark, 5, 10, 5, '(c)', 0xFFFFFF); //text watermark, better with an image


foreach ($sizes as $name => $size){
	$scaled = imagescale($resource,$size);
	$h2 = imagesy($scaled);
	imagecopymerge($scaled, $watermark, $size - $markW - $marginRight, $h2 - $markH - $marginBottom, 0, 0, $markW, $markH, 50);

	imagejpeg($scaled, $destination . 'hoover_rs_' . $name . '.jpg', 100);//change?? switch??

	imagedestroy($scale);
}

imagedestroy($original);
imagedestroy($watermark);