<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;
use App\Models\City;
use App\Models\User;
use App\Models\Category;
use App\Models\AddImage;

class Add extends Model
{
    use HasFactory;
    protected $table = 'adds';
    // public $timestamps = false;
    protected $fillable = ['id', 'type', 'title', 'image', 'user_id', 'region_id', 'city_id', 'category_id', 'car_type', 'model', 'size', 'price', 'address', 'details', 'status', 'is_deleted', 'created_at', 'updated_at'];

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

    public function images() {
        return  $this->hasMany(AddImage::class, 'add_id' , 'id');
    }
}
