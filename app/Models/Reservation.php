<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'arrival_date',
        'departure_date',
        'room_id',
        'name_surname',
        'email',
        'phone',
        'notes',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    protected $hidden = ['created_at', 'updated_at'];
}
