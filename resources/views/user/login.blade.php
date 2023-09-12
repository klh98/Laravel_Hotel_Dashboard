@extends('user.frontlayout')


@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h3 class="text-center">Login Form</h3>

            @if(Session::has('message'))
                    {{-- <p class="text-success">{{ session('message') }}</p> --}}

                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                @endif

            <form action="{{ url('/user/check_login') }}" method="post">
                @csrf
                <table class="table">
                    <tr>
                        <th>Email</th>
                        <td><input type="email" class="form-control" name="email"></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password" class="form-control" name="password"></td>
                    </tr>
                    <tr>
                        <input type="hidden" name="ref" value="front">
                       <td> <button type="submit" class="btn btn-primary btn-sm">Submit</button></td>
                    </tr>
                </table>

            </form>

        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection
