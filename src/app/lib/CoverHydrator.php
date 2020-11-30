<?php
	
	use samdark\hydrator\Hydrator;
	
	/**
	 * Class CoverHydrator
	 */
	class CoverHydrator
	{
		
		/**
		 * @param $data
		 *
		 * @return object
		 */
		public static function hydrate($data) {
			
			$coverHydrator = new Hydrator([
				'height' => 'height',
				'width' => 'width',
				'url' => 'url'
			]);
			
			return $coverHydrator->hydrate($data, Cover::class);
		}
	}