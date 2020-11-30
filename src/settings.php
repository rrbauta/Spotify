<?php
	return [
		'settings' => [
			'displayErrorDetails' => true,
			
			// Renderer settings
			'renderer' => [
				'template_path' => __DIR__ . '/../templates/',
			],
			
			// Monolog settings
			'logger' => [
				'name' => 'slim-app',
				'path' => __DIR__ . '/../src/logs/app.log',
			],
			
			// Spotify settings
			'spotify' => [
				'base_url' => 'https://api.spotify.com/v1',
				'token_url' => 'https://accounts.spotify.com/api/token',
				'clientId' => 'cb6d63393ada49bf8858ed035c0742df',
				'clientSecret' => '665df8f63d634daca9de007287ac1f22',
			],
		],
	];
