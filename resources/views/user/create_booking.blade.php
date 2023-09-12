@extends('user.frontlayout')



@section('content')

<div class="container mt-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>


        @if(Session::has('message'))
                    {{-- <p class="text-success">{{ session('message') }}</p> --}}

                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session('message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

        @endif


        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ url('admin/booking') }}" method="post">
                    @csrf

                    <table class="table table-bordered">
                        <tr>
                            <th>Checkin Date</th>
                            <td><input type="date" name="checkin_date" class="form-control checkin-date"></td>
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
                                <input type="hidden" name="customer_id" value="{{ session('data')[0]->id }}">
                                <input type="hidden" name="roomprice" class="room-price" value="">
                                <input type="hidden" name="ref" value="front">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>



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
                        var _selectedPrice= $('.room-list').find('option:selected').attr('data-price');
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
