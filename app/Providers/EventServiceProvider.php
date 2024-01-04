<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();

        Model::retrieved(function ($user) {
            if (Auth::id() === $user->id) {
                $user->logged_in_at = now();
                $user->save();
            }
        });

        Event::listen(Login::class, function ($login) {
            $user = $login->user;
            if ($user instanceof Admin || $user instanceof User) {
                $user->logged_in_at = now();
                $user->logged_in_counts++;
                $user->save();
            }
        });

        Event::listen(Logout::class, function ($logout) {
            $user = $logout->user;
            if ($user instanceof Admin || $user instanceof User) {
                $user->logged_out_at = now();
                $user->save();
            }
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
