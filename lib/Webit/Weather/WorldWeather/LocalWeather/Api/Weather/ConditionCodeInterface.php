<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Api\Weather;
interface ConditionCodeInterface {
	public function getDescription();
	public function getCode();
	public function getDayIcon();
	public function getNightIcon();
}
?>
