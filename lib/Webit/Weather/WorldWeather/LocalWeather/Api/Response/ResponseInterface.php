<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Api\Response;

interface ResponseInterface {
	/**
	 * @return Webit\Weather\WorldWeather\LocalWeather\Api\Response\RequestInterface
	 */
	public function getRequest();
	
	/**
	 * @return bool
	 */
	public function getSuccess();
	
	/**
	 * @return Webit\Weather\WorldWeather\LocalWeather\Api\Weather\WeatherInterface
	 */
	public function getCurrentWeather();
	
	/**
	 * @return \IteratorIterator
	 */
	public function getWeatherList();
	
	/**
   * @return array
	 */
	public function getErrors();
}
?>
