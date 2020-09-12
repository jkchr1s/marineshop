<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleNote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle_id',
        'user_id',
        'note',
    ];

    /**
     * One-to-many inverse relationship to User
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * One-to-many inverse relationship to Vehicle
     *
     * @return void
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
