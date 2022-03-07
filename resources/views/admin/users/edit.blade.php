<html lang="en">
<head>
    <title>Edit User</title>
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

        form li + li {
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
            padding-left: 90px; /* same size as the label elements */
        }

        button {
            /* This extra margin represent roughly the same space as the space
               between the labels and their text fields */
            margin-left: .5em;
        }
    </style>
</head>
<body>
<form action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="post">
    <ul>
        <li>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}">
        </li>
        <li>
            <label for="name">Username:</label>
            <input type="text" id="username" name="username" value="{{ $user->username }}">
        </li>
        <li>
            <label for="mail">E-mail:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}">
        </li>
        <li>
            <label for="msg">Status:</label>
            <select id="status" name="status">
                <option value="1" {{ $user->status == '1' ? 'selected' : '' }}>Enabled</option>
                <option value="0" {{ $user->status == '0' ? 'selected' : '' }}>Disabled</option>
            </select>
        </li>
        <li class="button">
            <button type="submit">Edit</button>
        </li>
    </ul>
    {{ csrf_field() }}
</form>
</body>
</html>
