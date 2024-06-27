<?php
function generateRandomImageToFile($width, $height, $format, $filePath) {
    // Check if the specified format is supported
    if (!in_array($format, ['jpeg', 'png'])) {
        return false;
    }

    // Create a blank image with the specified dimensions
    $image = imagecreatetruecolor($width, $height);
    if (!$image) {
        return false;
    }

    // Populate the image with random pixels
    for ($x = 0; $x < $width; $x++) {
        for ($y = 0; $y < $height; $y++) {
            // Generate a random color
            $color = imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
            // Set the pixel color at (x, y)
            imagesetpixel($image, $x, $y, $color);
        }
    }

    // Generate the image file based on the specified format and save it to the specified path
    $result = false;
    switch ($format) {
        case 'jpeg':
            $result = imagejpeg($image, $filePath, 100); // Save to file
            break;
        case 'png':
            $result = imagepng($image, $filePath); // Save to file
            break;
    }

    // Free up memory
    imagedestroy($image);

    return $result;
}
?>