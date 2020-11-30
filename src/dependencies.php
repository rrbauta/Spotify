<?php
	
	use App\controller\AlbumController\AlbumController;
	use GuzzleHttp\Client;
	
	// DIC configuration
	$container = $app->getContainer();
	
	// monolog
	$container['logger'] = function ($container) {
		$settings = $container->get('settings')['logger'];
		$logger = new Monolog\Logger($settings['name']);
		$logger->pushProcessor(new Monolog\Processor\UidProcessor());
		$logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
		
		return $logger;
	};
	
	//Guzzle HTTP client
	$container['guzzleClient'] = function ($container) {
		$headers = [
			'Authorization' => 'Bearer ' . $container->get('settings')['spotify']['access_token'],
		];
		
		return new Client(['base_uri' => $container->get('settings')['spotify']['base_url'], 'headers' => $headers]);
	};

