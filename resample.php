<?php
$original = "../../source/hoover.jpg";
$destination = '../../output/';

$dimensions = getimagesize($original);

$width = $dimensions[0];
$height = $dimensions[1];

$ratios = [
	'small'		=> 300 / $width,
	'small@2'	=> 600 / $width,
	'large' 	=> 450 / $width,
	'large@2'	=> 900 / $width
];

$resource = imagecreatefromjpeg($original); //create switche case here depending on image type

foreach ($ratios as $name => $ratio){
	$w2 = $width * $ratio;
	$h2 = round($height * $ratio);
	$output = imagecreatetruecolor($w2, $h2);
	imagecopyresampled($output, $resource, 0, 0, 0, 0, $w2, $h2, $width, $height);

	imagejpeg($output, $destination . 'hoover_rs_' . $name . '.jpg', 100);//change?? switch??

	imagedestroy($output);
}

imagedestroy($original);



