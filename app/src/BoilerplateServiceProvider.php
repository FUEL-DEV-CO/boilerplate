<?php namespace Fueldevco\Boilerplate;

use Illuminate\Support\ServiceProvider;

/**
 * Class BoilerplateServiceProvider
 *
 * @package Fueldevco\Boilerplate
 */
class BoilerplateServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap classes for packages.
	 *
	 * @return void
	 */
	public function boot()
    {

    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register(){}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides(){}
}