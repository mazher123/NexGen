<?php

namespace App\Repositories;

use App\TopUp;
use DB;

class TopupRepository
{

    protected $topUp;

    public function __construct(TopUp $topUp)
    {
        $this->topUp = $topUp;
    }

    public function fetchTopUser()
    {
        $startDate = $this->dateTimeInfo();
        $data = $this->topUp->topUsers($startDate);
        return  $data;
    }

    public function dateTimeInfo()
    {
        date_default_timezone_set('Asia/Dhaka');
        $startDate = date("Y-m-d H:i:s", strtotime("yesterday"));
        return $startDate;
    }
}
