<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomFormsRequest;
use App\Services\Admin\RoomService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $roomService;
    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function index()
    {
        $data = $this->roomService->getAll();
        $rooms = $data['rooms'];
        $room_types = $data['room_types'];
        $hotel_names = $data['hotelNames'];
        return view('admin.room_pages.room', compact('rooms', 'room_types', 'hotel_names'));
    }


    public function create()
    {
        //
    }


    public function store(RoomFormsRequest $request)
    {


        $result = $this->roomService->create($request);
        if($result['success']){
            return redirect()->back()->with('success',$result['message']);
        }
        else{
            return redirect()->back()->with('success',$result['message']);
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = $this->roomService->getById($id);
        return view('admin.room_pages.updateRoom', [
            'room' => $data->room,
            'room_types' => $data->room_types,
            'hotel_names' => $data->hotel_names
        ]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $result = $this->roomService->delete($id);
        if($result['success']){
            return redirect()->back()->with('success',$result['message']);
        }
        else{
            return redirect()->back()->with('error',$result['message']);
        }
    }
}
