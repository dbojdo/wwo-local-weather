<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Weather\Measure;

class Temperature extends UnitAbstract {
	const UNIT_TEMP_C = 'C';
	const UNIT_TEMP_F = 'F';
	
	public function __construct() {
		$this->setDefaultUnit(self::UNIT_TEMP_C);
	}
}
?>
