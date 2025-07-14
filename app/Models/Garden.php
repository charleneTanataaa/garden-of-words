<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Garden extends Model
{
    protected $fillable = ['user_id', 'flower_id', 'date_grown', 'count'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function flower(){
        return $this->belongsTo(Flower::class);
    }
}
