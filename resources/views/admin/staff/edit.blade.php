@extends('layout')


@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Edit Staff Info
                <a href="{{ url('admin/staff') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ url('admin/staff/'.$data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td><input type="text" class="form-control" name="full_name" value="{{ $data->full_name }}"></td>
                        </tr>
                        <tr>
                            <th>Position</th>
                            <td><input type="text" class="form-control" name="position" value="{{ $data->position }}"></td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td>
                                <select name="dept_id" id="" class="form-control">
                                    <option value="0" >--- Select Department ---</option>
                                    @foreach ($dept as $d)
                                    <option @if($d->id == $data->department_id) selected @endif value="{{ $d->id }}">{{ $d->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Type</th>
                            <td>
                                <input type="radio" @if($data->salary_type == 'daily') checked @endif name="salary_type" value="daily"> Daily
                                <input type="radio" @if($data->salary_type == 'monthly') checked @endif name="salary_type" value="monthly"> Monthly
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Amount</th>
                            <td><input type="number" class="form-control" name="salary_amt" value="{{ $data->salary_amt }}"></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <input type="file" name="photo">
                                <input type="hidden" name="prev_photo" value="{{ $data->photo }}">
                                <img src="{{ asset('storage/app/'.$data->photo) }}" alt="customer_photo">
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
