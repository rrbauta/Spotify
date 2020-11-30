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
			'Authorization' => 'Bearer ' . 'BQDAkVyyhfh4T3P3MP9rFq962qZ4VdFlEe_w34PC4KqOgI-Dv6LrFv19dqpWpG7YPnb3C_pQEuXnIpiXcdg',
			//			'Accept' => 'application/json',
		];
		
		return new Client(['base_uri' => $container->get('settings')['spotify']['base_url'], 'headers' => $headers]);
	};

