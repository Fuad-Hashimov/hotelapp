<?php

namespace App\Services\Admin;

use App\Http\Requests\HotelFormsRequest;
use App\Models\Hotel;

class HotelService
{
    public function getAll()
    {
        $hotels = Hotel::Paginate(5);
        return $hotels;
    }

    public function getHotelNames(){
        $hotelNames = Hotel::select('name')->get();
        return $hotelNames;
    }

    public function getById($id)
    {
        $hotel = Hotel::findOrFail($id);
        return $hotel;
    }

    public function getNameById($name){
        return Hotel::where('name',$name)->pluck('id');
    }

    public function update(HotelFormsRequest $request, $id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->name = $request->name;
        $hotel->city = $request->city;
        $hotel->country = $request->country;

        if ($request->hasFile('image')) {
            $destinationPath = 'hotelImages/';
            $imagePath = $hotel->image;

            ImageUploadService::deleteImage($imagePath);
            $hotel->image = ImageUploadService::uploadImage($request->image, $destinationPath);
        }
        $hotel->save();
    }


    public function create(HotelFormsRequest $hotel)
    {
        $destinationPath = 'hotelImages/';
        $imagePath = ImageUploadService::uploadImage($hotel->image, $destinationPath);

        $newhotel = new Hotel();
        $newhotel->city = $hotel->city;
        $newhotel->name = $hotel->name;
        $newhotel->country = $hotel->country;
        $newhotel->image = $imagePath;

        $newhotel->save();
    }

    public function delete($id)
    {
        $hotel = Hotel::findOrFail($id);
        $imagePath = $hotel->image;
        ImageUploadService::deleteImage($imagePath);
        $hotel->delete();
    }
}
