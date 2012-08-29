<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Weather\Measure;
use Webit\Weather\WorldWeather\LocalWeather\Api\Weather\UnitableInterface;

abstract class UnitAbstract implements UnitableInterface {
	const UNIT_NO_UNIT = 'no_unit';
	
	protected $defaultUnit = self::UNIT_NO_UNIT;
	
	protected $values = array();
	
	public function getValue($unit = null) {
		$unit = $unit ?: $this->defaultUnit;
		
		if($this->hasUnit($unit) == false) {
			try {
				$value = $this->convertTo($unit);
			} catch(\LogicException $e) {
				return null;
			}			
		}
		
		return $this->values[$unit];
	}
	
	public function setValue($value, $unit = null) {
		$unit = $unit ?: $this->defaultUnit;
		
		$this->values[$unit] = $value;
	}
	
	protected function hasUnit($unit) {
		return key_exists($unit,$this->values);
	}
	
	/**
	 * 
	 * @param string $unit
	 */
	public function setDefaultUnit($unit) {
		$this->defaultUnit = $unit;
	}
	
	/**
	 * 
	 * @param string $unit
	 * @return mixed $value
	 */
	protected function convertTo($unit) {
		throw new \LogicException('Convertion method is not implemented.');
	}
	
	public function __toString() {
		$strValue = '';
		$strUnit = '';
		if($this->hasUnit($this->defaultUnit)) {
			$strValue = $this->getValue();
			$strUnit = $this->defaultUnit;
		} else {
			$units = array_keys($this->values);
			if(count($keys) > 0) {
				$strValue = $this->values[0];
				$strUnit = $units[0];
			}
		}
		
		return $strValue . ($strUnit ? (' ['. $strUnit .']') : '');
	}
}
?>
