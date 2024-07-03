<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'add_id', 'user_id', 'booking_days', 'contact_with', 'status', 'user_review', 'created_at', 'updated_at'];

    public function add()
    {
        return $this->belongsTo(Add::class,'add_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
