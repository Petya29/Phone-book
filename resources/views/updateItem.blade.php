<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <title>My phone book</title>
</head>
<body>
    
    <div class="wrapper">
        <div class="newItems">
            <span class="Phonebook_header">Update item</span>
            <form action="{{ route('item-update-submit', $data->id) }}" class="createNewItem" method="POST">
                @csrf

                    <label for="name">Name:</label>
                    <input type="text" placeholder="Enter name" name="name" value="{{ $data->name }}"><br>

                    <label for="surname">Surname:</label>
                    <input type="text" placeholder="Enter surname" name="surname" value="{{ $data->surname }}"><br>

                    <label for="email">Email:</label>
                    <input type="text" placeholder="Enter email" name="email" value="{{ $data->email }}"><br>

                    <label for="phone">Phone:</label>
                    <input type="text" placeholder="Enter phone" name="phone" value="{{ $data->phone }}"><br>

                    <label for="category">Category:</label>
                    {{-- <input type="text" placeholder="Enter category" name="category" value="{{ $data->category }}"><br> --}}
                    <select name="category" autofocus="{{ $data->category }}">
                        <option>Student</option>
                        <option>Programmer</option>
                        <option>Teacher</option>
                        <option>Driver</option>
                        <option>Another</option>
                    </select>

                    <button type="submit" class="Btn addBtn">Update  </button>

            </form>

            <a href="/">
                <button class="backBtn">&larr; main page</button>
            </a>

        </div>
    </div>

    <script src="{{ asset("js/main.js") }}"></script>
</body>
</html>