@extends('layout')



@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Add RoomType
                <a href="{{ url('admin/roomtype') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ url('admin/roomtype') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td><input type="text" class="form-control" name="title"></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><input type="text" class="form-control" name="price"></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><textarea name="detail" class="form-control" id="" cols="30" rows="5"></textarea></td>
                        </tr>
                        <tr>
                            <th>Gallery</th>
                            <td><input type="file" name="imgs[]" multiple></td>
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
