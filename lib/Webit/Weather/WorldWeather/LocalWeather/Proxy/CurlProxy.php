<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Proxy;

use Webit\Weather\WorldWeather\LocalWeather\Api\ProxyInterface;

use Webit\Weather\WorldWeather\LocalWeather\Api\Response\ReaderInterface;
use Webit\Weather\WorldWeather\LocalWeather\Api\Request\RequestInterface;
use Webit\Weather\WorldWeather\LocalWeather\Response\Reader\ReaderFactory;

class CurlProxy implements ProxyInterface {
	protected $url = 'http://free.worldweatheronline.com/feed/weather.ashx';
	
	protected $curl;
	
	/**
	 * 
	 * @var ReaderInterface
	 */
	protected $reader;
	
	public function __construct($url = null) {
		if(empty($url) == false) {
			$this->url = $url;
		}
		
		$this->initCurl();
	}
	
	private function initCurl() {
		$this->curl = curl_init();
	}
	
	/**
	 * 
	 * @param RequestInterface $request
	 * @return ResponseInterface
	 */
	public function performRequest(RequestInterface $request) {
		$arParams = $request->getQueryParams();
		
		$url = $this->buildUrl($arParams);
		curl_setopt($this->curl,CURLOPT_URL,$url);
		curl_setopt($this->curl,CURLOPT_RETURNTRANSFER,1);
		
		$output = curl_exec($this->curl);
	
		$reader = $this->getReader($request->getFormat());
		$response = $this->reader->readOutput($output);
		
		return $response;
	}
	
	/**
	 * 
	 * @return \Webit\Weather\WorldWeather\LocalWeather\Api\Response\ReaderInterface
	 */
	private function getReader($format) {
		if(!$this->reader || $this->reader->getFormat() != $format) {
			$this->reader = ReaderFactory::factory($format);
		}
		
		return $this->reader;
	}
	
	public function setReader(ReaderInterface $reader) {
		$this->reader = $reader;
	}
	
	private function buildUrl($arParams) {
		$url = $this->url;
		
		$params = array_keys($arParams);
		$values = array_values($arParams);
		
		$arParamsString = array();
		foreach($arParams as $param=>$value) {
			$arParamsString[] = $param .'='.urlencode($value);
		}
		
		$queryString = '?' . implode('&', $arParamsString);
		
		return $url . $queryString;
	}
}
?>