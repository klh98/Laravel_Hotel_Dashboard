@extends('layout')



@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Add Department
                <a href="{{ url('admin/department') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ url('admin/department') }}" method="post">
                    @csrf

                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td><input type="text" class="form-control" name="title"></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>
                                <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
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
