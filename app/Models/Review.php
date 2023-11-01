<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class,'userID');
    }
    public function tour(){
        return $this->belongsTo(Tour::class,'tourID');
    }
}
