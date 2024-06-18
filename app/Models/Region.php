<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\City;

class Region extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function cities() {
        return  $this->hasMany(City::class, 'region_id' , 'id');
    }
}
