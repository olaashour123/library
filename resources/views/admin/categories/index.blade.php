@extends("admin.layouts.master")

@section('title', 'Categories')



@section('content')


    <div class="col-sm-3">
        <a href="/admin/categories/create">
            <i class="fa fa-plus"></i>Create Category</a>
        {{-- class="btn btn-success " --}}
    </div>
    <br>

    <div class="container-fluid">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control  searchable" id="name" name="name" placeholder="Name">
      </div>
    <div class="card-body">
    
            <table class="datatable table  table-head-fixed table-hover text-nowrap  text-center">
                <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="10%">Category</th>
                        <th width="10%">description</th>
                        <th width="10%">image</th>
                        <th width="10%">آخر تعديل</th>
                        <th width="10%"></th>

                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <img class="img-circle img-bordered-sm" width="65" height="65"
                                    src="{{ url(Storage::url($category->image)) }}" alt="">
                            </td>

                            <td>{{ $category->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}"
                                    class="btn btn-xs btn-primary">
                                    <i class="fas fa-solid fa-bars"></i>
                                </a>

                                <form class="inline"
                                    action="{{ route('admin.categories.destroy', ['id' => $category->id]) }}"
                                    method="PUT">
                                    @csrf
                                    @method('POST')
                                    <button onclick="return confirm('هل انت متأكد من الاستمرار في العملية؟')"
                                        class="btn Confirm btn-xs btn-danger">
                                        <i class="fas fa-solid fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
            <br>

    </div>



@endsection

@section('scripts')

<script>
    jQuery(document).ready(function () {
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                bLengthChange: false,
                pageLength: 20,
                ajax: {
                    url:"{{ route('admin.categories.index') }}",
                    data: function (d) {
                        d.name = $('#name').val()

                    },
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false },
                    {data: 'name', name: 'Category'},
                    {data: 'description', name: 'description'},
                    {data: 'image', name: 'image'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions'}
                ],
            });
            $('.searchable').on('input change', function () {
                table.draw();
            });

//Delete Ajax request.

            
$(document).on('click','.deletebtn', function(e){
  e.preventDefault();
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      let a = $(this).attr("data_url");
      $.ajax({
        type: 'get',
        url: a,

        success: function (data) {
          if (data.status = 200) {
            if (data != null) {
              toastr.success(data.message);
              table.draw();
            }
          } else {
              toastr.error(data.message)
          }
        },
      });
    }
  })
  
});
        });
        
    
    
    
    </script>
    

@endsection






{{-- <form class="row">


    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
        <a class="btn btn-success pull-right" href="/admin/categories/create">
            <i class="fa fa-plus"></i>Create Category</a>
    </div>
</form>
<br>
@if ($categories->count() > 0)
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th  width="30%">Category</th>
            <th width="10%">description</th>
             <th width="10%">image</th>
            <th width="10%">آخر تعديل</th>
            <th width="5%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            {{-- <td>{{url(Storage::url($category->image))}}</td> --}}
{{-- @dd(url( Storage::url('categories/' . $category->image))) --}}

{{-- <td><img src="{{ url(Storage::url($category->image)) }}" alt=""></td>
            <td>{{$category->updated_at}}</td>
            <td>
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-xs btn-primary">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>

                <form class="inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <button onclick="return confirm('هل انت متأكد من الاستمرار في العملية؟')" class="btn Confirm btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else

<br>
<div class="alert alert-warning"><b>نأسف</b>, لا يوجد بيانات لعرضها ...</div>
@endif
{{$categories->links()}}


@endsection

@section('js')
    <script>
        $(function(){
            $(".cbStatus").click(function(){
                var id = $(this).val();
                $.get("/admin/categories/"+id+"/status");
            });
        });
    </script>
@endsection --}}
