<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Validator;

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
        Validator::extend('unsigned', function ($attribute, $value, $parameters, $validator) {
            return is_numeric($value) && $value >= 0;
        });

        Validator::replacer('unsigned', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, ':attribute must be an unsigned number.');
        });
        Blade::directive('currency', function ($expression) {
            return "<?php echo 'Rp ' . number_format($expression, 2, ',', '.'); ?>";
        });
    }
}
