<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class InputErrorProvider extends ServiceProvider
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
        Blade::directive('error_input', function ($expression) {
            return "<?php if (\$errors->has($expression)): ?>
            <div class='alert alert-danger mt-2' role='alert'>
                <?php echo \$errors->first($expression); ?>
            </div>
        <?php endif; ?>";
        });
    }

}
