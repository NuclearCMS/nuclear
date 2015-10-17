<?php

namespace Reactor\Providers;


use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ReactorServiceProvider extends ServiceProvider {

    const VERSION = '2.0.0';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHelpers();

        $this->setTimeLocale();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setTheme();

        $this->registerViewBindings();

        $this->registerCustomValidationRules();
    }

    /**
     * Registers helper methods
     *
     * @return void
     */
    protected function registerHelpers()
    {
        require __DIR__ . '/../Support/helpers.php';

        require __DIR__ . '/../Http/snippets.php';
    }

    /**
     * Sets the time locale for locale based time outputting
     */
    protected function setTimeLocale()
    {
        setlocale(LC_TIME, $this->app->getLocale());

        Carbon::setLocale($this->app->getLocale());
    }

    /**
     * Sets the theme
     *
     * @return void
     */
    protected function setTheme()
    {
        // We check if the request segment has 'reactor'
        if ($this->app['request']->segment(1) === 'reactor')
        {
            \Theme::set('reactor_default');
        }
    }

    /**
     * Shares information with views
     *
     * @return void
     */
    protected function registerViewBindings()
    {
        view()->composer('*', function ($view)
        {
            $view->with('user', auth()->user());
        });
    }

    /**
     * Registers custom validation rules
     *
     * @return void
     */
    protected function registerCustomValidationRules()
    {
        Validator::extend('unique_setting', function ($attribute, $value, $parameters, $validator)
        {
            if(isset($parameters[0]) && $value === $parameters[0])
            {
                return true;
            }

            return ! settings()->hasSetting($value);
        });

        Validator::extend('unique_setting_group', function ($attribute, $value, $parameters, $validator)
        {
            if(isset($parameters[0]) && $value === $parameters[0])
            {
                return true;
            }

            return ! settings()->hasGroup($value);
        });
    }

}
