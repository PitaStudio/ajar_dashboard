<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $guarded = [];

    public function region()
    {
        return $this->belongsTo(Region::class,'region_id');
    }

    public function add()
    {
        return $this->belongsTo(Add::class,'add_id');
    }

}
