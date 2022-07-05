<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_ALL, 'IND');

        Blade::directive('currency', function ( $expression ) { return "<?php echo number_format($expression,0,',','.'); ?>"; });
        Blade::directive('amount', function ( $expression ) { return "<?php echo number_format($expression,0,',','.'); ?>"; });
    }
}
