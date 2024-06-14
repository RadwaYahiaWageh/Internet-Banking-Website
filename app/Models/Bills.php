<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = 'pay_bills';
    protected $fillable = [
        'user_id',
        'organization',
        'amount',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
