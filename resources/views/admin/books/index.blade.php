@extends("admin.layouts.master")

@section('title', 'Books')


@section('css')
    <link rel="stylesheet" href="{{ asset('admin/dist/css/style.css') }}">
@endsection


@section('content')


    <div class="col-sm-3">
        <a href="/admin/books/create">
            <i class="fa fa-plus"></i>Create Book</a>
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
                        <th width="10%">Name</th>
                        <th width="10%">description</th>
                        <th width="10%">quantity</th>
                        <th width="10%">price</th>
                        <th width="10%"> Date</th>
                        <th width="10%">image</th>
                        <th width="10%">publishers</th>
                        <th width="10%"></th>

                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
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
                    url:"{{ route('admin.books.index') }}",
                    data: function (d) {
                        d.name = $('#name').val()

                    },
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false },
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'quantity', name: 'quantity'},
                    {data: 'price', name: 'price'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'image', name: 'image'},
                    {data: 'publisher_id', name: 'publisher_id'},
                    {data: 'actions', name: 'actions'}
                ],
            });
            $('.searchable').on('input change', function () {
                table.draw();
            });




//Delete Ajax request.

            
$(document).on('click', '.deletebtn', function(e){
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








{{-- 

@foreach ($books as $book)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $book->name }}</td>
    <td>{{ $book->description }}</td>
    <td>{{ $book->quantity }}</td>
    <td>{{ $book->price }}</td>
    <td>{{ $book->updated_at }}</td>
    <td>
        <img class="img-circle img-bordered-sm" width="65" height="65"
            src="{{ url(Storage::url($book->image)) }}" alt="">
    </td>
    <td>
        {{ $book->publisher->name ?? 'N/A' }}
    </td>

    <td> --}}

        {{-- <a href="{{ route('admin.books.show', ['id' => $book->id]) }}"
            class="btn PopUp btn-info btn-xs" id="PopUp">
            <i class="fas fa-regular fa-eye"></i> --}}

      
        {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
            Modal
        </button> --}}

        {{-- <a title="" href="/admin/orders/my_orders/{{ $o->id }}" class="btn PopUp btn-info btn-xs">

<i class="glyphicon glyphicon-list"></i>      class="btn btn-xs btn-primary" --}}


     

{{-- 
        <a href="{{ route('admin.books.edit', ['id' => $book->id]) }}"
            class="btn btn-xs btn-primary">
            <i class="fas fa-solid fa-bars"></i>
        </a>

        <form class="inline"
            action="{{ route('admin.books.destroy', ['id' => $book->id]) }}" method="PUT">
            @csrf
            @method('post')
            <button onclick="return confirm('هل انت متأكد من الاستمرار في العملية؟')"
                class="btn Confirm btn-xs btn-danger">
                <i class="fas fa-solid fa-trash"></i></button>
        </form>

    </td>
</tr>
@endforeach --}}