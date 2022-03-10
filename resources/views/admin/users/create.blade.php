@extends("admin.layouts.master")

@section('title')
    Add new Users
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>


        <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('post')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="name">UserName</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter UserName">
                </div>


                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                </div>

                <div class="form-group">
                    <label for="password">PasswordConformation:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Enter password">
                </div>

                <div class="form-group">
                    <label for="mail">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>


                <div class="form-group">
                    <label for="msg">Status:</label>
                    <select id="status" name="status">
                        <option value="1">Enabled</option>
                        <option value="0">Disabled</option>
                    </select>
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
    </div>
@endsection

{{-- ///////////////// --}}

{{-- <html lang="en">

<head>
    <title>Create User</title>
    <style>
        form {
            /* Center the form on the page */
            margin: 0 auto;
            width: 400px;
            /* Form outline */
            padding: 1em;
            border: 1px solid #CCC;
            border-radius: 1em;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        form li+li {
            margin-top: 1em;
        }

        label {
            /* Uniform size & alignment */
            display: inline-block;
            width: 90px;
            text-align: right;
        }

        input,
        textarea {
            /* To make sure that all text fields have the same font settings
               By default, textareas have a monospace font */
            font: 1em sans-serif;

            /* Uniform text field size */
            width: 300px;
            box-sizing: border-box;

            /* Match form field borders */
            border: 1px solid #999;
        }

        input:focus,
        textarea:focus {
            /* Additional highlight for focused elements */
            border-color: #000;
        }

        textarea {
            /* Align multiline text fields with their labels */
            vertical-align: top;

            /* Provide space to type some text */
            height: 5em;
        }

        .button {
            /* Align buttons with the text fields */
            padding-left: 90px;
            /* same size as the label elements */
        }

        button {
            /* This extra margin represent roughly the same space as the space
               between the labels and their text fields */
            margin-left: .5em;
        }

    </style>
</head>

<body>
    <form action="{{ route('admin.users.store') }}" method="post">
        <ul>
            <li>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
            </li>
            <li>
                <label for="name">Username:</label>
                <input type="text" id="username" name="username">
            </li>
            <li>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </li>
            <li>
                <label for="password_confirmation">Password Confirmation:</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </li>
            <li>
                <label for="mail">E-mail:</label>
                <input type="email" id="email" name="email">
            </li>
            <li>
                <label for="msg">Status:</label>
                <select id="status" name="status">
                    <option value="1">Enabled</option>
                    <option value="0">Disabled</option>
                </select>
            </li>
            <li class="button">
                <button type="submit">add</button>
            </li>
        </ul>
        {{ csrf_field() }}
    </form>
</body>

</html> --}}
