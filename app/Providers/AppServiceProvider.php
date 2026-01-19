<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Faculty;
use App\Policies\FacultyPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register Faculty policy mapping
        Gate::policy(Faculty::class, FacultyPolicy::class);

        // Register department display name Blade directive
        \Blade::directive('deptDisplay', function ($expression) {
            return "<?php echo \App\Helpers\DepartmentHelper::getDisplayName($expression); ?>";
        });
    }
}
