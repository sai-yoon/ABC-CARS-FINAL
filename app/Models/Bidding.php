<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'car_id', 'amount', 'status','is_active' ];


    /**
     * Get the user that owns the Bidding
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
  public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}