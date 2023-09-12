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
                <form action="{{ url('admin/roomtype/'.$data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td><input type="text" class="form-control" name="title" value="{{ $data->title }}"></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><input type="text" class="form-control" name="price" value="{{ $data->price }}"></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><textarea name="detail" class="form-control" id="" cols="30" rows="5" style="margin-left: 0%">
                            {{ $data->detail }}
                            </textarea></td>
                        </tr>
                        <tr>
                            <th>Gallery</th>
                            <td>
                                <table class="table table-bordered mt-3">
                                    <tr>
                                        <input type="file" name="imgs[]" multiple>
                                        @foreach ($data->roomtypeimgs as $img)
                                            <td class="imgcol{{ $img->id }}">
                                                <img src="{{ asset('storage/app/'.$img->img_src) }}" alt="image">
                                                <p class="mt-2">
                                                    <button type="button" class="btn btn-danger btn-sm delete-image"
                                                    onclick="return confirm('Are you sure to delete this?')"
                                                    data-image-id="{{ $img->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </p>
                                            </td>
                                        @endforeach
                                    </tr>
                                </table>
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


