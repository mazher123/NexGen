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
            TopTopupUser::truncate();
        }
        foreach ($data as $datas) {
            $data2 = new TopTopupUser();
            $data2->amount = $datas->amount;
            $data2->user_id = $datas->user_id;
            $data2->count = $datas->count;
            $data2->Save();
        }
        return "sucess";
    }

    public function getTopUsers()
    {
        $data = TopTopupUser::leftJoin('users', 'top_topups_users.user_id', '=', 'users.id')->paginate(2);
        return $data;
    }

    public function searchTopUserName($name, $email, $minuser, $maxuser)
    {
        $result = TopTopupUser::leftJoin('users', 'top_topups_users.user_id', '=', 'users.id')
            ->where('users.name', 'LIKE', '%' . $name . '%');
        if ($email != "") {
            $result = $result->orwhere('users.email', 'LIKE', '%' . $email . '%');
        }
        if ($minuser != "") {
            $result = $result->orwhere('count', '<=', $minuser);
        }
        if ($maxuser != "") {
            $result = $result->orwhere('count', '>=', $maxuser);
        }


        // ->orwhere('top_topups_users.amount', '<=', $minuser)
        // ->orwhere('top_topups_users.amount', '>=', $maxuser)
        $result = $result->paginate(2);

        // dd($result);
        return  $result;
    }
}
