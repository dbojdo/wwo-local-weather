<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Response;

use Webit\Weather\WeatherApi\Api\WeatherInterface;
use Webit\Weather\WorldWeather\LocalWeather\Api\Response\RequestInterface;
use Webit\Weather\WorldWeather\LocalWeather\Api\Response\ResponseInterface;

class Response implements ResponseInterface {
	/**
	 *
	 * @var bool
	 */
	protected $success = true;
	
	/**
	 * 
	 * @var array
	 */
	protected $errors = array();
	
	/**
	 * 
	 * @var RequestInterface
	 */
	protected $request;
	
	/**
   * @var CurrentWeatherInterface
	 */
	protected $currentWeather;
	
	/**
	 * 
	 * @var array
	 */
	protected $weatherList = array();
	
	public function setRequest(RequestInterface $request) {
		$this->request = $request;
	}
	
	/**
	 * @return RequestInterface
	 */
	public function getRequest() {
		return $this->request;
	}
	
	public function setSuccess($bool) {
		$this->success = (bool)$bool;
	} 
	
	/**
	 * @return bool
	 */
	public function getSuccess() {
		return $this->success;
	}
	
	public function setCurrentWeather(WeatherInterface $weather) {
		$this->currentWeather = $weather;
	}
	
	/**
	 * @return CurrentWeatherInterface
	 */
	public function getCurrentWeather() {
		return $this->currentWeather;
	}
	
	/**
	 * @return array
	 */
	public function getWeatherList() {
		return $this->weatherList;
	}
	
	public function setWeatherList($arList) {
		$this->weatherList = $arList;
	}
	
	public function setErrors($errors) {
		$this->errors = $errors;
	}
	
	public function getErrors() {
		return $this->errors;
	}
}
?>
