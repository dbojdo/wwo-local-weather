<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Weather\ConditionCodeProvider;

use Webit\Weather\WeatherApi\Api\ConditionCodeProviderInterface;

class StaticConditionCodeProvider implements ConditionCodeProviderInterface {
	/**
	 * 
	 * @param int $code
	 * @return ConditionCodeInterface
	 */
	public function provide($code) {
		$arArguments = $this->findElement($code);
		if(!$arArguments) {
			throw new \RuntimeException('Cannot find condition definition for given code: '. $code);
		}
		
		$refClass = new \ReflectionClass('Webit\Weather\WorldWeather\LocalWeather\Weather\ConditionCode');
		$conditionCode = $refClass->newInstanceArgs($arArguments);
		
		return $conditionCode;
	}

	private function findElement($code) {
		if(key_exists($code,self::$codes)) {
			return self::$codes[$code];
		} 
		
		return null;
	}
	
	static protected $codes = array (
	  395 => 
	  array (
	    'code' => '395',
	    'description' => 'Moderate or heavy snow in area with thunder',
	    'day_icon' => 'wsymbol_0012_heavy_snow_showers',
	    'night_icon' => 'wsymbol_0028_heavy_snow_showers_night',
	  ),
	  392 => 
	  array (
	    'code' => '392',
	    'description' => 'Patchy light snow in area with thunder',
	    'day_icon' => 'wsymbol_0016_thundery_showers',
	    'night_icon' => 'wsymbol_0032_thundery_showers_night',
	  ),
	  389 => 
	  array (
	    'code' => '389',
	    'description' => 'Moderate or heavy rain in area with thunder',
	    'day_icon' => 'wsymbol_0024_thunderstorms',
	    'night_icon' => 'wsymbol_0040_thunderstorms_night',
	  ),
	  386 => 
	  array (
	    'code' => '386',
	    'description' => 'Patchy light rain in area with thunder',
	    'day_icon' => 'wsymbol_0016_thundery_showers',
	    'night_icon' => 'wsymbol_0032_thundery_showers_night',
	  ),
	  377 => 
	  array (
	    'code' => '377',
	    'description' => 'Moderate or heavy showers of ice pellets',
	    'day_icon' => 'wsymbol_0021_cloudy_with_sleet',
	    'night_icon' => 'wsymbol_0037_cloudy_with_sleet_night',
	  ),
	  374 => 
	  array (
	    'code' => '374',
	    'description' => 'Light showers of ice pellets',
	    'day_icon' => 'wsymbol_0013_sleet_showers',
	    'night_icon' => 'wsymbol_0029_sleet_showers_night',
	  ),
	  371 => 
	  array (
	    'code' => '371',
	    'description' => 'Moderate or heavy snow showers',
	    'day_icon' => 'wsymbol_0012_heavy_snow_showers',
	    'night_icon' => 'wsymbol_0028_heavy_snow_showers_night',
	  ),
	  368 => 
	  array (
	    'code' => '368',
	    'description' => 'Light snow showers',
	    'day_icon' => 'wsymbol_0011_light_snow_showers',
	    'night_icon' => 'wsymbol_0027_light_snow_showers_night',
	  ),
	  365 => 
	  array (
	    'code' => '365',
	    'description' => 'Moderate or heavy sleet showers',
	    'day_icon' => 'wsymbol_0013_sleet_showers',
	    'night_icon' => 'wsymbol_0029_sleet_showers_night',
	  ),
	  362 => 
	  array (
	    'code' => '362',
	    'description' => 'Light sleet showers',
	    'day_icon' => 'wsymbol_0013_sleet_showers',
	    'night_icon' => 'wsymbol_0029_sleet_showers_night',
	  ),
	  359 => 
	  array (
	    'code' => '359',
	    'description' => 'Torrential rain shower',
	    'day_icon' => 'wsymbol_0018_cloudy_with_heavy_rain',
	    'night_icon' => 'wsymbol_0034_cloudy_with_heavy_rain_night',
	  ),
	  356 => 
	  array (
	    'code' => '356',
	    'description' => 'Moderate or heavy rain shower',
	    'day_icon' => 'wsymbol_0010_heavy_rain_showers',
	    'night_icon' => 'wsymbol_0026_heavy_rain_showers_night',
	  ),
	  353 => 
	  array (
	    'code' => '353',
	    'description' => 'Light rain shower',
	    'day_icon' => 'wsymbol_0009_light_rain_showers',
	    'night_icon' => 'wsymbol_0025_light_rain_showers_night',
	  ),
	  350 => 
	  array (
	    'code' => '350',
	    'description' => 'Ice pellets',
	    'day_icon' => 'wsymbol_0021_cloudy_with_sleet',
	    'night_icon' => 'wsymbol_0037_cloudy_with_sleet_night',
	  ),
	  338 => 
	  array (
	    'code' => '338',
	    'description' => 'Heavy snow',
	    'day_icon' => 'wsymbol_0020_cloudy_with_heavy_snow',
	    'night_icon' => 'wsymbol_0036_cloudy_with_heavy_snow_night',
	  ),
	  335 => 
	  array (
	    'code' => '335',
	    'description' => 'Patchy heavy snow',
	    'day_icon' => 'wsymbol_0012_heavy_snow_showers',
	    'night_icon' => 'wsymbol_0028_heavy_snow_showers_night',
	  ),
	  332 => 
	  array (
	    'code' => '332',
	    'description' => 'Moderate snow',
	    'day_icon' => 'wsymbol_0020_cloudy_with_heavy_snow',
	    'night_icon' => 'wsymbol_0036_cloudy_with_heavy_snow_night',
	  ),
	  329 => 
	  array (
	    'code' => '329',
	    'description' => 'Patchy moderate snow',
	    'day_icon' => 'wsymbol_0020_cloudy_with_heavy_snow',
	    'night_icon' => 'wsymbol_0036_cloudy_with_heavy_snow_night',
	  ),
	  326 => 
	  array (
	    'code' => '326',
	    'description' => 'Light snow',
	    'day_icon' => 'wsymbol_0011_light_snow_showers',
	    'night_icon' => 'wsymbol_0027_light_snow_showers_night',
	  ),
	  323 => 
	  array (
	    'code' => '323',
	    'description' => 'Patchy light snow',
	    'day_icon' => 'wsymbol_0011_light_snow_showers',
	    'night_icon' => 'wsymbol_0027_light_snow_showers_night',
	  ),
	  320 => 
	  array (
	    'code' => '320',
	    'description' => 'Moderate or heavy sleet',
	    'day_icon' => 'wsymbol_0019_cloudy_with_light_snow',
	    'night_icon' => 'wsymbol_0035_cloudy_with_light_snow_night',
	  ),
	  317 => 
	  array (
	    'code' => '317',
	    'description' => 'Light sleet',
	    'day_icon' => 'wsymbol_0021_cloudy_with_sleet',
	    'night_icon' => 'wsymbol_0037_cloudy_with_sleet_night',
	  ),
	  314 => 
	  array (
	    'code' => '314',
	    'description' => 'Moderate or Heavy freezing rain',
	    'day_icon' => 'wsymbol_0021_cloudy_with_sleet',
	    'night_icon' => 'wsymbol_0037_cloudy_with_sleet_night',
	  ),
	  311 => 
	  array (
	    'code' => '311',
	    'description' => 'Light freezing rain',
	    'day_icon' => 'wsymbol_0021_cloudy_with_sleet',
	    'night_icon' => 'wsymbol_0037_cloudy_with_sleet_night',
	  ),
	  308 => 
	  array (
	    'code' => '308',
	    'description' => 'Heavy rain',
	    'day_icon' => 'wsymbol_0018_cloudy_with_heavy_rain',
	    'night_icon' => 'wsymbol_0034_cloudy_with_heavy_rain_night',
	  ),
	  305 => 
	  array (
	    'code' => '305',
	    'description' => 'Heavy rain at times',
	    'day_icon' => 'wsymbol_0010_heavy_rain_showers',
	    'night_icon' => 'wsymbol_0026_heavy_rain_showers_night',
	  ),
	  302 => 
	  array (
	    'code' => '302',
	    'description' => 'Moderate rain',
	    'day_icon' => 'wsymbol_0018_cloudy_with_heavy_rain',
	    'night_icon' => 'wsymbol_0034_cloudy_with_heavy_rain_night',
	  ),
	  299 => 
	  array (
	    'code' => '299',
	    'description' => 'Moderate rain at times',
	    'day_icon' => 'wsymbol_0010_heavy_rain_showers',
	    'night_icon' => 'wsymbol_0026_heavy_rain_showers_night',
	  ),
	  296 => 
	  array (
	    'code' => '296',
	    'description' => 'Light rain',
	    'day_icon' => 'wsymbol_0018_cloudy_with_heavy_rain',
	    'night_icon' => 'wsymbol_0034_cloudy_with_heavy_rain_night',
	  ),
	  293 => 
	  array (
	    'code' => '293',
	    'description' => 'Patchy light rain',
	    'day_icon' => 'wsymbol_0017_cloudy_with_light_rain',
	    'night_icon' => 'wsymbol_0033_cloudy_with_light_rain_night',
	  ),
	  284 => 
	  array (
	    'code' => '284',
	    'description' => 'Heavy freezing drizzle',
	    'day_icon' => 'wsymbol_0021_cloudy_with_sleet',
	    'night_icon' => 'wsymbol_0037_cloudy_with_sleet_night',
	  ),
	  281 => 
	  array (
	    'code' => '281',
	    'description' => 'Freezing drizzle',
	    'day_icon' => 'wsymbol_0021_cloudy_with_sleet',
	    'night_icon' => 'wsymbol_0037_cloudy_with_sleet_night',
	  ),
	  266 => 
	  array (
	    'code' => '266',
	    'description' => 'Light drizzle',
	    'day_icon' => 'wsymbol_0017_cloudy_with_light_rain',
	    'night_icon' => 'wsymbol_0033_cloudy_with_light_rain_night',
	  ),
	  263 => 
	  array (
	    'code' => '263',
	    'description' => 'Patchy light drizzle',
	    'day_icon' => 'wsymbol_0009_light_rain_showers',
	    'night_icon' => 'wsymbol_0025_light_rain_showers_night',
	  ),
	  260 => 
	  array (
	    'code' => '260',
	    'description' => 'Freezing fog',
	    'day_icon' => 'wsymbol_0007_fog',
	    'night_icon' => 'wsymbol_0007_fog',
	  ),
	  248 => 
	  array (
	    'code' => '248',
	    'description' => 'Fog',
	    'day_icon' => 'wsymbol_0007_fog',
	    'night_icon' => 'wsymbol_0007_fog',
	  ),
	  230 => 
	  array (
	    'code' => '230',
	    'description' => 'Blizzard',
	    'day_icon' => 'wsymbol_0020_cloudy_with_heavy_snow',
	    'night_icon' => 'wsymbol_0036_cloudy_with_heavy_snow_night',
	  ),
	  227 => 
	  array (
	    'code' => '227',
	    'description' => 'Blowing snow',
	    'day_icon' => 'wsymbol_0019_cloudy_with_light_snow',
	    'night_icon' => 'wsymbol_0035_cloudy_with_light_snow_night',
	  ),
	  200 => 
	  array (
	    'code' => '200',
	    'description' => 'Thundery outbreaks in nearby',
	    'day_icon' => 'wsymbol_0016_thundery_showers',
	    'night_icon' => 'wsymbol_0032_thundery_showers_night',
	  ),
	  185 => 
	  array (
	    'code' => '185',
	    'description' => 'Patchy freezing drizzle nearby',
	    'day_icon' => 'wsymbol_0021_cloudy_with_sleet',
	    'night_icon' => 'wsymbol_0037_cloudy_with_sleet_night',
	  ),
	  182 => 
	  array (
	    'code' => '182',
	    'description' => 'Patchy sleet nearby',
	    'day_icon' => 'wsymbol_0021_cloudy_with_sleet',
	    'night_icon' => 'wsymbol_0037_cloudy_with_sleet_night',
	  ),
	  179 => 
	  array (
	    'code' => '179',
	    'description' => 'Patchy snow nearby',
	    'day_icon' => 'wsymbol_0013_sleet_showers',
	    'night_icon' => 'wsymbol_0029_sleet_showers_night',
	  ),
	  176 => 
	  array (
	    'code' => '176',
	    'description' => 'Patchy rain nearby',
	    'day_icon' => 'wsymbol_0009_light_rain_showers',
	    'night_icon' => 'wsymbol_0025_light_rain_showers_night',
	  ),
	  143 => 
	  array (
	    'code' => '143',
	    'description' => 'Mist',
	    'day_icon' => 'wsymbol_0006_mist',
	    'night_icon' => 'wsymbol_0006_mist',
	  ),
	  122 => 
	  array (
	    'code' => '122',
	    'description' => 'Overcast',
	    'day_icon' => 'wsymbol_0004_black_low_cloud',
	    'night_icon' => 'wsymbol_0004_black_low_cloud',
	  ),
	  119 => 
	  array (
	    'code' => '119',
	    'description' => 'Cloudy',
	    'day_icon' => 'wsymbol_0003_white_cloud',
	    'night_icon' => 'wsymbol_0004_black_low_cloud',
	  ),
	  116 => 
	  array (
	    'code' => '116',
	    'description' => 'Partly Cloudy',
	    'day_icon' => 'wsymbol_0002_sunny_intervals',
	    'night_icon' => 'wsymbol_0004_black_low_cloud',
	  ),
	  113 => 
	  array (
	    'code' => '113',
	    'description' => 'Clear/Sunny',
	    'day_icon' => 'wsymbol_0001_sunny',
	    'night_icon' => 'wsymbol_0008_clear_sky_night',
	  ),
	);
}
?>