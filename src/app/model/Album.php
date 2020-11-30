<?php
	
	class Album
	{
		/**
		 * @var string
		 */
		private $name;
		
		/**
		 * @var string
		 */
		private $released;
		
		/**
		 * @var int
		 */
		private $tracks;
		
		/**
		 * @var Cover
		 */
		private $cover;
		
		public function __construct($_name, $_release_date, $_tracks, $_cover) {
			$this->name = $_name;
			$this->released = $_release_date;
			$this->tracks = $_tracks;
			$this->cover = $_cover;
		}
		
		/**
		 * @return string
		 */
		public function getName() {
			return $this->name;
		}
		
		/**
		 * @param string $name
		 */
		public function setName($name) {
			$this->name = $name;
		}
		
		/**
		 * @return string
		 */
		public function getReleased() {
			return $this->released;
		}
		
		/**
		 * @param string $released
		 */
		public function setReleased($released) {
			$this->released = $released;
		}
		
		/**
		 * @return int
		 */
		public function getTracks() {
			return $this->tracks;
		}
		
		/**
		 * @param int $tracks
		 */
		public function setTracks($tracks) {
			$this->tracks = $tracks;
		}
		
		/**
		 * @return \Cover
		 */
		public function getCover() {
			return $this->cover;
		}
		
		/**
		 * @param \Cover $cover
		 */
		public function setCover($cover) {
			$this->cover = $cover;
		}
		
		
		/**
		 * @return string
		 */
		public function __toString() {
			return $this->name;
		}
		
		public function __toArray() {
			$data = array(
				'name' => $this->getName(),
				'released' => $this->getReleased(),
				'tracks' => $this->getTracks(),
				'cover' => $this->getCover()
			);
			
			return $data;
		}
	}