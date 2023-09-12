@extends('layout')



@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary">Update {{ $data->title}}
                <a href="{{ url('admin/roomtype') }}" class="float-right btn-success btn-sm">View All</a>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ url('admin/service/'.$data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <table class="table table-bordered mt-3">
                            <tr>
                                <th>Title</th>
                                <td><input type="text" class="form-control" name="title" value="{{ $data->title }}" id=""></td>
                            </tr>
                            <tr>
                                <th>Small Desc</th>
                                <td><input type="text"  class="form-control" name="small_desc" value="{{ $data->small_desc }}" id=""></td>
                            </tr>
                            <tr>
                                <th>Detail Desc</th>
                                <td>
                                    <textarea name="detail_desc" id="" cols="30" rows="5"  class="form-control">
                                        {{ $data->detail_desc }}
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td><img src="{{ asset('storage/app'.$data->photo) }}" alt="photo"></td>
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


@section('script')

<script>

    $(document).ready(function(){
       $('.delete-image').click(function(){

            // alert('hi');

            var _img_id= $(this).attr('data-image-id');
            var _vm= $(this);
            $.ajax({
                url:"{{ url('admin/roomtypeimage/delete') }}/"+_img_id,
                dataType:'json',
                beforeSend:function()
                {
                    _vm.addClass('disabled');
                },
                success:function(res)
                {
                    console.log(res);
                    $('.imgcol'+_img_id).remove();
                    _vm.removeClass('disabled');
                }

            })


           })
    })
</script>

@endsection

@endsection


