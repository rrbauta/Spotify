<?php

	$app->group('/api/v1/', function () {
		
		$this->get('albums', function ($req, $res, $args) {
			$band_name = $req->getQueryParams()['q'];
			
			return $res
				->withHeader('Content-type', 'application/json')
				->write(
					AlbumController::getByBandName($band_name, $this)
				);
		});
	});