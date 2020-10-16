<?php

namespace SMSkin\CliCo\Exceptions;

use Exception;

class HttpException extends Exception
{
	/**
	 * @var string|null
	 */
	public $json;

	/**
	 * @param string $json
	 * @return HttpException
	 */
	public function setJson(string $json): HttpException
	{
		$this->json = $json;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getJson(): ?string
	{
		return $this->json;
	}
}
