<?php

namespace SMSkin\CliCo;

class Facade extends \Illuminate\Support\Facades\Facade
{
	protected static function getFacadeAccessor()
	{
		return CliCo::class;
	}
}
