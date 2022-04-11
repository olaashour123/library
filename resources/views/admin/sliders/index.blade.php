@extends("admin.layouts.master")

@section('title', 'Sliders')


@section('css')
    <link rel="stylesheet" href="{{ asset('admin/dist/css/style.css') }}">
@endsection


@section('content')


    <div class="col-sm-3">
        <a href="/admin/sliders/create">
            <i class="fa fa-plus"></i>Create sliders</a>
        {{-- class="btn btn-success " --}}
    </div>
    <br>
    <div class="card-body">
        @if ($sliders->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="10%">Title</th>
                        <th width="10%">description</th>
                        <th width="10%">image</th>
                        <th width="10%">status</th>
                        <th width="10%">Date</th>
                        <th width="10%"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->description }}</td>
                            <td>
                                <img class="img-circle img-bordered-sm" width="65" height="65"
                                    src="{{ url(Storage::url($slider->image)) }}" alt="">
                            </td>
                            <td><input type="checkbox" value="{{ $slider->id }}" class='cbStatus'
                                    {{ $slider->status ? 'checked' : '' }} /></td>
                            <td>
                            <td>{{ $slider->updated_at }}</td>

                            <td>


                                <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-xs btn-primary">
                                    <i class="fas fa-solid fa-bars"></i>
                                </a>

                                <form class="inline"
                                    action="{{ route('admin.sliders.destroy', ['slider' => $slider->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('هل انت متأكد من الاستمرار في العملية؟')"
                                        class="btn Confirm btn-xs btn-danger">
                                        <i class="fas fa-solid fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@else
    <br>
    <div class="alert alert-warning"><b>نأسف</b>, لا يوجد بيانات لعرضها ...</div>
    @endif



    {{-- {{ $books->links() }} --}}

@section('scripts')
    <script>
        $(function() {
            $(".cbStatus").click(function() {
                var id = $(this).val();
                //alert(id);
                $.get("/admin/sliders/" + id + "/status");
            });
        });
    </script>
@endsection

@endsection
