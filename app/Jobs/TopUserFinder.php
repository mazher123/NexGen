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
use App\Services\FetchTopUser;

class TopUserFinder extends Job implements SelfHandling, ShouldQueue
{
    use DispatchesJobs;
    use InteractsWithQueue, SerializesModels;
    


    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $fetchService;

    public function __construct(FetchTopUser $fetchService)
    {
        $this->fetchService = $fetchService;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->fetchService->userInformation();
       // $data = app()->call(TopupController::class . '@' . 'getTopUser');
    }
}
