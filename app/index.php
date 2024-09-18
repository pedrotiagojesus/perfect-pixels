<?php

function init()
{

	require_once("./Config/Config.class.php");

	$scriptStart = microtime(true);

	// Get images from input folder
	$imageProcessor = new ImageProcessor();
	$inputFileArr = $imageProcessor->getInputImage();

	$config = Config::getInstance();

	if (count($inputFileArr) == 0) {
		echo "No images work with!";
		echo PHP_EOL;
		die();
	}

	echo "Found " . count($inputFileArr) . " images!";
	echo PHP_EOL;

	foreach ($inputFileArr as $inputFile) {

		echo PHP_EOL;
		echo "--------------------------------" . PHP_EOL;
		echo "Loading image data - " . $inputFile;
		echo PHP_EOL;

		// Load image data 
		$imageClass = new Image();
		$imageData = $imageClass->load($config->get("path_image_input"), $inputFile);

		if (is_null($imageData)) {
			echo 'Error loading image!';
			echo PHP_EOL;
			continue;
		}

		$imageProcessor->processImage($imageData);
		echo PHP_EOL;
	}

	$scriptEnd = microtime(true);
	$scriptTime = number_format(($scriptEnd - $scriptStart), 2);

	echo PHP_EOL;
	echo 'Script in took ' .  $scriptTime . ' seconds';
	echo PHP_EOL;
}

spl_autoload_register(function ($className) {
	$namespace = str_replace("\\", "/", __NAMESPACE__);
	$className = str_replace("\\", "/", $className);
	$class = __DIR__ . "/src/" . (empty($namespace) ? "" : $namespace . "\\") . "{$className}.class.php";

	if (!is_file($class)) {
		return;
	}
	include_once($class);
});

spl_autoload_register();
init();
