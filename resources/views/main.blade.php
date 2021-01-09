<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <title>My phone book</title>
</head>
<body>

    <div class="wrapper">
        <div class="items">
            <span class="Phonebook_header">PhoneBook</span>
            <div class="Phonebook_nav">
                <span>№</span>
                <span>Name</span>
                <span>Surname</span>
                <span>Email</span>
                <span>Phone</span>
                <span>category</span>
            </div>
            <form action="/" method="post" class="phoneBookForm">
                @csrf
                <ol>
                    @foreach ($items as $item)
                        <li>
                            <span>{{ $item->id }}</span>
                            <span>{{ $item->name }}</span>
                            <span>{{ $item->surname }}</span>
                            <span>{{ $item->email }}</span>
                            <span>{{ $item->phone }}</span>
                            <span>{{ $item->category }}</span>
                        </li>
                    @endforeach
                </ol>
                <div class="addNew">
                    <input type="text" placeholder="Enter name" name="name">
                    <input type="text" placeholder="Enter surname" name="surname">
                    <input type="text" placeholder="Enter email" name="email">
                    <input type="text" placeholder="Enter phone" name="phone">
                    {{-- <input type="text" placeholder="Enter category" name="category"> --}}
                    <select name="chooseCategory">
                        <option value="Student">Student</option>
                        <option value="Programmer">Programmer</option>
                        <option value="Driver">Driver</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Another">Another</option>
                    </select>
                    <button type="submit" name="btn_addNew">Add</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset("js/main.js") }}"></script>
</body>
</html>