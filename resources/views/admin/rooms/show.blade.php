@extends('layout')



@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Room Detail
                <a href="{{ url('admin/rooms') }}" class="float-right btn-success btn-sm">View All</a>
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
                                <th>Select Room Type</th>
                                <td>
                                 <select name="rt_id" id="" class="form-control">
                                     <option value="0">--- Select Room Type ---</option>
                                     @foreach ($roomtype as $rt)
                                         <option @if ( $data->room_type_id == $rt->id) selected @endif value="{{ $rt->id }}">
                                         {{ $rt->title }}
                                        </option>
                                     @endforeach
                                 </select>
                                </td>
                             </tr>
                        </table>
                    @endif
            </div>
        </div>
    </div>
</div>


@endsection
