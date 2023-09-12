@extends('layout')



@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Room Type Detail of {{ $data->title }}
                <a href="{{ url('admin/roomtype') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                    @if($data)
                        <table class="table table-bordered">
                            <tr>
                                <th>Title</th>
                                <td> {{ $data->title }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td> {{ $data->price }}</td>
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td>{{ $data->detail }}</td>
                            </tr>
                            <tr>
                                <th>Gallery</th>
                                <td>
                                    <table class="table table-bordered mt-3">
                                        <tr>
                                            @foreach ($data->roomtypeimgs as $img)
                                                <td class="imgcol{{ $img->id }}">
                                                    <img src="{{ asset('storage/app/'.$img->img_src) }}" alt="image">
                                                </td>
                                            @endforeach
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    @endif
            </div>
        </div>
    </div>
</div>


@endsection
