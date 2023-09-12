@extends('layout')



@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Add New Booking
                <a href="{{ url('admin/booking') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>


        @if(Session::has('message'))
            {{-- <p class="text-success">{{ session('message') }}</p> --}}

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

        @endif

        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ url('admin/booking') }}" method="post">
                    @csrf

                    <table class="table table-bordered">
                        <tr>
                            <th>Customer</th>
                            <td>
                                <select name="customer_id" id="" class="form-control">
                                    <option value="">--- Select Customer ---</option>
                                    @foreach ($data as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Checkin Date</th>
                            <td><input type="date" name="checkin_date" class="form-control checkin-date"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Checkout Date</th>
                            <td><input type="date" name="checkout_date" class="form-control"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Available Rooms</th>
                            <td>
                                <select name="room_id" id="" class="form-control room-list">

                                </select>
                                <p>Price : <span class="show-room-price"></span></p>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Total Adults</th>
                            <td><input type="number" name="total_adults" class="form-control"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Total Children</th>
                            <td><input type="number" name="total_children" class="form-control"></td>
                            <td></td>
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


@section('script')

<script>

    $(document).ready(function(){
        $(".checkin-date").on('blur', function()
        {
            var _checkindate= $(this).val();

            $.ajax({
                url:"{{ url('admin/booking') }}/available-rooms/"+_checkindate,

                    dataType:'json',

                    beforeSend:function(){
                        $(".room-list").html('<option> --- Loading --- </option>');
                    },

                    success:function(res)
                    {
                        var rooms='';

                        $.each(res.data, function(index,row){
                            rooms += '<option data-price="'+row.roomtype.price+'" value=" '+row.room.id+' ">' +row.room.title+ '-' +row.roomtype.title+ '</option>';
                        });
                        $(".room-list").html(rooms);
                        var _selectedPrice= $(".room-list").find('option:selected').attr('data-price');
                        // console.log(_selectedPrice);
                        $(".room-price").val(_selectedPrice);
                        $(".show-room-price").text(_selectedPrice);
                    }

                });
            });

            $(document).on("change", ".room-list", function(){
                var _selectedPrice= $(this).find('option:selected').attr('data-price');
                // console.log(_selectedPrice);
                $(".room-price").val(_selectedPrice);
                $(".show-room-price").text(_selectedPrice);
            })
        });


</script>

@endsection


@endsection
