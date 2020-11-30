<?php
	
	use samdark\hydrator\Hydrator;
	
	/**
	 * Class AlbumHydrator
	 */
	class AlbumHydrator
	{
		
		/**
		 * @param $data
		 *
		 * @return array
		 */
		public static function hydrate($data) {
			$result = [];
			
			$albumHydrator = new Hydrator([
				'name' => 'name',
				'release_date' => 'released',
				'total_tracks' => 'tracks'
			]);
			
			foreach ($data as $item) {
					$cover = CoverHydrator::hydrate($item['images'][0]);
					$album = $albumHydrator->hydrate($item, Album::class);
					$album->setCover($cover->__toArray());
					$result[] = $album->__toArray();
			}
			
			return $result;
		}
	}