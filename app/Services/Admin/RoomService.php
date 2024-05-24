<?php

namespace App\Services\Admin;

use App\Http\Requests\RoomFormsRequest;
use App\Models\Room;

class RoomService
{
    protected $hotelService;
    protected $imageUploadService;
    protected  $room_types = Room::ROOM_TYPES;

    public function __construct(HotelService $hotelService,ImageUploadService $imageUploadService)
    {
        $this->hotelService = $hotelService;
        $this->imageUploadService = $imageUploadService;
    }

    public function getAll()
    {
        $rooms = Room::with('hotel')->Paginate(10);
        $room_types = $this->room_types;
        $hotelNames = $this->hotelService->getHotelNames();
        return compact('rooms', 'room_types', 'hotelNames');
    }

    public function getById($id)
    {
        $room = Room::with('hotel')->findOrFail($id);
        $room_types = $this->room_types;
        $hotel_names = $this->hotelService->getHotelNames();
        return (object)[
            'room' => $room,
            'room_types' => $room_types,
            'hotel_names' => $hotel_names
        ];
    }

    public function create(RoomFormsRequest $request)
    {
        $hotelId = $this->hotelService->getNameById($request->hotelName);
        $requestedRoomNumber = $request->room_number;
        $roomNumbers = Room::where('hotel_id', $hotelId)
            ->pluck('room_number')
            ->toArray();

        if (in_array($requestedRoomNumber, $roomNumbers)) {
            return [
                'success' => false,
                'message' => "Hotelin Bu nomreli otagi var"
            ];
        }
        else {
            $newRoom = new Room();
            $newRoom->hotel_id = $hotelId[0];
            $newRoom->room_number = $request->room_number;
            $newRoom->description = $request->description;
            $newRoom->price = $request->price;
            $newRoom->room_type = $request->room_type;
            $newRoom->save();

            $roomId = $newRoom->id;
            $this->imageUploadService::uploadMultitipleImg($request, $roomId);

            return [
                'success' => true,
                'message' => "Otaq elave edildi"
            ];
        }
    }



    public function delete($id){
        $room = Room::with('roomImages')->findOrFail($id);

        foreach($room->roomImages as $image){
            $this->imageUploadService->deleteImage('room_images/' . $image->file_name);
            $image->delete();
        }

        $room->delete();
        return [
            'success' => true,
            'message' => 'Otaq silindi.'
        ];
    }
}
