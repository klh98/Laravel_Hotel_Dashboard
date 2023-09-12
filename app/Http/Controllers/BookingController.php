<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Booking::all();
        return view('admin.booking.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data= Customer::all();
        return view('admin.booking.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'room_id' => 'required',
            'checkin_date' => 'required',
            'checkout_date' => 'required',
            'total_adults' => 'required',
            'total_children' => 'required',
            // 'roomprice' => 'required',
        ]);

        $data= new Booking();
        $data->customer_id= $request->customer_id;
        $data->room_id= $request->room_id;
        $data->checkin_date= $request->checkin_date;
        $data->checkout_date= $request->checkout_date;
        $data->total_adults= $request->total_adults;
        $data->total_children= $request->total_children;

        if($request->ref == 'front')
        {
            $data->ref= 'front';
        }
        else
        {
            $data->ref= 'admin';
        }

        $data->save();

        if($request->ref == "front")
        {
            \Stripe\Stripe::setApiKey('sk_test_51NUtYgLVvAZLhnohi77fT2TWkccSxGlxLlzRzMxwAdztgzzBtcuswYlUqrIN4Q5KZdXVDyoD88Pzi11Je0nHk9Nj00tFK7XILy');
            $session=  \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'product_data' => [
                            'name' => 'Smart Phone',
                        ],
                        'unit_amount' => $request->roomprice * 100,
                        'currency' => 'mmk',
                    ],
                    'quantity' => 1
                ]],
                'mode' => 'payment',
                'success_url' => 'http://127.0.0.1:8000/user/booking/success?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => 'http://127.0.0.1:8000/user/booking/fail',
            ]);

            return redirect($session->url);

            // return redirect('/user/booking')->with('message', 'Booking has been saved successfully');
        }

        return redirect('admin/booking/create')->with('message', 'booking has been added successfully');



    }

    public function booking_payment_success(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51NUtYgLVvAZLhnohi77fT2TWkccSxGlxLlzRzMxwAdztgzzBtcuswYlUqrIN4Q5KZdXVDyoD88Pzi11Je0nHk9Nj00tFK7XILy');
        $session= \Stripe\Checkout\Session::retrieve($request->get('session_id'));
        // $customer= \Stripe\Customer::retrieve($session->customer);

        dd($session);

        if($session->payment_status == 'paid')
        {
            return 'success';
        }

        echo 'success';
    }

    public function booking_payment_fail()
    {
        echo ' Fail';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Booking::where('id', $id)->delete();
        return redirect('admin/booking')->with('message', 'data has been deleted successfully');
    }

    public function available_rooms(Request $request, $checkin_date)
    {
        // dd($checkin_date);
        $f_date= Carbon::parse($checkin_date)->format('m-d-Y');


        $arooms= DB::SELECT("SELECT * FROM rooms WHERE id NOT IN
        (SELECT room_id FROM bookings WHERE '$f_date' BETWEEN checkin_date AND checkout_date)");

        $data= [];

        foreach($arooms as $room)
        {
            $roomTypes= RoomType::find($room->room_type_id);
            $data[]= ['room' => $room, 'roomtype' => $roomTypes];
        }

        return response()->json(['data' => $data]);
    }

    public function user_booking()
    {
        return view('user.create_booking');
    }
}
