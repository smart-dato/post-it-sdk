<?php

declare(strict_types=1);

namespace SmartDato\PostIt;

use Illuminate\Support\ServiceProvider;

/**
 * Registers the SDK config (`config/post-it-sdk.php`) under the
 * `post-it-sdk` key and exposes it for publishing via:
 *
 *     php artisan vendor:publish --tag=post-it-sdk-config
 *
 * The SDK does not bind any singletons — the {@see PostIt}
 * facade is constructed per credential pair by the consumer application.
 */
final class PostItServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/post-it-sdk.php',
            'post-it-sdk',
        );
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/post-it-sdk.php' => $this->app->configPath('post-it-sdk.php'),
            ], 'post-it-sdk-config');
        }
    }
}
