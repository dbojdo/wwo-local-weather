<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Api;
use Webit\Weather\WorldWeather\LocalWeather\Api\Request\RequestInterface;

interface ProxyInterface {
	/**
	 * 
	 * @param RequestInterface $request
	 * @return ResponseInterface
	 */
	public function performRequest(RequestInterface $request);
}
?>