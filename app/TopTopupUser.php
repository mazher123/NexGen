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


}
