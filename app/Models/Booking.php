<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Room;


class Booking extends Model
{
    use HasFactory;

    function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    function room()
    {
        return $this->belongsTo(Room::class);
    }
}
