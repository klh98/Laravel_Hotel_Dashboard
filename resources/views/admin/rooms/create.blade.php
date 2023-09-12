@extends('layout')


@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Add New Room
                <a href="{{ url('admin/rooms') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ url('admin/rooms') }}" method="post">
                    @csrf

                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td><input type="text" class="form-control" name="title"></td>
                        </tr>
                        <tr>
                           <th>Select Room Type</th>
                           <td>
                            <select name="rt_id" id="" class="form-control">
                                <option value="0">--- Select Room Type ---</option>
                                @foreach ($data as $d)
                                    <option value="{{ $d->id }}">{{ $d->title }}</option>
                                @endforeach
                            </select>
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
