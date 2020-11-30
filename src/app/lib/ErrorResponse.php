<?php
	
	/**
	 * Class ErrorResponse
	 */
	class ErrorResponse
	{
		/**
		 * @var
		 */
		private $code;
		
		/**
		 * @var
		 */
		private $message;
		
		/**
		 * ErrorResponse constructor.
		 *
		 * @param $code
		 * @param $message
		 */
		public function __construct($code, $message) {
			$this->code = $code;
			$this->message = $message;
		}
		
		/**
		 * @return mixed
		 */
		public function getCode() {
			return $this->code;
		}
		
		/**
		 * @param mixed $code
		 */
		public function setCode($code) {
			$this->code = $code;
		}
		
		/**
		 * @return mixed
		 */
		public function getMessage() {
			return $this->message;
		}
		
		/**
		 * @param mixed $message
		 */
		public function setMessage($message) {
			$this->message = $message;
		}
		
		public static function failed($code, $message) {
			$data['error'] = [
				'code' => $code,
				'message' => $message
			];
			
			return $data;
		}
	}