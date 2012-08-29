# World Weather Online - Local Weather API implementation

## What is this?
Implementation of Local Weather API from http://www.worldweatheronline.com/

## Usage
    $apiKey = 'your api key';
    $request = new CityRequest($apiKey);
    $request->setFormat(CityRequest::FORMAT_JSON); // json is default format
    $request->setNumberOfDays(3); // default 2
    $request->setCity('New York');
    $request->setCountry('USA');
    
    $proxy = new CurlProxy();
    $response = $proxy->performRequest($request);
    if($response->getSuccess()) {
        echo $response->getCurrentWeather() . "\n";
        foreach($response->getWeatherList() as $weather) {
            echo $weather . "\n";
        }
    } else {
        foreach($response->getErrors() as $error) {
            echo $error . "\n";
        }
    }

## TODO:
* Implementation of XML Response format
* Implementation of CSV Response format
* Tests
