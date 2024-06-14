<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $fillable = [
        'user_id_from',
        'user_id_to',
        'amount',
    ];

    public function from(){
        return $this->belongsTo(User::class, 'user_id_from', 'id');
    }

    public function to(){
        return $this->belongsTo(User::class, 'user_id_to', 'id');
    }
}
