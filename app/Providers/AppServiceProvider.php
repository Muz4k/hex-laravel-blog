<?php

namespace App\Providers;

use App\Articles;
use Elasticsearch\Client;
use Illuminate\Support\ServiceProvider;
use Elasticsearch\ClientBuilder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Articles\ArticlesRepository::class, function () {
            // Это полезно, если мы хотим выключить наш кластер
            // или при развертывании поиска на продакшене
            if (!config('services.search.enabled')) {
                return new Articles\EloquentRepository();
            }

            return new Articles\ElasticsearchRepository(
                $this->app->make(Client::class)
            );
        });

        $this->bindSearchClient();
    }

    private function bindSearchClient()
    {
        $this->app->bind(Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts($app['config']->get('services.search.hosts'))
                ->build();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
