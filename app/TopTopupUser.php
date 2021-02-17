<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;

class TopTopupUser extends Model
{
    protected $table = "top_topups_users";


    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    static public function deleteAllRow()
    {
        TopTopupUser::truncate();
    }

   static public function insertData($data)
    {
        foreach ($data as $datas) {
            $data2 = new TopTopupUser();
            $data2->amount = $datas->amount;
            $data2->user_id = $datas->user_id;
            $data2->count = $datas->count;
            $data2->Save();
        }
    }

    public function getUserData()
    {
        $data = TopTopupUser::leftJoin('users', 'top_topups_users.user_id', '=', 'users.id')->paginate(2);
        return $data;
    }


    public function searchUser($value)
    {
        $result = TopTopupUser::leftJoin('users', 'top_topups_users.user_id', '=', 'users.id')
            ->where('users.name', 'LIKE', '%' . $value . '%')->paginate(2);
        return  $result;
    }
}
