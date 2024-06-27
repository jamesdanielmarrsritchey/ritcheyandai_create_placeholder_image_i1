<?php
$location = realpath(dirname(__FILE__));
require_once $location . '/function.php';
$width = 512;
$height = 512;
$format = 'jpeg';
$filePath = $location . '/example.jpeg';
$return = generateRandomImageToFile($width, $height, $format, $filePath);
var_dump($return);