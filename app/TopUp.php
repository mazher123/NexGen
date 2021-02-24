<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;

class TopUp extends Model
{
    protected $table = "topups";


    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }


}
