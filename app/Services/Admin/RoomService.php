<?php

namespace App\Services\Admin;

use App\Models\Hotel;
use App\Models\Room;

class RoomService {

    protected $hotelService;

    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    public function getAll()
    {
        $rooms = Room::with('hotel')->Paginate(2);
        return $rooms;
    }

    public function getById($id){
        $room = Room::with('hotel')->findOrFail($id);
        $room_types = Room::ROOM_TYPES;
        $hotel_names = $this->hotelService->getHotelNames();
        return (object)[
            'room' => $room,
            'room_types' => $room_types,
            'hotel_names'=>$hotel_names
        ];
    }
}
