<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Request;

class CityRequest extends RequestAbstract {
	protected $city;
	protected $country;
	
	public function getCity() {
		return $this->city;
	}
	
	public function getCountry() {
		return $this->country;
	}
	
	public function setCountry($country) {
		$this->country = $country;
	}
	
	public function setCity($city) {
		$this->city = $city;
	}
	
	public function getQueryParams() {
		$arParams = parent::getQueryParams();

		$arParams['q'] = $this->city . ($this->country ? (','.$this->country) : '');
		
		return $arParams;
	}
}
?>
