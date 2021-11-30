<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $filable=[0,'user_id','title','notes'];
    protected $table='notes';

    // make a relation ship

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
