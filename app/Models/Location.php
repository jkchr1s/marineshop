<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    /**
     * One-to-one relationship to LocationType
     *
     * @return void
     */
    function locationType()
    {
        return $this->hasOne(LocationType::class);
    }

    /**
     * One-to-one relationship to customer
     *
     * @return void
     */
    function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
