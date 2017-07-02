<?php
require_once './ResizeImages.php';
use Resizer\ResizeImages;

$images = new FilesystemIterator('../source');
$images = new RegexIterator($images, '/(?<!watermark|_rotated)\.(jpg|png|gif|webp)$/');
$originals = [];
foreach ($images as $image){
	$originals[] = $image->getFileName();
}
// print_r($originals);
try{
	/*
		Make sure you have a folder named source that contains the images you want to resize / scale / watermark!
		Also create a folder name output that will later contain the output files, or change the pathing
	*/
	$resize = new ResizeImages($originals, './source');
	$resize->setOutputSizes([400,500,600,750]);
	$resize->watermark('./source/watermark.png');
	$result = $resize->outputImages('./output');
	if($result['output']){
		echo 'The following images were generated: <br>';
		echo '<ul>';
		foreach($result['output'] as $output){
			echo "<li>$output</li>";
		}
		echo '</ul>';
	}

}catch(Exception $e){
	echo $e->getMessage();
}