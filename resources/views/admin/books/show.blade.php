@extends("admin.layouts.master")

@section('title', 'Publishers')

@section('css')

@endsection

@section('content')

    @if (Session::has('data'))
        {{ Session::get('data')['title'] }} - {{ Session::get('data')['code'] }} -
        {{ Session::get('data')['message'] }}
    @endif

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid" class="modal" id="modal">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" class="modal-header">
                            <h3 class="card-title">publisher of Authors </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#Publisher's Id</th>
                                        <th>#Publisher's Name</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($publishers as $publisher)
                                        <tr>
                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                            <td>{{ $publisher->id }}</td>
                                            <td>{{ $publisher->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.authors.deletePublishers', [$author->id, $publisher->id]) }}"
                                                    class="btn Confirm btn-xs btn-danger">
                                                    <i class="fas fa-solid fa-trash"></i>
                                                </a>
                                                {{-- <form class="inline"
                                                    action="{{ route('admin.authors.deletePublishers', [$author->id, $publisher->id]) }}"
                                                    {{-- method="PUT"> --}}
                                                {{-- @csrf --}}
                                                {{-- @method('post') --}}
                                                {{-- <button onclick="return confirm('هل انت متأكد من الاستمرار في العملية؟')"
                                                    class="btn Confirm btn-xs btn-danger">
                                                    <i class="fas fa-solid fa-trash"></i></button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    {{-- <form method="POST" action="{{ route('admin.authors.addPublishers') }}">
                        @csrf

                        <input type="text" value="{{ $author->id }}" name="author" hidden>
                        <div class="form-group">
                            <label>Add publishers</label>
                            <select class="custom-select" name="publishers[]" multiple>
                                @foreach ($allPublishers as $publisher)
                                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form> --}}

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')

@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Modal</title>
  <link href="styles.css" rel="stylesheet">
  <script defer src="script.js"></script>
</head>
<body>
  <button data-modal-target="#modal">Open Modal</button>
  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title">Example Modal</div>
      <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quod alias ut illo doloremque eum ipsum obcaecati distinctio debitis reiciendis quae quia soluta totam doloribus quos nesciunt necessitatibus, consectetur quisquam accusamus ex, dolorum, dicta vel? Nostrum voluptatem totam, molestiae rem at ad autem dolor ex aperiam. Amet assumenda eos architecto, dolor placeat deserunt voluptatibus tenetur sint officiis perferendis atque! Voluptatem maxime eius eum dolorem dolor exercitationem quis iusto totam! Repudiandae nobis nesciunt sequi iure! Eligendi, eius libero. Ex, repellat sapiente!
    </div>
  </div>
  <div id="overlay"></div>
</body>
</html> --}}



