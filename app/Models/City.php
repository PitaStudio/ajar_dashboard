<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class City extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function region()
    {
        return $this->belongsTo(Region::class,'region_id');
    }
}
