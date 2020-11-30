<?php
	
	use GuzzleHttp\Exception\ClientException;
	use GuzzleHttp\Exception\ConnectException;
	
	class AlbumController
	{
		public static function getByBandName($band_name, $container) {
			try {
				if ($band_name == null)
					return json_encode(ErrorResponse::failed(400, "Band name must be provide"));
				
				$response = $container->get('guzzleClient')->get('v1/search?q=' . $band_name . '&type=album');
				
				$body = $response->getBody()->getContents();
				
				$data = json_decode($body, true);
				$albums = $data['albums']['items'];
				
				return json_encode(AlbumHydrator::hydrate($albums, $band_name));
			}
			catch (ClientException $exception) {
				if ($exception->getCode() == 401) {
					$client_id = $container->get('settings')['spotify']['clientId'];
					$secret_id = $container->get('settings')['spotify']['clientSecret'];
					$headers = [
						'Authorization' => 'Basic ' . base64_encode($client_id . ":" . $secret_id),
						'Content-Type' => 'application/x-www-form-urlencoded'
					];
					
					$options = [
						'form_params' => [
							"grant_type" => "client_credentials"
						],
						'headers' => $headers
					];
					
					$response = $container->get('guzzleClient')->post($container->get('settings')['spotify']['token_url'], $options);
					$access_token = json_decode($response->getBody()->getContents(), true)['access_token'];
					
					$headers = [
						'Authorization' => 'Bearer ' . $access_token,
						'Accept' => 'application/json',
					];
					
					$response = $container->get('guzzleClient')->get(
						$container->get('settings')['spotify']['base_url'] . '/search?q=' . $band_name . '&type=album',
						['headers' => $headers]
					);
					
					$body = $response->getBody()->getContents();
					$data = json_decode($body, true);
					$albums = $data['albums']['items'];
					
					return json_encode(AlbumHydrator::hydrate($albums, $band_name));
				}
				
				return $exception->getResponse()->getBody()->getContents();
			}
			catch (ConnectException $exception) {
				return json_encode(ErrorResponse::failed(500, "ConnectException - " . $exception->getMessage()));
			}
		}
	}