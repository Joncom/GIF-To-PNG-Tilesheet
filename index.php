<?php

namespace GifFrameExtractor;
require_once('GifFrameExtractor.php');

$gifFilePath = 'circle25.gif';

if (GifFrameExtractor::isAnimatedGif($gifFilePath)) { // check this is an animated GIF

    $gfe = new GifFrameExtractor();
    $gfe->extract($gifFilePath);

    $dimensions = $gfe->getFrameDimensions();
    $width = $dimensions[0]['width'];
    $height = $dimensions[0]['height'];

    $frameCount = $gfe->getFrameNumber();

    $tilesheet = imagecreate( $width * $frameCount, $height );

    $x = 0;
    $y = 0;

    foreach ($gfe->getFrames() as $frame) {

        $frame = $frame['image'];

        imagecopy($tilesheet, $frame, $x, $y, 0, 0, $width, $height);

        $x += $width;

    }

    header( "Content-type: image/png" );
    imagepng($tilesheet);



}

?>