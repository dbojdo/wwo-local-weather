<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Weather\ConditionCodeProvider;

use Webit\Weather\WeatherApi\Api\ConditionCodeProviderInterface;

class XmlConditionCodeProvider implements ConditionCodeProviderInterface {	
	/**
	 * 
	 * @var \DOMDocument
	 */
	protected $doc;
	
	public function __construct($sourceFile) {
		if(is_file($sourceFile) == false) {
			throw new \InvalidArgumentException('Given source file not found.');
		}
		
		$this->doc = new \DOMDocument();
		$this->doc->load($sourceFile);
	}
	
	/**
	 * 
	 * @param int $code
	 * @return ConditionCodeInterface
	 */
	public function provide($code) {
		$element = $this->findCodeNode($code);		
		if(!$element) {
			throw new \RuntimeException('Cannot find condition definition for given code: '. $code);
		}
		
		$arArguments = array();
		foreach($element->childNodes as $key => $node) {
			if($node instanceof \DOMElement) {
				$arArguments[] = trim($node->textContent);
			}
		}
		
		$refClass = new \ReflectionClass('Webit\Weather\WorldWeather\LocalWeather\Weather\ConditionCode');
		$conditionCode = $refClass->newInstanceArgs($arArguments);
		
		return $conditionCode;
	}
	
	/**
	 * 
	 * @param int $code
	 * @return \DOMElement
	 */
	private function findCodeNode($code) {
		$xPath = new \DOMXPath($this->doc);
		$collNodes = $xPath->query('condition[code='.$code.']');
		if($collNodes->length == 1) {
			return $collNodes->item(0);
		}
	}
}
?>