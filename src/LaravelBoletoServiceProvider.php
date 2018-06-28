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
      _DIR_.'/Boleto/Render/View' => base_path('/resources/views/vendor/laravelboleto');
    ]);
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
