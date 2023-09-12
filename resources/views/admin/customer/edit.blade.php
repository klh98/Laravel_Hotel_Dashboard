@extends('layout')


@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Add RoomType
                <a href="{{ url('admin/customer') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ url('admin/customer/'.$data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td><input type="text" class="form-control" name="full_name" value="{{ $data->full_name }}"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><input type="email" class="form-control" name="email" value="{{ $data->email }}"></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><input type="text" class="form-control" name="phone" value="{{ $data->phone }}"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><input type="text" class="form-control" name="address" value="{{ $data->address }}"></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <input type="file" name="photo">
                                <input type="hidden" name="prev_photo" value="{{ $data->photo }}">
                                <img src="{{ asset('storage/app/'.$data->photo) }}" alt="customer_photo">
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
