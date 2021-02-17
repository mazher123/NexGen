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

    public function topUsers($date)
    {
        $data = DB::table('topups')
            ->selectRaw('topups.*, COUNT(topups.user_id) AS count')
            ->groupBy('topups.user_id')
            ->orderBy('count', 'desc')
            ->where('topups.created_at', $date)
            ->limit(10)
            ->get();
        return $data;
    }
}
