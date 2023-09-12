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
                            <th>Title</th>
                            <th>Room Type</th>
                            <th>Aciton</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Room Type</th>
                            <th>Aciton</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->title }}</td>
                            <td>{{ $d->RoomType->title ?? 'None'}}</td>
                            <td>
                                <a href="{{ url('admin/rooms/'.$d->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a href="{{ url('admin/rooms/'.$d->id.'/edit') }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="{{ url('admin/rooms/'.$d->id.'/delete') }}" onclick="return confirm('Are you sure to delete this data?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
