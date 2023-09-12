@extends('layout')



@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Department Detail
                <a href="{{ url('admin/department') }}" class="float-right btn-success btn-sm">View All</a>
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
                                <th>Description</th>
                                <td>{{ $data->description }}</td>
                             </tr>
                        </table>
                    @endif
            </div>
        </div>
    </div>
</div>


@endsection
