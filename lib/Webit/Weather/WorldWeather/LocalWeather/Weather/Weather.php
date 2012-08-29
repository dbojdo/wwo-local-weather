<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Weather;

use Webit\Weather\WorldWeather\LocalWeather\Weather\Measure\Precipitation;
use Webit\Weather\WorldWeather\LocalWeather\Weather\Measure\Visibility;
use Webit\Weather\WorldWeather\LocalWeather\Weather\Measure\Pressure;
use Webit\Weather\WorldWeather\LocalWeather\Weather\Measure\Humidity;
use Webit\Weather\WorldWeather\LocalWeather\Weather\Measure\Cloudcover;
use Webit\Weather\WorldWeather\LocalWeather\Weather\Measure\Temperature;

use Webit\Weather\WorldWeather\LocalWeather\Api\Weather\ConditionCodeInterface;
use Webit\Weather\WorldWeather\LocalWeather\Api\Weather\WindInterface;
use Webit\Weather\WorldWeather\LocalWeather\Api\Weather\WeatherInterface;

class Weather implements WeatherInterface {
	protected $date;
	protected $code;
	
	protected $cloudcover;
	protected $minTemperature;
	protected $maxTemperature;
	protected $humidity;
	protected $wind;
	
	protected $pressure;
	protected $visibility;
	protected $precipitation;
	
	protected $description;
	protected $iconUrl;
	
	public function __construct(\DateTime $date, ConditionCodeInterface $code, $description = null,
															Temperature $minTemperature = null, Temperature $maxTemperature, 
															WindInterface $wind = null, Cloudcover $cloudcover = null, 
															Humidity $humidity = null, Pressure $pressure = null, 
															Visibility $visibility = null, Precipitation $precipitation = null, 
															$iconUrl = null) {

		$this->date = $date;
		$this->code = $code;
		$this->description = $description;
		$this->minTemperature = $minTemperature;
		$this->maxTemperature = $maxTemperature;
		$this->wind = $wind;
		$this->cloudcover = $cloudcover;
		$this->humidity = $humidity;
		$this->pressure = $pressure;
		$this->visibility = $visibility;
		$this->precipitation = $precipitation;
		$this->iconUrl = $iconUrl;
	}
	
	/**
	 * @retrun UnitableInterface
	 */
	public function getCloudcover() {
		return $this->cloudcover;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Webit\Weather\WorldWeather\LocalWeather\Api\Weather\CurrentWeatherInterface::getMinTemperature()
	 */
	public function getMinTemperature() {
		return $this->minTemperature;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Webit\Weather\WorldWeather\LocalWeather\Api\Weather\WeatherInterface::getMaxTemperature()
	 */
	public function getMaxTemperature() {
		return $this->maxTemperature;
	}
	
	/**
	 * @retrun Hu
	 */
	public function getHumidity() {
		return $this->humidity;
	}
	
	/**
	 * @return WindInterface
	 */
	public function getWind() {
		return $this->wind;
	}
	
	/**
	 * @return \DateTime
	 */
	public function getDate() {
		return $this->date;
	}
	
	/**
	 * @return int
	 */
	public function getPressure() {
		return $this->pressure;
	}
	
	/**
	 * @return int
	 */
	public function getVisibility() {
		return $this->visibility;
	}
	
	/**
	 * @return int
	 */
	public function getPrecipitation() {
		return $this->precipitation;
	}
	
	/**
	 * @return WeatherCodeInterface
	 */
	public function getWeatherCode() {
		return $this->code;
	}
	
	/**
	 * @return string
	 */
	public function getWeatherDescription() {
		return $this->description;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Webit\Weather\WorldWeather\LocalWeather\Api\Weather.CurrentWeatherInterface::getWeatherIconUrl()
	 */
	public function getWeatherIconUrl() {
		return $this->iconUrl;
	}
	
	public function __toString() {
		$str = 'Date: ' . ($this->date ? $this->date->format('Y-m-d H:i:s') : '') ."\n";
		$str .= 'Description: ' . $this->description . "\n";
		$str .= ($this->minTemperature ? 'Temperature (min): ' . $this->minTemperature . "\n" : '');
		$str .= ($this->maxTemperature ? 'Temperature (max): ' . $this->maxTemperature . "\n" : '');
		$str .= ($this->wind ? 'Wind: ' . $this->wind . "\n" : '');
		$str .= ($this->cloudcover ? 'Cloudcover: ' . $this->cloudcover . "\n" : '');
		$str .= ($this->humidity ? 'Humidity: ' . $this->humidity . "\n" : '');
		$str .= ($this->pressure ? 'Pressure: ' . $this->pressure . "\n" : '');
		$str .= ($this->visibility ? 'Visibility: ' . $this->visibility . "\n" : '');
		$str .= ($this->precipitation ? 'Precipitation: ' . $this->precipitation . "\n" : '');
		
		return $str;
	}
}
?>