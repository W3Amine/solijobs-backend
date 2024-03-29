<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\EmployerProfile;
use App\Models\CandidateProfile;
use Illuminate\Support\Facades\Gate;
use App\Policies\EmployerProfilePolicy;
use App\Policies\CandidateProfilePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        EmployerProfile::class => EmployerProfilePolicy::class,
        CandidateProfile::class => CandidateProfilePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        Gate::define('GetAndSetAuthEmployerData', function (User $user) {
            return $user->role === User::EMPLOYER;
        });

        Gate::define('GetAndSetAuthCandidateData', function (User $user) {
            return $user->role === User::CANDIDATE;
        });

        Gate::define('Upload_CV', function (User $user) {
            return $user->role === User::CANDIDATE;
        });
    }
}