<?php

namespace TDM\VolleyScores\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use TDM\VolleyScores\VolleyScores;

class LaravelServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/volleyscores.php' => config_path('volleyscores.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/volleyscores.php', 'volleyscores');

        $this->app->singleton(VolleyScores::class, function() {

            if(config('volleyscores.logging')) {
                $messageFormats = [
                    'REQUEST: {method} - {uri} - HTTP/{version} - {req_headers} - {req_body}',
                    'RESPONSE: {code} - {res_body}',
                ];

                $stack = HandlerStack::create();

                Collection::make($messageFormats)->each(function ($messageFormat) use ($stack) {
                    // We'll use unshift instead of push, to add the middleware to the bottom of the stack, not the top
                    $stack->unshift(
                        Middleware::log(
                            with(new Logger('guzzle-log'))->pushHandler(
                                new RotatingFileHandler(storage_path('logs/volleyscores.log'))
                            ),
                            new MessageFormatter($messageFormat)
                        )
                    );
                });
            }

            return new VolleyScores(new Client([
                'base_uri' => config('volleyscores.url'),
                'timeout'  => config('volleyscores.timeout'),
                'stack' => $stack ?? null,
            ]));
        });
    }
}
