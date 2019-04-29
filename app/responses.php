<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class responses extends Model
{
    protected $fillable = [
        'responce', 'guestbook_id', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
