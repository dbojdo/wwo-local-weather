<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Request;

class IpRequest extends RequestAbstract {
	protected $ip;
	
	public function getIp() {
		return $this->ip;
	}
	
	public function setIp($ip) {
		$this->ip = $ip;
	}
	
	public function getQueryParams() {
		$arParams = parent::getQueryParams();

		$arParams['q'] = $this->ip;
		
		return $arParams;
	}
}
?>
