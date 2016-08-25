<?php

namespace Reactor\Providers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Nuclear\Hierarchy\Node;
use Nuclear\Hierarchy\NodeRepository;

class ReactorServiceProvider extends ServiceProvider {

    const VERSION = '3.0-alpha.1';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHelpers();

        $this->registerPaths();
    }

    /**
     * Registers helper methods
     */
    protected function registerHelpers()
    {
        require_once __DIR__ . '/../Support/helpers.php';

        require_once  __DIR__ . '/../Html/Builders/snippets.php';
    }

    /**
     * Sets the extension path
     */
    protected function registerPaths()
    {
        $this->app['path.routes'] = base_path('routes');
    }

    /**
     * Bootstrap any application services.
     *
     * @param NodeRepository $nodeRepository
     */
    public function boot(NodeRepository $nodeRepository)
    {
        $this->registerValidationRules();

        $this->registerViewBindings($nodeRepository);
    }

    /**
     * Registers validation rules
     */
    protected function registerValidationRules()
    {
        $rules = [
            'not_reserved_name' => 'NotReservedName',
            'date_mysql'        => 'DateMysql'
        ];

        foreach ($rules as $name => $rule)
        {
            Validator::extend($name, 'Reactor\Support\FormValidator@validate' . $rule);
        }
    }

    /**
     * Registers view bindings
     *
     * @param NodeRepository $nodeRepository
     */
    protected function registerViewBindings(NodeRepository $nodeRepository)
    {
        if ( ! is_installed())
        {
            return;
        }

        view()->share('home', $nodeRepository->getHome());

        view()->composer('*', function ($view) use ($nodeRepository)
        {
            $view->with('user', auth()->user());
        });

        view()->composer('partials.navigation.nodes', function ($view)
        {
            $view->with('leafs', Node::whereIsRoot()->defaultOrder()->get());
        });
    }

}
