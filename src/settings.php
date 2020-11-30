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
				'client_id' => 'cb6d63393ada49bf8858ed035c0742df',
				'client_secret' => '665df8f63d634daca9de007287ac1f22',
				'access_token' => 'BQAFHJ7u2-QpBy--WD0h3N4A4nxjrnEH035FF6ZKi1CB4QoDeXQIP6MJxCQkryXMvFp9nQ-LFNRKssgTZNo',
			],
		],
	];
