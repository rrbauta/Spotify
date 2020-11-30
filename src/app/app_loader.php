<?php
	$base = __DIR__ . '/../app/';
	
	$folders = [
		'model',
		'lib',
		'route',
		'controller'
	];
	
	foreach ($folders as $f) {
		foreach (glob($base . "$f/*.php") as $k => $filename) {
			require $filename;
		}
	}

