@extends('layout')


@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary"> Details
                <a href="{{ url('admin/staff') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                    @if($data)
                        <table class="table table-bsordered">
                            <tr>
                                <th>Full Name</th>
                                <td> {{ $data->full_name }}</td>
                            </tr>
                            <tr>
                                <th>Position</th>
                                <td> {{ $data->position }}</td>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td> {{ $data->department->title }}</td>
                            </tr>
                            <tr>
                                <th>Salary Type</th>
                                <td> {{ $data->salary_type }}</td>
                            </tr>
                            <tr>
                                <th>Salary Amount</th>
                                <td> {{ $data->salary_amt }}</td>
                            </tr>
                            <tr>
                                <th>Bio</th>
                                <td> {{ $data->bio }}</td>
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
