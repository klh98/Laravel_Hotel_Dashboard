<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use App\Models\StaffPayment;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Staff::all();
        return view('admin.staff.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data= Department::all();
        return view('admin.staff.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'position' => 'required',
            'dept_id' => 'required',
            'salary_type' => 'required',
            'salary_amt' => 'required',
        ]);

        $data= new Staff();
        $data->full_name= $request->full_name;
        $data->position= $request->position;
        $data->department_id= $request->dept_id;
        $data->salary_type= $request->salary_type;
        $data->salary_amt= $request->salary_amt;
        $data->bio= $request->bio;
        $imgPath= $request->file('photo')->store('public/imgs');
        $data->photo = $imgPath;

        $data->save();

        return redirect('admin/staff')->with('message', 'staff has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Staff::find($id);
        return view('admin.staff.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Staff::find($id);
        $dept= Department::all();
        return view('admin.staff.edit', compact('data', 'dept'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'full_name' => 'required',
            'position' => 'required',
            // 'password' => 'required',
            'dept_id' => 'required',
        ]);

        if($request->hasFile('photo'))
        {
            $imgPath= $request->file('photo')->store('public/imgs');
        }
        else
        {
            $imgPath= $request->prev_photo;
        }


        $data= Staff::find($id);
        $data->full_name= $request->full_name;
        $data->position= $request->position;
        $data->department_id= $request->dept_id;
        $data->salary_type= $request->salary_type;
        $data->salary_amt= $request->salary_amt;
        // $imgPath= $request->file('photo')->store('public/imgs');
        $data->photo = $imgPath;

        $data->update();

        return redirect('admin/staff')->with('message', 'staff has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Staff::where('id', $id)->delete();
        return redirect('admin/staff')->with('message', 'staff has been deleted successfully');
    }

    //Add Payment
    public function add_payment($staff_id)
    {
        $staff= Staff::find($staff_id);
        return view('admin.payment.create', ['staff_id' => $staff_id], compact('staff'));
    }

    public function save_payment(Request $request, $staff_id)
    {

        $data= new StaffPayment();
        $data->staff_id = $staff_id;
        $data->amount= $request->amount;
        $data->payment_date= $request->date;

        $data->save();

        return redirect('admin/staff')->with('message', 'staff payment has been added successfully');
    }

    public function all_payments(Request $request, $staff_id)
    {
        $data= StaffPayment::where('staff_id', $staff_id)->get();
        $staff= Staff::find($staff_id);
        return view('admin.payment.index', ['staff_id' => $staff_id], compact('data', 'staff'));
    }


    public function delete_payment($id, $staff_id)
    {
        StaffPayment::where('id', $id)->delete();
        return redirect('admin/staff/payments/'.$staff_id)->with('message', 'payment has been deleted');
    }


}
