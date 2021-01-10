<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <title>My phone book</title>
</head>
<body>

    <form method="GET" action="{{ route('site-search') }}">
        <div class="siteSearch">
            <input type="text" placeholder="Search" name="query">
            <button type="submit">Search</button>
        </div>
    </form>

    <div class="wrapper">
        <div class="items">
            <span class="Phonebook_header">PhoneBook</span>
            <div class="Phonebook_nav">
                <span>id</span>
                <span>Name</span>
                <span>Surname</span>
                <span>Email</span>
                <span>Phone</span>
                <span>Category</span>
            </div>
            <div class="phoneBookForm">
                <ol>
                    @foreach ($items as $item)
                        <li>
                            <span>{{ $item->id }}</span>
                            <span>{{ $item->name }}</span>
                            <span>{{ $item->surname }}</span>
                            <span>{{ $item->email }}</span>
                            <span>{{ $item->phone }}</span>
                            <span>{{ $item->category }}</span>
                            <div class="upd_del">
                                <a href="{{ route('item-update', $item->id) }}">
                                    <button>&#9998;</button>
                                </a>
                                <a href="{{ route('delete-item', $item->id) }}">
                                    <button>&#10006;</button>
                                </a>
                            </div>    
                        </li>
                    @endforeach
                </ol>

                <a href="/addNew">
                    <button type="button" class="Btn">Add New</button>
                </a>
            </div>
        </div>
    </div>
    
    <script src="{{ asset("js/main.js") }}"></script>
</body>
</html>