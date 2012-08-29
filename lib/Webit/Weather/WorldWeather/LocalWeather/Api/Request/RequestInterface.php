<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Api\Request;

/**
 * Represents request object could be performed by ProxyInterface
 * 
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
interface RequestInterface {
	/**
	 * Get format of request
	 * @return string
	 */
	public function getFormat();
		
	/**
	 * Get query string params as array
   * @return array
	 */
	public function getQueryParams();
}
?>
