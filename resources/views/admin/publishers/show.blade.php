@extends('admin.layouts.master')

@section('title', 'Authors')

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
                            <h3 class="card-title">Authors of Publisher </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#Author's Id</th>
                                        <th>#Author's Name</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                      <td>#</td>
                      <td>{{ $Authors->name }}</td>
                    </tr> --}}
                                    @foreach ($authors as $author)
                                        <tr>
                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                            <td>{{ $author->id }}</td>
                                            <td>{{ $author->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.publishers.deleteAuthors', [$publisher->id, $author->id]) }}"
                                                    class="btn Confirm btn-xs btn-danger">
                                                    <i class="fas fa-solid fa-trash"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <form method="POST" action="{{ route('admin.publishers.addAuthors') }}">
                        @csrf

                        <input type="text" value="{{ $publisher->id }}" name="publisher" hidden>
                        <div class="form-group">
                            <label>Add Authors</label>
                            <select class="custom-select" name="authors[]" multiple>
                                @foreach ($allAuthors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>

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
