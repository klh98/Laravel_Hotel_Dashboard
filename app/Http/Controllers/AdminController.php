<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    public function login()
    {
       return view('admin.adminAuth.login');
    }

    public function check_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin= Admin::where(['username' => $request->username, 'password' => ($request->password)])
                ->count();

        if($admin > 0)
        {
            $adminData=  Admin::where(['username' => $request->username, 'password' => ($request->password)])
                        ->get();

            session(['adminData' => $adminData]);

            if($request->has('rememberme'))
            {
                Cookie::queue('adminuser', $request->username, 1440);
                Cookie::queue('adminpassword', $request->password, 1440);
            }

            return redirect('admin');

        }
        else
        {
            return redirect('admin/adminAuth/login')->with('message', 'Invalid user or password');
        }
    }

    public function logout()
    {
        session()->forget('adminData');
        return redirect('admin/adminAuth/login')->with('message', 'You are logged out');

    }


    public function dashboard()
    {
        $bookings= Booking::selectRaw('count(id) as total_bookings, checkin_date')->groupBy('checkin_date')->get();
        $labels= [];
        $data= [];

        foreach($bookings as $booking)
        {
            $labels= $booking['checkin_date'];
            $data= $booking['total_bookings'];
        }


        return view('dashboard',  ['labels' => $labels, 'data' => $data]);
    }
}
