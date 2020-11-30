<?php
	
	class Cover
	{
		/**
		 * @var float
		 */
		private $height;
		
		/**
		 * @var float
		 */
		private $width;
		
		/**
		 * @var string
		 */
		private $url;
		
		/**
		 * @return float
		 */
		public function getHeight() {
			return $this->height;
		}
		
		/**
		 * @param float $height
		 */
		public function setHeight($height) {
			$this->height = $height;
		}
		
		/**
		 * @return float
		 */
		public function getWidth() {
			return $this->width;
		}
		
		/**
		 * @param float $width
		 */
		public function setWidth($width) {
			$this->width = $width;
		}
		
		/**
		 * @return string
		 */
		public function getUrl() {
			return $this->url;
		}
		
		/**
		 * @param string $url
		 */
		public function setUrl($url) {
			$this->url = $url;
		}
		
		
		public function __toArray() {
			$data = array(
				'height' => $this->getHeight(),
				'width' => $this->getWidth(),
				'url' => $this->getUrl()
			);
			
			return $data;
		}
	}