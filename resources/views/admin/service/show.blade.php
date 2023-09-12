@extends('layout')


@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Service Info Detail
                <a href="{{ url('admin/service') }}" class="float-right btn-success btn-sm">View All</a>
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
                                <th>Small Desc</th>
                                <td>
                                    {{ $data->small_desc }}
                                </td>
                             </tr>
                             <tr>
                                <th>Detail Desc</th>
                                <td> {{ $data->detail_desc }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><img src="{{  asset('storage/app/'.$data->photo) }}" alt="photo"></td>
                            </tr>
                        </table>
                    @endif
            </div>
        </div>
    </div>
</div>


@endsection
