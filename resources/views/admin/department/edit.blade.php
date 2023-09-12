@extends('layout')



@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Edit Department Info
                <a href="{{ url('admin/department') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ url('admin/department/'.$data->id) }}" method="post">
                    @csrf
                    @method('put')
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td><input type="text" class="form-control" name="title" value="{{ $data->title }}"></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control">
                                    {{ $data->description }}
                                </textarea>
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
