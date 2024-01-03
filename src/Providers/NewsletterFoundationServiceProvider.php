<?php

namespace Netflex\NewsletterFoundation\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Netflex\NewsletterFoundation\Console\Commands\RegisterComponentsCommand;
use Netflex\NewsletterFoundation\Console\Commands\RegisterTemplateCommand;

class NewsletterFoundationServiceProvider extends ServiceProvider
{

    public function boot()
    {
      $this->publishes([
        __DIR__ . '/../../config/newsletter-foundation.php' => $this->app->configPath('newsletter-foundation.php')
      ], 'config');

      $this->mergeConfigFrom(
        __DIR__ . '/../../config/newsletter-foundation.php',
        'newsletter-foundation'
      );

      $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'nnf');

      $this->loadViewComponentsAs('nnf', [
        \Netflex\NewsletterFoundation\View\Components\Image::class,
        \Netflex\NewsletterFoundation\View\Components\EntryContent::class,
      ]);

      $this->publishes([
        __DIR__ . '/../../resources/views' => base_path('resources/views/vendor/netflex-newsletter-foundation'),
      ], 'views');

      if ($this->app->runningInConsole()) {
        $this->commands([
            RegisterComponentsCommand::class,
            RegisterTemplateCommand::class,
        ]);
    }

    }

}