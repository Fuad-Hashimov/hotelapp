<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelFormsRequest;
use App\Services\HotelService;


class HotelController extends Controller
{
    protected $hotelservice;

    public function __construct(HotelService $hotelservice)
    {
        $this->hotelservice = $hotelservice;
    }

    public function index()
    {
        $hotels = $this->hotelservice->index();
        return view('admin.hotel_pages.hotel', compact('hotels'));
    }

    public function store(HotelFormsRequest $request)
    {
        $this->hotelservice->store($request);
        return redirect()->back()->with('success', 'Hotel is Added');
    }

    public function edit($id)
    {
        $oldhotel = $this->hotelservice->edit($id);
        return view('admin.hotel_pages.updatehotel', compact('oldhotel'));
    }

    public function update(HotelFormsRequest $request, $id)
    {
        $this->hotelservice->update($request, $id);
        return redirect()->back()->with('success', 'Hotel is updated');
    }

    public function destroy($id)
    {
        $this->hotelservice->destroy($id);
        return redirect()->back()->with('success', 'Hotel has been deleted');
    }
}
