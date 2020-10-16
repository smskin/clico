<?php

namespace SMSkin\CliCo\Models;

use SMSkin\CliCo\Exceptions\ValidationException;

class LinkRequest
{
	/**
	 * @var string
	 */
	public $targetUrl;

	/**
	 * @var string|null
	 */
	public $domain;

	/**
	 * @var bool|null
	 */
	public $isDeep;

	/**
	 * @var string|null
	 */
	public $idCampaign;

	/**
	 * @var UtmModel|null
	 */
	public $utm;

	/**
	 * @var string|null
	 */
	public $callbackUrl;

	/**
	 * @param string $domain
	 * @return LinkRequest
	 */
	public function setDomain(string $domain): LinkRequest
	{
		$this->domain = $domain;
		return $this;
	}

	/**
	 * @param bool $isDeep
	 * @return LinkRequest
	 */
	public function setIsDeep(bool $isDeep): LinkRequest
	{
		$this->isDeep = $isDeep;
		return $this;
	}

	/**
	 * @param string $idCampaign
	 * @return LinkRequest
	 */
	public function setIdCampaign(string $idCampaign): LinkRequest
	{
		$this->idCampaign = $idCampaign;
		return $this;
	}

	/**
	 * @param UtmModel $utm
	 * @return LinkRequest
	 */
	public function setUtm(UtmModel $utm): LinkRequest
	{
		$this->utm = $utm;
		return $this;
	}

	/**
	 * @param string $callbackUrl
	 * @return LinkRequest
	 */
	public function setCallbackUrl(string $callbackUrl): LinkRequest
	{
		$this->callbackUrl = $callbackUrl;
		return $this;
	}

	/**
	 * @param string $targetUrl
	 * @return LinkRequest
	 */
	public function setTargetUrl(string $targetUrl): LinkRequest
	{
		$this->targetUrl = $targetUrl;
		return $this;
	}

	/**
	 * @throws ValidationException
	 */
	public function validate(): void
	{
		if (!$this->targetUrl){
			throw new ValidationException('Target url not defined');
		}
	}

	/**
	 * @return string[]
	 * @throws ValidationException
	 */
	public function serialize(): array
	{
		$this->validate();

		$data = [
			'target_url'=>$this->targetUrl
		];
		if (!is_null($this->domain)){
			$data['domain'] = $this->domain;
		}
		if (!is_null($this->isDeep)){
			$data['is_deep'] = $this->isDeep;
		}
		if (!is_null($this->idCampaign)){
			$data['id_campaign'] = $this->idCampaign;
		}
		if (!is_null($this->utm)){
			$utm = $this->utm;
			if (!is_null($utm->phone)){
				$data['utm_phone'] = $utm->phone;
			}
			if (!is_null($utm->source)){
				$data['utm_source'] = $utm->source;
			}
			if (!is_null($utm->medium)){
				$data['utm_medium'] = $utm->medium;
			}
			if (!is_null($utm->campaign)){
				$data['utm_campaign'] = $utm->campaign;
			}
			if (!is_null($utm->content)){
				$data['utm_content'] = $utm->content;
			}
			if (!is_null($utm->term)){
				$data['utm_term'] = $utm->term;
			}
		}
		if (!is_null($this->callbackUrl)){
			$data['callback_url'] = $this->callbackUrl;
		}
		return $data;
	}
}
