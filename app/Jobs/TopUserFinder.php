<?php

namespace App\Jobs;

use App\Http\Controllers\TopupController;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Traits\Scheduleable;

class TopUserFinder extends Job implements SelfHandling, ShouldQueue
{
    use DispatchesJobs;
    use InteractsWithQueue, SerializesModels;
    use Scheduleable;


    /**
     * Create a new job instance.
     *
     * @return void
     */



    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = app()->call(TopupController::class . '@' . 'getTopUser');
    }
}
