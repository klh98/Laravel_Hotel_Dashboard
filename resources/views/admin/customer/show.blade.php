@extends('layout')



@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Customer Details
                <a href="{{ url('admin/customer') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                    @if($data)
                        <table class="table table-bordered">
                            <tr>
                                <th>Full Name</th>
                                <td> {{ $data->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td> {{ $data->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td> {{ $data->phone }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td> {{ $data->address }}</td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td><img src="{{ asset('storage/'.$data->photo) }}" alt="customer_photo"></td>
                            </tr>
                        </table>
                    @endif
            </div>
        </div>
    </div>
</div>


@endsection
