<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelFormsRequest;
use App\Services\Admin\HotelService;


class HotelController extends Controller
{
    protected $hotelservice;

    public function __construct(HotelService $hotelservice)
    {
        $this->hotelservice = $hotelservice;
    }

    public function index()
    {

        $hotels = $this->hotelservice->getAll();
        return view('admin.hotel_pages.hotel', compact('hotels'));
    }

    public function store(HotelFormsRequest $request)
    {
        $this->hotelservice->create($request);
        return redirect()->back()->with('success', 'Hotel is Added');
    }

    public function edit($id)
    {
        $oldhotel = $this->hotelservice->getById($id);
        return view('admin.hotel_pages.updatehotel', compact('oldhotel'));
    }

    public function update(HotelFormsRequest $request, $id)
    {
        $this->hotelservice->update($request, $id);
        return redirect()->back()->with('success', 'Hotel is updated');
    }

    public function destroy($id)
    {
        $this->hotelservice->delete($id);
        return redirect()->back()->with('success', 'Hotel has been deleted');
    }
}
