<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        // $customers = Customers::all();
        $customers = Customers::Paginate(1);
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }


    public function store(Request $request)
    {

        return dd($request);
    }

    //User  Update page
    public function show($id)
    {
        return view('customer.edit',compact('id'));
    }

    public function edit($id)
    {


    }

    //User Form Update
    public function update(Request $request, $id)
    {
        return dd($id);
    }

    public function destroy($id)
    {
        return $id;
    }
}
