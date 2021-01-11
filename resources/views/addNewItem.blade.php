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
            <span class="Phonebook_header">Create new item</span>

            <form action="/" class="createNewItem" method="POST">
                @csrf

                    <label for="name">Name:</label>
                    <input type="text" placeholder="Enter name" name="name" id="name"><br>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="surname">Surname:</label>
                    <input type="text" placeholder="Enter surname" name="surname" id="surname"><br>
                    @error('surname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="email">Email:</label>
                    <input type="text" placeholder="Enter email" name="email" id="email"><br>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="phone">Phone:</label>
                    <input type="text" placeholder="Enter phone" name="phone" id="phone"><br>
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="category">Category:</label>
                    {{-- <input type="text" placeholder="Enter category" name="category"><br> --}}
                    <select name="category">
                        <option>Student</option>
                        <option>Programmer</option>
                        <option>Teacher</option>
                        <option>Driver</option>
                        <option>Another</option>
                    </select>

                    <button type="submit" class="Btn addBtn">Create new</button>

            </form>

            <a href="/">
                <button class="backBtn">&larr; main page</button>
            </a>

        </div>
    </div>
    
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <script src="{{ asset("js/main.js") }}"></script>
</body>
</html>