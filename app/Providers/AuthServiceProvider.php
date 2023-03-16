<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define("update-article", function (User $user, Article $article){
            return ($article->user_id === $user->id)
                ? Response::allow()
                : Response::deny("Csak a saját cikkedet szerkesztheted");
        });

        Gate::define("create-article", function (User $user){
            return in_array($user->role,["admin","root"])
                ? Response::allow()
                : Response::deny("Csak az admin vagy a root hozhat létre cikket");
        });
    }
}
