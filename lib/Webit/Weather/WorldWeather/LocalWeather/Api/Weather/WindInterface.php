<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Api\Weather;

interface WindInterface {
	/**
	 * @return UnitableInterface
	 */
	public function getWindSpeed();
	
	/**
	 * @return UnitableInterface
	 */
	public function getWindDirection();
}
?>
