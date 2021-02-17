<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use App\Jobs\TopUserFinder;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Services\FetchTopUser;

class FetchTopUsers extends Command

{
    use DispatchesJobs;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:previous';

    /**
     * The console command description.
     *
     * @var string
     */


    protected $description = 'Update Top Top up User table';
    protected $fetchTopUsers;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(FetchTopUser $fetchTopUsers)
    {
        parent::__construct();
        $this->fetchTopUsers = $fetchTopUsers;
    }



    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //\Log::info('Making new directory');
        // $data =  $this->fetchTopUsers->topTopUpUsers();
        // $this->fetchTopUsers->insertTopTopUpUser($data);
        dispatch(new TopUserFinder());
    }
}
