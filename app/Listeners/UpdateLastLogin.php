<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\User;
use App\Events\UserLastLogin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateLastLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLastLogin  $event
     * @return void
     */
    public function handle(UserLastLogin $event)
    {
        $userInfo = $event->user;
        $user = User::findOrFail($userInfo->id);
        $user->update([
            'last_login' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
