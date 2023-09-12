@extends('layout')



@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Add Customer
                <a href="{{ url('admin/customer') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ url('admin/customer') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if($errors->any())
                    @foreach ($errors->all() as $errors )
                        <p class="text-danger">{{ $errors }}</p>
                    @endforeach
                    @endif


                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td><input type="text" class="form-control" name="name"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><input type="email" name="email" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td><input type="password" name="password" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><input type="text" name="phone" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><textarea name="address" id="" cols="30" rows="5" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><input type="file" name="photo"></td>
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
