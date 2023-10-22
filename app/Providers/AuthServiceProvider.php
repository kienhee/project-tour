<?php

namespace App\Providers;

use App\Models\Module;
use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        // 1 lấy danh sách modules
        $modules = Module::all();
        if ($modules->count() > 0) {
            foreach ($modules as $module) {
                Gate::define($module->routeName, function (User $user) use ($module) {
                    $roleJson = json_decode($user->group->permissions, true);
                    if (!empty($roleJson)) {
                        $roleData = $roleJson;
                        return isRole($roleData, $module->routeName);
                    }
                    return false;
                });
            }
        }
    }
}
