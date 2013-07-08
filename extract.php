<?php

require_once('GifFrameExtractor.php');

if(!isset($gifFilePath))
{
    die("No gif path provided.");
}

if(!GifFrameExtractor\GifFrameExtractor::isAnimatedGif($gifFilePath))
{
    die("File is not an animated gif.");
}

$gfe = new GifFrameExtractor\GifFrameExtractor();
$gfe->extract($gifFilePath);

$dimensions = $gfe->getFrameDimensions();
$width = $dimensions[0]['width'];
$height = $dimensions[0]['height'];

$frameCount = $gfe->getFrameNumber();

$tilesheet = imagecreate($width * $frameCount, $height);

$red = imagecolorallocate($tilesheet, 255, 0, 0);
imagecolortransparent($tilesheet, $red);

$x = 0;
$y = 0;

foreach ($gfe->getFrames() as $frame) {
    $frame = $frame['image'];
    imagecopy($tilesheet, $frame, $x, $y, 0, 0, $width, $height);
    $x += $width;
}

header( "Content-type: image/png" );
imagepng($tilesheet);
imagedestroy($tilesheet);

?>