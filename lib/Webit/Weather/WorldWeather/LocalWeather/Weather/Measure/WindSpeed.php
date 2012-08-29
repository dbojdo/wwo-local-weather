<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Weather\Measure;

class WindSpeed extends UnitAbstract {
	const UNIT_KMPH = 'kmph';
	const UNIT_MPH = 'mph';
	
	public function __construct() {
		$this->setDefaultUnit(self::UNIT_KMPH);
	}
}
?>
