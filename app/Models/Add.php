<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Region;
use App\Models\City;
use App\Models\User;
use App\Models\Category;

class Add extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function region() {
        return  $this->belongsTo(Region::class, 'region_id' , 'id');
    }

    public function city() {
        return  $this->belongsTo(City::class, 'city_id' , 'id');
    }

    public function user() {
        return  $this->belongsTo(User::class, 'user_id' , 'id');
    }
    
    public function category() {
        return  $this->belongsTo(Category::class, 'category_id' , 'id');
    }
}
