<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Service::all();
        return view('admin.service.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'small_desc' => 'required',
            'detail_desc' => 'required',
            // 'image' => 'required',
        ]);

       if($request->hasFile('image'))
       {
            $imgPath= $request->file('image')->store('public/imgs');
       }
       else
       {
            $imgPath= null;
       }


        $data= new Service();
        $data->title= $request->title;
        $data->small_desc= $request->small_desc;
        $data->detail_desc= $request->detail_desc;
        $data->photo= $imgPath;

        $data->save();

        return redirect('admin/service')->with('message', 'New Service has been added successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Service::findOrFail($id);
        return view('admin.service.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data= Service::findOrFail($id);
        return view('admin.service.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'small_desc' => 'required',
            // 'password' => 'required',
            'detail_desc' => 'required',
        ]);

        if($request->hasFile('photo'))
        {
            $imgPath= $request->file('photo')->store('public/imgs');
        }
        else
        {
            $imgPath= $request->prev_photo;
        }


        $data= Service::find($id);
        $data->title= $request->title;
        $data->small_desc= $request->small_desc;
        $data->detail_desc= $request->detail_desc;
        $data->photo = $imgPath;

        $data->update();

        return redirect('admin/service')->with('message', 'service has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Service::where('id', $id)->delete();
        return redirect('admin/service')->with('message', 'service has been deleted successfully');
    }

    public function service_detail(Request $request, $id)
    {
        $service= Service::findOrFail($id);
        return view('user.service_detail', compact('service'));
    }
}
