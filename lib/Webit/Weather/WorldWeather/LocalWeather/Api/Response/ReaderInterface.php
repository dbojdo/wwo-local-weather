<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Api\Response;

interface ReaderInterface {
	/**
	 * 
	 * @param string $output
	 * @return ResponseInterface
	 */
	public function readOutput($output);
	
	/**
	 * Get readeable data format 
	 * @return string
	 */
	public function getFormat();
}
?>
