<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customers;
use App\Models\Works;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    public function index()
    {
        // $customers = Customers::all();
        // $customers = Customers::Paginate(10);
        $customers = Customers::with('address')->with('works')->with('images')->paginate(10);

        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->only('name', 'lastname', 'sales', 'city', 'country'), [
            'name' => 'required',
            'lastname' => 'required',
            'sales' => 'required|integer',
            'city' => 'required',
            'country' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = new Customers();
        $customer->name = $request->name;
        $customer->lastname = $request->lastname;
        $customer->sales = $request->sales;
        $customer->save();

        $address = new Address();
        $address->city = $request->city;
        $address->country = $request->country;
        $address->customers_id = $customer->id;
        $address->save();

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {
                $filename = $image->getClientOriginalName();
                $path = $image->store('customer_images', 'public');

                $customer->images()->create([
                    'file_name' => $filename,
                    'file_path' => $path,
                    'customers_id' => $customer->id
                ]);
            }
        }

        $works = $request->works;
        if ($works) {
            foreach ($works as $work) {
                $newWork = new Works();
                $newWork->work = $work;
                $newWork->customers_id = $customer->id;
                $newWork->save();
            }
        }

        return redirect()->back()->with('success', 'Add olundu');
    }


    public function show($id)
    {
    }

    //User  Update page
    public function edit($id)
    {
        $customer = Customers::findOrFail($id);
        // $works = Works::get();
        // return dd($works);
        return view('customer.edit', compact('customer'));
    }

    //User Form Update
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->only('name', 'lastname', 'sales', 'country', 'city'), [
            'name' => 'required',
            'lastname' => 'required',
            'sales' => 'required | integer',
            'country' => 'required',
            'city' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $customer = Customers::findOrFail($id);
        $customer->name = $request->name;
        $customer->lastname = $request->lastname;
        $customer->sales = $request->sales;
        $customer->save();

        $address = $customer->address;
        $address->city = $request->city;
        $address->country = $request->country;
        $address->save();

        $newWorks = $request->works;
        if ($newWorks) {
            $customer->works()->delete();
            foreach ($newWorks as $work) {
                $customer->works()->create([
                    'work' => $work,
                ]);
            }
        }



        return redirect()->route('customer_show')->with("success", 'Update Olundu');
    }

    public function destroy($id)
    {

        $customer = Customers::findOrFail($id);
        $address = $customer->address;
        $address->delete();

        $works = $customer->works;
        foreach ($works as $work) {
            $work->delete();
        }

        $images = $customer->images;
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->file_path);
            $image->delete();
        }

        $customer->delete();
        return redirect()->route('customer_show')->with('success', "silindi");
    }
}
