<?php

namespace App\Providers;

use App\Models\Application;
use App\Models\Profile;
use App\Models\User;
use App\Policies\ApplicationPolicy;
use App\Policies\ProfilePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Profile::class => ProfilePolicy::class,
        Application::class => ApplicationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function (User $user, $ability) {
            if ($user->isAdmin()) {
                return true;
            }
        });
    }
}
