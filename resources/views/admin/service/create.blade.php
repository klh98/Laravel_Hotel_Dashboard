@extends('layout')


@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Add New Service
                <a href="{{ url('admin/service') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ url('admin/service') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td><input type="text" class="form-control" name="title"></td>
                        </tr>
                        <tr>
                            <th>Small Desc</th>
                            <td><input type="text" class="form-control" name="small_desc"></td>
                        </tr>
                        <tr>
                            <th>Detail Desc</th>
                            <td>
                                <textarea name="detail_desc" id="" cols="30" rows="5" class="form-control"></textarea>
                            </td>
                        </tr>
                        <tr>
                           <th>Image</th>
                           <td>
                                <input type="file" class="form-control" style="padding: 4px" name="image">
                           </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
