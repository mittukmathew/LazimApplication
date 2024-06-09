<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
      
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Assuming you have a users table and a User model
    }
}
