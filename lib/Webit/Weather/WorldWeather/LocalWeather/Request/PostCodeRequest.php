<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Request;

class PostCodeRequest extends RequestAbstract {
	protected $postCode;
	
	public function getPostCode() {
		return $this->postCode;
	}
	
	public function setPostCode($postCode) {
		$this->postCode = $postCode;
	}
	
	public function getQueryParams() {
		$arParams = parent::getQueryParams();
		
		$arParams['q'] = $postCode;

		return $arParams;
	}
}
?>
