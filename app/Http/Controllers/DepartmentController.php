<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Department::all();
        return view('admin.department.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= new Department();
        $data->title= $request->title;
        $data->description= $request->description;

        $data->save();

        return redirect('admin/department')->with('message', 'Department added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Department::find($id);
        return view('admin.department.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Department::find($id);
        return view('admin.department.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data= Department::find($id);
        $data->title= $request->title;
        $data->description= $request->description;

        $data->update();

       return redirect('admin/department')->with('message', 'data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Department::where('id', $id)->delete();
        return redirect('admin/department')->with('message', 'data has been deleted successfully');
    }
}
