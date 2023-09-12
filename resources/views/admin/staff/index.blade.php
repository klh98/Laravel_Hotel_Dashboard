@extends('layout')


@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Staff
                <a href="{{ url('admin/staff/create') }}" class="float-right btn-success btn-sm">Add New</a>
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
                            <th>Full Name</th>
                            <th>Positon</th>
                            <th>Department</th>
                            <th>Salary Type</th>
                            <th>Salary Amount</th>
                            <th>Bio</th></th>
                            <th>Photo</th>
                            {{-- <th>Address</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Full Name</th>
                            <th>Positon</th>
                            <th>Department</th>
                            <th>Salary Type</th>
                            <th>Salary Amount</th>
                            <th>Bio</th></th>
                            <th>Photo</th>
                            {{-- <th>Address</th> --}}
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->full_name }}</td>
                            <td>{{ $d->position }}</td>
                            <td>{{ $d->department->title }}</td>
                            <td>{{ $d->salary_type }}</td>
                            <td>{{ $d->salary_amt }}</td>
                            <td>{{ $d->bio }}</td>
                            <td><img src="{{ asset('storage/app/'.$d->photo) }}" width="100%" alt="customer_photo"></td>
                            <td>
                                <a href="{{ url('admin/staff/'.$d->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a href="{{ url('admin/staff/'.$d->id.'/edit') }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="{{ url('admin/staff/payments/'.$d->id) }}" class="btn btn-sm btn-dark"><i class="fas fa-credit-card"></i></a>
                                <a href="{{ url('admin/staff/'.$d->id.'/delete') }}" onclick="return confirm('Are you sure to delete this data?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
