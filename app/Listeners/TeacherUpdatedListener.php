<?php

namespace App\Listeners;

use App\Events\TeacherUpdatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class TeacherUpdatedListener
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
     * @param  \App\Events\TeacherUpdatedEvent  $event
     * @return void
     */
    public function handle()
    {
        Log::info('Teacher has been updated successfully');
    }
}
