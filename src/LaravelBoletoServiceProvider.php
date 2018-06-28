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
    // publishes the views of boleto
    $this->publishes([
      __DIR__.'/Boleto/Render/view/' => base_path('/resources/views/vendor/laravelboleto')
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
