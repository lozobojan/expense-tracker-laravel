<?php

namespace App\Providers;

use App\Providers\TestEvent1;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TestListener1
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
     * @param  \App\Providers\TestEvent1  $event
     * @return void
     */
    public function handle(TestEvent1 $event)
    {
        //
    }
}
