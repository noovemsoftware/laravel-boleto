<?php
namespace Eduardokum\LaravelBoleto;

use Illuminate\Support\ServiceProvider;

class LaravelBoletoServiceProvider extends ServiceProvider
{

  /**
   * Perform post-registration booting of services.
   *
   * @return void
   */
  public function boot()
  {

    // override standard boleto views
    $this->loadViewsFrom(__DIR__.'/Boleto/Render/view/', 'laravelboleto');

    // publishes the views of boleto
    $this->publishes([
      __DIR__.'/Boleto/Render/view/' => resource_path('/views/vendor/laravelboleto')
    ], 'views');
    
  }

  /**
  * Register the service provider.
  *
  * @return void
  */
  public function register()
  {
    //
  }

}
