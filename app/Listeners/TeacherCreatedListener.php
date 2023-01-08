<?php

namespace App\Listeners;

use App\Events\TeacherCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class TeacherCreatedListener
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
     * @param  \App\Events\TeacherCreatedEvent  $event
     * @return void
     */
    public function handle()
    {
        Log::info('New teacher added successfully');
    }
}
