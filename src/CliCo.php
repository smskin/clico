<?php

namespace SMSkin\CliCo;

use GuzzleHttp\Exception\GuzzleException;
use SMSkin\CliCo\Contracts\ICliCo;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

class CliCo implements ICliCo
{
	/**
	 * @var Client
	 */
	protected $client;

	/**
	 * @var string
	 */
	protected $apiToken;

	protected $baseUrl = 'https://cli.co';

	public function __construct(string $apiToken)
	{
		$this->apiToken = $apiToken;
	}

	/**
	 * @param Models\LinkRequest $request
	 * @return string
	 * @throws Exceptions\ValidationException
	 * @throws Exceptions\HttpException
     */
	public function singleLink(Models\LinkRequest $request): string
	{
		try {
			$response = $this->post(
				'/api/v1/link',
				$request->serialize()
			);
			$contents = json_decode($response->getBody()->getContents());
			return $contents->result;
		} catch (ClientException $exception){
			$exception = (new Exceptions\HttpException(
				$exception->getCode().' '.$exception->getResponse()->getReasonPhrase(),
				$exception->getCode(),
				$exception->getPrevious()
			))
				->setJson($exception->getResponse()->getBody()->getContents());
			throw $exception;
		}
	}

	/**
	 * @param Models\LinkRequest[] $requests
	 * @return string[]
	 * @throws Exceptions\ValidationException
	 * @throws Exceptions\HttpException
     */
	public function multipleLinks(array $requests): array
	{
		$data = [];
		foreach ($requests as $request){
			$data[] = $request->serialize();
		}

		try {
			$response = $this->post(
				'/api/v1/links',
				$data
			);
			$contents = json_decode($response->getBody()->getContents());
			return $contents->result;
		} catch (ClientException $exception){
			$exception = (new Exceptions\HttpException(
				$exception->getCode().' '.$exception->getResponse()->getReasonPhrase(),
				$exception->getCode(),
				$exception->getPrevious()
			))
				->setJson($exception->getResponse()->getBody()->getContents());
			throw $exception;
		}
	}

	/**
	 * @param string $url
	 * @param array $formData
	 * @return ResponseInterface
	 * @throws ClientException
     */
	private function post(string $url, array $formData){
		return $this->getClient()->post(
			$this->baseUrl.$url,
			[
				'headers'=>[
					'Content-Type'=>'application/json',
					'Authorization'=>'Bearer '.$this->apiToken
				],
				'body'=> json_encode($formData)
			]
		);
	}

	private function getClient(): Client
	{
		if (!$this->client){
			$this->client = new Client();
		}
		return $this->client;
	}
}
