<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'semail',
        'phone',
        'shipaddress',
        'city',
        'country',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
