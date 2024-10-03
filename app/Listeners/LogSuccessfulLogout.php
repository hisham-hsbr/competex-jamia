<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Request;

class LogSuccessfulLogout
{
    /**
     * Handle the event.
     *
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $ipAddress = Request::ip();
        activity()
            ->causedBy($event->user)
            ->performedOn($event->user)
            ->withProperties(["details" => ['event' => 'Logout', 'Ip Address' => $ipAddress]])
            ->log('User logged out');
    }
}