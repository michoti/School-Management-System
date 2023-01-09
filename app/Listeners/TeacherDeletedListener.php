<?php

namespace App\Listeners;

use App\Events\TeacherDeletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class TeacherDeletedListener
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
     * @param  \App\Events\TeacherDeletedEvent  $event
     * @return void
     */
    public function handle()
    {
        Log::info('Teacher has been deleted successfully');
    }
}
