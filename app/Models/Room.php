<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;


    const ROOM_TYPES = [
        'vip' => 'VIP',
        'econom' => 'Econom'
    ];

    protected $table = "rooms";
    protected $fillable = [
        'room_number',
        'description',
        'hotel_id',
        'room_type',
        'price'
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
