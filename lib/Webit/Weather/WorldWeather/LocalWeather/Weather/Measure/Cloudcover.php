<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Weather\Measure;

class Cloudcover extends UnitAbstract {
	const UNIT_PERCENT = '%';
	
	public function __construct() {
		$this->setDefaultUnit(self::UNIT_PERCENT);
	}
}
?>
