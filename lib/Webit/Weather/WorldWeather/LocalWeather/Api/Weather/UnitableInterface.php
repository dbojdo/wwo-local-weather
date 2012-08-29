<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Api\Weather;

interface UnitableInterface {
	public function getValue($unit = null);
}
?>