<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Weather\Measure;

class Visibility extends UnitAbstract {
	const UNIT_KM = 'km';
	
	public function __construct() {
		$this->setDefaultUnit(self::UNIT_KM);
	}
}
?>
