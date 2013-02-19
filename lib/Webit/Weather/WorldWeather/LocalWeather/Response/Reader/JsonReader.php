<?php

namespace Webit\Weather\WorldWeather\LocalWeather\Response\Reader;

use Webit\Weather\WeatherApi\Api\ConditionCodeProviderInterface;
use Webit\Weather\WorldWeather\LocalWeather\Response\Request;
use Webit\Weather\WorldWeather\LocalWeather\Api\Response\ReaderInterface;
use Webit\Weather\WorldWeather\LocalWeather\Response\Response;
use Webit\Weather\WorldWeather\LocalWeather\Weather\ConditionCodeProvider\StaticConditionCodeProvider;
use Webit\Weather\WeatherApi\Wind;
use Webit\Weather\WeatherApi\Measure\WindSpeed;
use Webit\Weather\WeatherApi\Measure\WindDirection;
use Webit\Weather\WeatherApi\Measure\Temperature;
use Webit\Weather\WeatherApi\Measure\Precipitation;
use Webit\Weather\WeatherApi\Measure\Visibility;
use Webit\Weather\WeatherApi\Measure\Pressure;
use Webit\Weather\WeatherApi\Measure\Humidity;
use Webit\Weather\WeatherApi\Measure\Cloudcover;

class JsonReader implements ReaderInterface {
	/**
	 * 
	 * @var ConditionCodeProviderInterface
	 */
	protected $codeProvider;
	
	public function __construct(ConditionCodeProviderInterface $codeProvider = null) {
		if(empty($codeProvider)) {
			$this->codeProvider = new StaticConditionCodeProvider();
		}
	}
	
	public function getFormat() {
		return 'json';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Webit\Weather\WorldWeather\LocalWeather\Api\Response\ReaderInterface::readOutput()
	 */
	public function readOutput($output) {
		$json = json_decode($output);

		$response = new Response();
		
		$success = $this->isSuccess($json);
		$response->setSuccess($success);
		if($success == false) {
			$response->setErrors($this->parseErrors($json));
		}
		
		if($success) {
			try {
				$request = $this->createRequest($json->data->request[0]);
				$response->setRequest($request);

				if(isset($json->data->current_condition)) {
					$currentWeather = $this->createCurrentWeather($json->data->current_condition[0]);
					$response->setCurrentWeather($currentWeather);
				}
				
				if(isset($json->data->weather)) {
					$weatherList = $this->createWeatherList($json->data->weather);
					$response->setWeatherList($weatherList);
				}
			} catch(\Exception $e) {
				$arErrors = array($e->getMessage());
				$response->setErrors($arErrors);
			}
		}
		
		return $response; 
	}
	
	private function isSuccess($json) {
		return isset($json->data) && !isset($json->data->error);
	}
	
	private function parseErrors($json) {
		$arErrors = array();
		foreach($json->data->error as $objError) {
			$arErrors[] = $objError->msg;
		}
		
		return $arErrors;
	}
	
	/**
	 * 
	 * @param stdClass $objRequest
	 * @return \Webit\Weather\WorldWeather\LocalWeather\Api\Response\RequestInterface
	 */
	private function createRequest($objRequest) {
		$request = new Request($objRequest->type, $objRequest->query);
		
		return $request;
	}
	
	/**
	 * 
	 * @param stdClass $objWeather
	 * @return \Webit\Weather\WorldWeather\LocalWeather\Api\Weather\eatherInterface
	 */
	private function createCurrentWeather($objWeather) {
		$arArguments = array();
		
		// observation time
		$arArguments[] = $this->createDate($objWeather);
		
		// condition code
		$arArguments[] = $this->codeProvider->provide($objWeather->weatherCode);
		
		// description
		$arArguments[] = trim($objWeather->weatherDesc[0]->value);
		
		// temperature
		$arArguments[] = $this->createTemperature($objWeather,'min'); // min
		$arArguments[] = $this->createTemperature($objWeather,'max'); // max
		
		// wind
		$arArguments[] = $this->createWind($objWeather);

		// cloudcover
		if(isset($objWeather->cloudcover)) {
			$cc = new Cloudcover();
				$cc->setValue($objWeather->cloudcover);
		}
		$arArguments[] = isset($cc) ? $cc : null;
		
		// humidity
		if(isset($objWeather->humidity)) {
			$h = new Humidity();
				$h->setValue($objWeather->humidity);
		}
		$arArguments[] = isset($h) ? $h : null;
		
		// pressure
		if(isset($objWeather->pressure)) {
		$pr = new Pressure();
			$pr->setValue($objWeather->pressure);
		}
		$arArguments[] = isset($pr) ? $pr : null;
		
		// visibility
		if(isset($objWeather->visibility)) {
			$vis = new Visibility();
				$vis->setValue($objWeather->visibility);
		}
		$arArguments[] = isset($vis) ? $vis : null;
		
		// precipitation
		if(isset($objWeather->precipMM)) {
			$perc = new Precipitation();
				$perc->setValue($objWeather->precipMM);
		}
		$arArguments[] = isset($perc) ? $perc : null;
		
		// icon url
		$arArguments[] = $objWeather->weatherIconUrl[0]->value;
		
		$refClass = new \ReflectionClass('Webit\Weather\WeatherApi\Weather');
		$weather = $refClass->newInstanceArgs($arArguments);
		
		return $weather;
	}
	
	private function createDate($objWeather) {
		if(isset($objWeather->date)) {
			$date = \DateTime::createFromFormat('Y-m-d', $objWeather->date);
		} elseif(isset($objWeather->observation_time)) {
			$date = \DateTime::createFromFormat('h:i A', $objWeather->observation_time);
		} else {
			throw new \InvalidArgumentException('Cannot create date object from given data');
		}
		
		return $date;
	}
	
	private function createTemperature($objWeather,$type = 'min') {
		$temp = new Temperature();
		
		$key = 'temp' . ucfirst($type) . 'C';
		if(property_exists($objWeather, $key)) {
			$temp->setValue($objWeather->{$key},Temperature::UNIT_TEMP_C);
		} else if(property_exists($objWeather, 'temp_C')) {
			$temp->setValue($objWeather->temp_C,Temperature::UNIT_TEMP_C);
		}
		
		$key = 'temp' . ucfirst($type) . 'F';
		if(property_exists($objWeather, $key)) {
			$temp->setValue($objWeather->{$key},Temperature::UNIT_TEMP_F);
		} else if(property_exists($objWeather, 'temp_F')) {
			$temp->setValue($objWeather->temp_F,Temperature::UNIT_TEMP_F);
		}
		
		return $temp;
	}
	
	private function createWeatherList(array $arList) {
		$arWeather = array();
		foreach($arList as $objWeather) {
			$arWeather[] = $this->createCurrentWeather($objWeather);
		}
		return $arWeather;
	}
	
	/**
	 * 
	 * @param stdClass $objWeather
	 * @return \Webit\Weather\WorldWeather\LocalWeather\Weather\Wind
	 */
	private function createWind($objWeather) {
		$direction = new WindDirection();
			$direction->setValue($objWeather->winddir16Point,WindDirection::UNIT_16POINTS);
			$direction->setValue($objWeather->winddirDegree,WindDirection::UNIT_DEGREE);
		
		$speed = new WindSpeed();
			$speed->setValue($objWeather->windspeedKmph, WindSpeed::UNIT_KMPH);
			$speed->setValue($objWeather->windspeedMiles, WindSpeed::UNIT_MPH);
		
		$wind = new Wind($direction, $speed);
		
		return $wind;
	}
	
	private function isValid($json) {
		return isset($json->data);
	}
}
?>
