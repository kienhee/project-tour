<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    protected $casts = [
        'date_of_department' => 'datetime',
        'return_date' => 'datetime',
    ];
    use HasFactory, SoftDeletes;
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
