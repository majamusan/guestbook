<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guestbook extends Model
{
    protected $fillable = [
        'entry', 'date', 'feeling','user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    public function responses(){
        return $this->hasMany('App\responses');
    }
    
}
