<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class MessageSuccessProvider extends ServiceProvider
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
      Blade::directive('success_message', function ($expression) {
         return "<?php if (session('success')): ?>
        <div class='alert alert-success mt-2' role='alert'>
            <?php echo session('success'); ?>
        </div>
    <?php endif; ?>";
      });
   }
}
