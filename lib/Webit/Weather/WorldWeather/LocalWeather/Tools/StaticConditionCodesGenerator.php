<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Tools;

/**
 * Generates PHP array representation of wwoConditionCodes.xml
 * (can be used in StaticConditionCodesProvider)
 * 
 * @author dbojdo
 *
 */
class StaticConditionCodesGenerator {
	public function generate($sourceFile,$varExport = false) {
		if(is_file($sourceFile) == false) {
			throw new \RuntimeException('Given file not found');
		}
		
		$arList = $this->getConditionsList($sourceFile);
		
		return $varExport ? (var_export($arList, true) . ';') : $arList;
	}
	
	private function getConditionsList($sourceFile) {
		$domDocument = new \DOMDocument();
		$domDocument->load($sourceFile);
	
		$arConditionList = array();
		$conditionList = $domDocument->getElementsByTagName('condition');
		
		foreach($conditionList as $elCondition) {
			$arCondition = array();
			foreach ($elCondition->childNodes as $el) {
				if($el instanceof \DOMElement && empty($el->localName) == false) {
					$arCondition[$el->localName] = trim($el->textContent);
				}
			}
			$arConditionList[$arCondition['code']] = $arCondition;
		}
		
		return $arConditionList;
	}
}
?>
