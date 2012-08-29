<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Response\Reader;

use Webit\Weather\WorldWeather\LocalWeather\Response\Reader\JsonReader;

class ReaderFactory {
	/**
	 * 
	 * @param string $responseFormat
	 * @return ReaderInterface
	 */
	static public function factory($responseFormat) {
		switch($responseFormat) {
			case 'json':
				return new JsonReader();
			break;
			case 'xml':
			break;
			case 'csv':
			break;
			default:
				
		}
	}
}
?>
