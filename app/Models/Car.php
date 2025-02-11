<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'make', 'model', 'year', 'price', 'image', 'mileage', 'description','is_active','is_for_bidding'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }
    

}
