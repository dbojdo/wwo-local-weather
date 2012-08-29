<?php
namespace Webit\Weather\WorldWeather\LocalWeather\Response;
use Webit\Weather\WorldWeather\LocalWeather\Api\Response\RequestInterface;

class Request implements RequestInterface {
	protected $type;
	protected $query;
	
	public function __construct($type, $query) {
		$this->type = $type;
		$this->query = $query;
	}
	
	public function getType() {
		return $this->type;
	}
	
	public function getQuery() {
		return $this->query;
	}
}
?>