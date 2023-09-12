<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Customer::all();
        return view('admin.customer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',
        ]);

        if($request->hasFile('photo'))
        {
            $imgPath= $request->file('photo')->store('public/imgs');
        }
        else
        {
            $imgPath=null;
        }

        $data= new Customer();
        $data->name= $request->name;
        $data->email= $request->email;
        $data->password= sha1( $request->password);
        $data->phone= $request->phone;
        $data->address= $request->address;
        $data->photo = $imgPath;

        $data->save();

        $ref= $request->ref;
        if($ref == 'front')
        {
            return redirect('/user/login')->with('message', 'Successfully Registered');
        }

        return redirect('admin/customer')->with('message', 'customer has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Customer::find($id);
        return view('admin.customer.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Customer::find($id);
        return view('admin.customer.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            // 'password' => 'required',
            'phone' => 'required',
        ]);

        if($request->hasFile('photo'))
        {
            $imgPath= $request->file('photo')->store('public/imgs');
        }
        else
        {
            $imgPath= $request->prev_photo;
        }


        $data= Customer::find($id);
        $data->full_name= $request->full_name;
        $data->email= $request->email;
        $data->password= sha1( $request->password);
        $data->phone= $request->phone;
        $data->address= $request->address;
        // $imgPath= $request->file('photo')->store('public/imgs');
        $data->photo = $imgPath;

        $data->update();

        return redirect('admin/customer')->with('message', 'customer has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::where('id', $id)->delete();
        return redirect('admin/customer')->with('message', 'customer has been deleted successfully');
    }

    public function register()
    {
        return view('user.register');
    }

    public function login()
    {
        return view('user.login');
    }


    //Check login
    public function customer_login(Request $request)
    {
        $email= $request->email;
        $password= sha1($request->password);
        $detail= Customer::where(['email' => $email, 'password' => $password])->count();

        // dd($password);

        if($detail > 0)
        {
            $detail= Customer::where(['email' => $email, 'password' => $password])->get();
            session(['customer_login' => true, 'data' => $detail]);
            return redirect('/');
        }
        else
        {
            return redirect('/user/login')->with('message', 'Invalid User or Password');
        }
    }

    public function logout()
    {
        session()->forget(['customer_login', 'data']);
        return redirect('/user/login');
    }

}
