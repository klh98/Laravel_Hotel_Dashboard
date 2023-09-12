@extends('layout')



@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $staff->full_name }} Payment
                <a href="{{ url('admin/staff/payment/'.$staff_id.'/add') }}"
                class="float-right btn-success btn-sm">Add New Payment</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                @if(Session::has('message'))
                    {{-- <p class="text-success">{{ session('message') }}</p> --}}

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                @endif

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Staff ID</th>
                            <th>Amount</th>
                            <th>Payment Date</th>
                            <th>Aciton</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Staff ID</th>
                            <th>Amount</th>
                            <th>Payment Date</th>
                            <th>Aciton</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->staff_id }}</td>
                            <td>{{ $d->amount }}</td>
                            <td>{{ $d->payment_date ?? 'None'}}</td>
                            <td>
                                <a href="{{ url('admin/staff/payment/'.$d->id.'/'.$staff_id.'/delete') }}" onclick="return confirm('Are you sure to delete this data?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@section('script')

 <!-- Custom styles for this page -->
 <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

 <!-- Page level plugins -->
 <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="../js/demo/datatables-demo.js"></script>

 @endsection

@endsection
