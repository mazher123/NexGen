<?php

namespace App\Repositories;

use App\TopTopupUser;
use DB;

class TopTopupRepository
{
    protected $topTopUp;
    public function __construct(TopTopupUser $topTopUp)
    {
        $this->topTopUp = $topTopUp;
    }

    public function createTopUsersTable($data)
    {
        $TopTopupUser =  $this->topTopUp->all();
        if (!$TopTopupUser->isEmpty()) {
            $this->topTopUp->deleteAllRow();
        }
        $data = $this->topTopUp->insertData($data);
        return  $data;
    }

    public function getTopUsers()
    {
        $data =  $this->topTopUp->getUserData();
        return $data;
    }

    public function searchTopUserName($value)
    {
        $data = $this->topTopUp->searchUser($value);
        return $data;
    }
}
