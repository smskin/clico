<?php

namespace SMSkin\CliCo\Contracts;

use SMSkin\CliCo\Exceptions\HttpException;
use SMSkin\CliCo\Exceptions\ValidationException;
use SMSkin\CliCo\Models\LinkRequest;

interface ICliCo
{
	/**
	 * @param LinkRequest $request
	 * @return string
	 * @throws ValidationException
	 * @throws HttpException
	 */
	public function singleLink(LinkRequest $request): string;

	/**
	 * @param LinkRequest[] $requests
	 * @return string[]
	 * @throws ValidationException
	 * @throws HttpException
	 */
	public function multipleLinks(array $requests): array;
}
