<?php

namespace App\Services;

use App\Jobs\TopUserFinder;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Repositories\TopupRepository;
use App\Repositories\TopTopupRepository;

class FetchTopUser
{
    use DispatchesJobs;

    protected $topUp;
    protected $topTopUp;

    public function __construct(TopupRepository $topUp, TopTopupRepository  $topTopUp)
    {
        $this->topUp = $topUp;
        $this->topTopUp = $topTopUp;
    }

    public function getTopUser()
    {
        $data = $this->topTopUp->getTopUsers();
        return $data;
    }

    public function topTopUpUsers()
    {
        $data = $this->topUp->fetchTopUser();
        return $data;
    }

    public  function userInformation()
    {
        $data = $this->topUp->fetchTopUser();
        $data = $this->topTopUp->createTopUsersTable($data);
        $data = $this->topTopUp->getTopUsers();
        return $data;
    }

    public function insertTopTopUpUser($data)
    {
        $data = $this->topTopUp->createTopUsersTable($data);
        return $data;
    }

    public function searchUserName($name, $email, $minuser, $maxuser)
    {
        $data = $this->topTopUp->searchTopUserName($name, $email, $minuser, $maxuser);
        return $data;
    }
}
