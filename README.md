# Support library for cli.co url shorter service

## Installation
### Laravel
- composer require smskin/clico
- add lines to the config/services.php
~~~
'clico' => [
    'api_token'=>env('CLICO_API_TOKEN','')
]
~~~
- add CLICO_API_TOKEN to .env file
~~~
CLICO_API_TOKEN=[API TOKEN]
~~~
- You can use the CliCo facade
~~~
try {
    $link = CliCo::singleLink(
	    (new LinkRequest())
            ->setTargetUrl('https://msk.wed-expert.com')
            ->setUtm(
                (new UtmModel())
                    ->setPhone('7911111111111')
                )
            );
} catch (HttpException $exception){
	dd($exception);
} catch (ValidationException $exception){
    dd($exception);
}
~~~
### Any PHP service
- composer require smskin/clico
- You can use the library as any class
~~~
try {
    $link = (new CliCo(
        '[API TOKEN]'
    ))->singleLink(
        (new LinkRequest())
            ->setTargetUrl('https://msk.wed-expert.com')
            ->setUtm(
                (new UtmModel())
                    ->setPhone('7911111111111')
                )
            );
} catch (HttpException $exception){
    dd($exception);
} catch (ValidationException $exception){
    dd($exception);
}
~~~
## Using
- singleLink
- multipleLinks
