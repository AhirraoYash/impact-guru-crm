<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // This list tells Laravel: "It is okay to save these 3 things."
    protected $fillable = [
        'name',
        'email',
        'phone',
        'profile_image'
    ];
}