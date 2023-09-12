@extends('user.frontlayout')


@section('content')

<h1 class="text-center mt-4">Contact Us</h1>

@if(Session::has('message'))
{{-- <p class="text-success">{{ session('message') }}</p> --}}

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ Session('message') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

@endif


    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <form action="{{ url('/save-contactus') }}" method="post">
                    @csrf
                    <table class="table">
                       <tr>
                            <th>Name</th>
                            <td><input type="text" name="name" class="form-control"></td>
                       </tr>
                       <tr>
                            <th>Email</th>
                            <td><input type="text" name="email" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Subject</th>
                            <td><input type="text" name="subject" class="form-control"></td>
                       </tr>
                       <tr>
                            <th>Message</th>
                            <td><textarea name="msg" id="" cols="30" rows="5" class="form-control"></textarea></td>
                       </tr>
                    </table>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
