<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard');
        //return "Welcome Super Admin Dashboard";
    }

    public function staff()
    {
        return view('warehouse.staff.dashboard');
        // return "Welcome Staff Dashboard";
    }

    public function warehouse()
    {
        return view('warehouse.dashboard');
        // return "Welcome Warehouse Dashboard";
    }

    public function user()
    {
        return "Welcome User Dashboard";
    }
}
