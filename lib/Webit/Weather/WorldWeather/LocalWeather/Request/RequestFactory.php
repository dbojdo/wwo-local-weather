<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Request;

class RequestFactory {
	static public function factory($type, $query) {
		$type = mb_strtolower($type);
		switch($type) {
			case 'city':
				$request = new RequestCity($apiKey);
			break;
		}	
	}
}
?>