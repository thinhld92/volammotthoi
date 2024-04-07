<?php

namespace App\Providers;

use App\Database\SqlServerConnection;
use App\Models\Category;
use App\Models\WebsiteConfig;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Connection::resolverFor('sqlsrv', function ($connection, $database, $prefix, $config) {
            return new SqlServerConnection($connection, $database, $prefix, $config);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        
        View::composer(['clients.home', 'clients.layouts.partials.header'], function ($view) {
            $canonical = $this->app->request->url();
            $categories = Category::where('show_in_menu', '>', 0)
                    ->where(function($query){
                        return $query->whereNull('parent_id')
                        ->orWhere('parent_id', 0);
                    })
                    ->orderByRaw(
                        "CASE 
                        WHEN slug = 'tin-tuc' THEN 0 
                        when slug = 'su-kien' then 1
                        when slug = 'cam-nang' then 2
                        ELSE 3 END ASC,
                        sort_order asc,
                        name ASC"
                    )
                    ->limit(3)
                    ->get();
            // dd($categories);
            $commonData = [
                'main_menus' => $categories,
                'canonical' => $canonical,
            ];
            $view->with(
                'commonData', $commonData
            );
        });

        View::composer(['clients.*'], function ($view) {
            $configurations = WebsiteConfig::all();
            // Convert configurations to an array
            $configArray = $configurations->pluck('config_value', 'config_name')->toArray();

            // Use $configArray as needed
            // dd($configArray);
            $view->with(
                'website_configs', $configArray
            );
        });
    }
}
