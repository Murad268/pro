<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class MessageErrorProvider extends ServiceProvider
{
   /**
    * Register services.
    */
   public function register(): void
   {
      //
   }

   /**
    * Bootstrap services.
    */
   public function boot()
   {
      Blade::directive('error_message', function ($expression) {
         return "<?php if (session('success')): ?>
        <div class='alert alert-danger mt-2' role='alert'>
            <?php echo session('success'); ?>
        </div>
    <?php endif; ?>";
      });
   }
}
