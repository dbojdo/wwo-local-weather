<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Api\Weather;

interface ConditionCodeProviderInterface {
	
	/**
	 * 
	 * @param int $conditionCode
   * @return ConditionCodeInterface
	 */
	public function provide($code);
}
?>
