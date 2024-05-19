<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
        return view('admin.dashboard');
    }

    public function blank()
    {
        return view('admin.blank');
    }

    public function calendar()
    {
        return view('admin.calendar');
    }

    public function forms()
    {
        return view('admin.forms');
    }

    public function tables()
    {
        return view('admin.tables');
    }

    public function tabs()
    {
        return view('admin.tabs');
    }

}
