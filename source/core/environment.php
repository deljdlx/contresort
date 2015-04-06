<?php

namespace Contresort;


class Environment
{

	public $method;
	public $url=false;



	public function __construct() {

		$mode=php_sapi_name();


		if($mode=='cli') {
			$this->method='cli';
		}
		else {
			$this->method=strtolower($_SERVER['REQUEST_METHOD']);
		}

		if(isset($_SERVER)) {
			if(isset($_SERVER['SERVER_PROTOCOL']) && isset($_SERVER['SERVER_NAME']) && isset($_SERVER['REQUEST_URI'])) {
				$protocol = strtolower(preg_replace('`(.*?)/.*`', '$1', $_SERVER['SERVER_PROTOCOL']));
				$this->url = $protocol . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			}
		}
	}

	public function getMethod() {
		return $this->method;
	}


	public function getURL() {
		return $this->url;
	}


}