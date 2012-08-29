<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Request;
use Webit\Weather\WorldWeather\LocalWeather\Api\Request\RequestInterface;

abstract class RequestAbstract implements RequestInterface {
	const FORMAT_JSON = 'json';
	const FORMAT_XML = 'xml';
	const FORMAT_CSV = 'csv';
	
	protected $apiKey;
	protected $numberOfDays = 2;
	protected $format = 'json';
	
	public function __construct($apiKey) {
		$this->apiKey = $apiKey;
	}
	
	public function setFormat($format) {
		$this->format = $format;
	}
	
	public function getFormat() {
		return $this->format;
	}
	
	public function getNumberOfDays() {
		return $this->numberOfDays;
	}
	
	public function setNumberOfDays($number) {
		$this->numberOfDays = $number;
	}
	
	public function getQueryParams() {
		$arParams = array(
									'key' => $this->apiKey,
									'num_of_days' => $this->numberOfDays,
									'format' => $this->format
								);
		
		return $arParams;
	}
}
?>
