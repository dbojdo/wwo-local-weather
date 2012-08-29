<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Weather;

use Webit\Weather\WorldWeather\LocalWeather\Api\Weather\ConditionCodeInterface;

class ConditionCode implements ConditionCodeInterface {
	protected $code;
	protected $description;
	protected $dayIcon;
	protected $nightIcon;
	
	public function __construct($code, $description = null, $dayIcon = null, $nightIcon = null) {
			$this->code = $code;
			$this->description = $description;
			$this->dayIcon = $dayIcon;
			$this->nightIcon = $nightIcon;
	}
	
	static public function create($code) {
		
	}
	
	public function getDescription() {
		return $this->description;
	}
	
	public function getCode() {
		return $this->code;
	}
	
	public function getDayIcon() {
		return $this->dayIcon;
	}
	
	public function getNightIcon() {
		return $this->nightIcon;
	}
}
?>
