<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Add;

class Banner extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function add() {
        return  $this->belongsTo(Add::class, 'add_id' , 'id');
    }

}
