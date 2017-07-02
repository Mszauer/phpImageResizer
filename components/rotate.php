<?php
$original = ".resize/hoover.jpg";
$destination = './output/';

//call check Orientation here


function checkJpegOrientation($image){
	$outputFile = $image;
	$exif = exif_read_data($image); //read metadata

	if (!empty($exif['Orientation'])){
		switch($exif['Orientation']){
			case 3: //upside down
				$angle = 180;
				break;
			case 6: //portrait
				$angle = -90;
				break;
			case 8://portrait
				$angle = 90;
				break;
			default:
				$angle = null;
		}

		if(!is_null($angle)){
			$original = imagecreatefromjpeg($image);
			$rotated = imagerotate($original, $angle, 0);
			$extension = pathinfo($image,PATHINFO_EXTENSION);
			$outputFile = str_replace(".$extension", '_rotated.jpeg', $image);

			imagejpeg($rotated, $outputFile, 100);

			imagedestroy($original);
			imagedestroy($rotated);
		}
	}
	return $outputFile;
}