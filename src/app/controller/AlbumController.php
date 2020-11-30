<?php
	
	use GuzzleHttp\Exception\ClientException;
	use GuzzleHttp\Exception\ConnectException;
	
	class AlbumController
	{
		public static function getByBandName($band_name, $container) {
			try {
				if ($band_name == null)
					return json_encode(ErrorResponse::failed(400, "Band name must be provide"));
				
				$headers = [
					'Authorization' => 'Bearer ' . $container->get('settings')['spotify']['access_token'],
				];
				
				$query = [
					'q' => "artist:$band_name",
					'type' => 'album'
				];
				$response = $container->get('guzzleClient')->get('v1/search', ['header' => $headers, 'query' => $query]);
				$body = $response->getBody()->getContents();
				
				$data = json_decode($body, true);
				$albums = $data['albums']['items'];
				
				return json_encode(AlbumHydrator::hydrate($albums));
			}
			catch (ClientException $exception) {
				if ($exception->getCode() == 401) {
					$client_id = $container->get('settings')['spotify']['clientId'];
					$secret_id = $container->get('settings')['spotify']['clientSecret'];
					
					$options = [
						'form_params' => [
							"grant_type" => "client_credentials"
						],
						'headers' => [
							'Authorization' => 'Basic ' . base64_encode($client_id . ":" . $secret_id),
							'Content-Type' => 'application/x-www-form-urlencoded'
						]
					];
					
					$response = $container->get('guzzleClient')->post($container->get('settings')['spotify']['token_url'], $options);
					$access_token = json_decode($response->getBody()->getContents(), true)['access_token'];
					$container['settings']['spotify']['access_token'] = $access_token;
					
					$options = [
						'query' => [
							'q' => "artist:$band_name",
							'type' => 'album'
						],
						'headers' => [
							'Authorization' => 'Bearer ' . $access_token,
							'Accept' => 'application/json'
						]
					];
					
					$response = $container->get('guzzleClient')->get($container->get('settings')['spotify']['base_url'] . '/search', $options);
					
					$body = $response->getBody()->getContents();
					$data = json_decode($body, true);
					$albums = $data['albums']['items'];
					
					return json_encode(AlbumHydrator::hydrate($albums));
				}
				
				return $exception->getResponse()->getBody()->getContents();
			}
			catch (ConnectException $exception) {
				return json_encode(ErrorResponse::failed(500, "ConnectException - " . $exception->getMessage()));
			}
		}
	}