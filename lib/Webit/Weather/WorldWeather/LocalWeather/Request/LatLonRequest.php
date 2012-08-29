<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Request;

class LatLonRequest extends RequestAbstract {
	protected $latitude;
	protected $longitude;
	
	public function getLatitude() {
		return $this->latitude;
	}
	
	public function setLatitude($latitude) {
		$this->latitude = $latitude;
	}
	
	public function getLongitude() {
		return $this->longitude;
	}
	
	public function setLongitude($longitude) {
		$this->longitude = $longitude;
	}
	
	public function getQueryParams() {
		$arParams = parent::getQueryParams();
		
		$lat = str_replace(',', '.', (string)$this->latitude);
		$lon = str_replace(',', '.', (string)$this->longitude);
		$arParams['q'] = $lat .',' . $lon;

		return $arParams;
	}
}
?>
