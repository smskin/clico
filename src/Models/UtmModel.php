<?php

namespace SMSkin\CliCo\Models;

class UtmModel
{
	/**
	 * @var string|null
	 */
	public $phone;

	/**
	 * @var string|null
	 */
	public $source;

	/**
	 * @var string|null
	 */
	public $medium;

	/**
	 * @var string|null
	 */
	public $campaign;

	/**
	 * @var string|null
	 */
	public $content;

	/**
	 * @var string|null
	 */
	public $term;

	/**
	 * @param string $phone
	 * @return UtmModel
	 */
	public function setPhone(string $phone): UtmModel
	{
		$this->phone = $phone;
		return $this;
	}

	/**
	 * @param string $source
	 * @return UtmModel
	 */
	public function setSource(string $source): UtmModel
	{
		$this->source = $source;
		return $this;
	}

	/**
	 * @param string $medium
	 * @return UtmModel
	 */
	public function setMedium(string $medium): UtmModel
	{
		$this->medium = $medium;
		return $this;
	}

	/**
	 * @param string $campaign
	 * @return UtmModel
	 */
	public function setCampaign(string $campaign): UtmModel
	{
		$this->campaign = $campaign;
		return $this;
	}

	/**
	 * @param string $content
	 * @return UtmModel
	 */
	public function setContent(string $content): UtmModel
	{
		$this->content = $content;
		return $this;
	}

	/**
	 * @param string $term
	 * @return UtmModel
	 */
	public function setTerm(string $term): UtmModel
	{
		$this->term = $term;
		return $this;
	}
}
