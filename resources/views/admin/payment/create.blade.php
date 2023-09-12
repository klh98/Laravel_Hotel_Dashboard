@extends('layout')
@extends('admin.asset')

@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Add {{ $staff->full_name }} Payment
                <a href="{{ url('admin/staff/payment') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ url('admin/staff/payment/'.$staff_id) }}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Amount</th>
                            <td><input type="number" class="form-control" name="amount"></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><input type="date" class="form-control" name="date"></td>
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
