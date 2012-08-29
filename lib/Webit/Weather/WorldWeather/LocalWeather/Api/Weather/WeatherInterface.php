<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Api\Weather;

interface WeatherInterface {
	/**
	 * @return \DateTime
	 */
	public function getDate();
	
	/**
	 * @return WeatherCodeInterface
	 */
	public function getWeatherCode();
	
	/**
	 * @retrun UnitableInterface
	 */
	public function getCloudcover();
	
	/**
	 * @return UnitableInterface
	 */
	public function getMinTemperature();
	
	/**
	 * @return UnitableInterface
	 */
	public function getMaxTemperature();
	
	/**
	 * @retrun int
	 */
	public function getHumidity();
	
	/**
	 * @return WindInterface
	 */
	public function getWind();
	
	/**
	 * @return UnitableInterface
	 */
	public function getPressure();
	
	/**
	 * @return UnitableInterface
	 */
	public function getVisibility();
	
	/**
	 * @return UnitableInterface
	 */
	public function getPrecipitation();	
	
	/**
	 * @return string
	 */
	public function getWeatherDescription();
	
	/**
	 * @return string
	 */
	public function getWeatherIconUrl();
}
?>
