<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'vehicle_type_id',
        'vehicle_make_id',
        'vehicle_model_id',
        'vin',
    ];

    /**
     * One-to-one inverse relationship to Customer
     *
     * @return void
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * One-to-one relationship to VehicleMake
     *
     * @return void
     */
    public function make()
    {
        return $this->hasOne(VehicleMake::class);
    }

    /**
     * One-to-one relationship to VehicleModel
     *
     * @return void
     */
    public function model()
    {
        return $this->hasOne(VehicleModel::class);
    }

    /**
     * One-to-many relationship to VehicleNote
     *
     * @return void
     */
    public function notes()
    {
        return $this->hasMany(VehicleNote::class);
    }

    /**
     * One-to-many relationship to VehiclePart
     *
     * @return void
     */
    public function parts()
    {
        return $this->hasMany(VehiclePart::class);
    }

    /**
     * One-to-one relationship to VehicleType
     *
     * @return void
     */
    public function type()
    {
        return $this->hasOne(VehicleType::class);
    }
}
