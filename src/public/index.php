<?php
	
	use Slim\App;
	
	require '../vendor/autoload.php';
	
	session_start();
	
	// Instantiate the app
	$settings = require __DIR__ . '/../settings.php';
	$app = new App($settings);
	
	// Set up dependencies
	require __DIR__ . '/../dependencies.php';
	
	$container = $app->getContainer();
	
	// Register my App
	require __DIR__ . '/../app/app_loader.php';
	
	$app->run();
