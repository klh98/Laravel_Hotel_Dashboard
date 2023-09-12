@extends('layout')


@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Add Staff
                <a href="{{ url('admin/staff') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ url('admin/staff') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if($errors->any())
                    @foreach ($errors->all() as $errors )
                        <p class="text-danger">{{ $errors }}</p>
                    @endforeach
                    @endif


                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td><input type="text" class="form-control" name="full_name"></td>
                        </tr>
                        <tr>
                            <th>Positon</th>
                            <td><input type="text" class="form-control" name="position"></td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td>
                                <select name="dept_id" id="" class="form-control">
                                    <option value="0">--- Select Department ---</option>
                                    @foreach ($data as $d)
                                    <option value="{{ $d->id }}">{{ $d->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Type</th>
                            <td>
                                <input type="radio" name="salary_type" value="daily"> Daily
                                <input type="radio" name="salary_type" value="monthly"> Monthly
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Amout</th>
                            <td>
                                <input type="number" name="salary_amt" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td><textarea name="bio" id="" cols="30" rows="5" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><input type="file" name="photo"></td>
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
