@extends('layout')



@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room
                <a href="{{ url('admin/rooms/create') }}" class="float-right btn-success btn-sm">Add New</a>
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
                            <th>Customer</th>
                            <th>Room No</th>
                            <th>Room Type</th>
                            <th>Checkin Date</th>
                            <th>Checkout Date</th>
                            <th>Ref</th>
                            <th>Aciton</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Customer</th>
                            <th>Room No</th>
                            <th>Room Type</th>
                            <th>Checkin Date</th>
                            <th>Checkout Date</th>
                            <th>Ref</th>
                            <th>Aciton</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->customer->name}}</td>
                            <td>{{ $d->room->title}}</td>
                            <td>{{ $d->room->RoomType->title}}</td>
                            <td>{{ $d->checkin_date}}</td>
                            <td>{{ $d->checkout_date}}</td>
                            <td>{{ $d->ref}}</td>
                            {{-- <td>{{ $d->RoomType->title ?? 'None'}}</td> --}}
                            <td>
                                <a href="{{ url('admin/booking/'.$d->id.'/delete') }}"
                                    onclick="return confirm('Are you sure to delete this data?')"
                                    class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                                </a>
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
