<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <title>My phone book</title>
    <meta name="csrf-token" value="{{ csrf_token() }}">
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
                <span>
                    <a href="{{ route('sortById') }}">
                        id
                    </a>
                </span>
                <span>
                    <a href="{{ route('sortByName') }}">
                        Name
                    </a>
                </span>
                <span>
                    <a href="{{ route('sortBySurname') }}">
                        Surname
                    </a>
                </span>
                <span>Email</span>
                <span>Phone</span>
                <span>
                    <select class="chooseCategory" id="chooseCategory">
                            <option>All categories</option>
                            <option>Student</option>
                            <option>Programmer</option>
                            <option>Teacher</option>
                            <option>Driver</option>
                            <option>Another</option>
                    </select>
                        <button type="submit" id="Btn_category">ok</button>
                </span>
            </div>
            <div class="phoneBookForm">
                <ol id="toAppend">
                    <div id="toRemove">
                    @foreach ($items as $item)
                        <li id="liToChange">
                            <span id="idToChange">{{ $item->id }}</span>
                            <span id="nameToChange">{{ $item->name }}</span>
                            <span id="surnameToChange">{{ $item->surname }}</span>
                            <span id="emailToChange">{{ $item->email }}</span>
                            <span id="phoneToChange">{{ $item->phone }}</span>
                            <span id="categoryToChange">{{ $item->category }}</span>
                            <div class="upd_del">
                                <a href="{{ route('item-update', $item->id) }}">
                                    <button>&#9998;</button>
                                </a>
                                <a href="{{ route('delete-item', $item->id) }}">
                                    <button id="BtnDel">&#10006;</button>
                                </a>
                            </div>    
                        </li>
                    @endforeach
                    </div>
                </ol>

                <a href="/addNew">
                    <button type="button" class="Btn">Add New</button>
                </a>
            </div>
        </div>
    </div>

    {{ $items->links() }}

    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <script>

        $('#Btn_category').click(function (e) {
        
        let category = $('#chooseCategory').val()

        $.ajaxSetup({
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        $.ajax({
            url: "{{ route('filterByCategory') }}",
            type: "GET",
            data: {
                category: category
            },
            success: function(result) {
                let arr = result.items.data
                $("#toRemove").remove()
                $('#toAppend').prepend('<div id="toRemove">')
                arr.forEach(element => {
                    $('#toRemove').prepend('<li id="liToChange">')
                    $('#liToChange').prepend("<div class='upd_del'>" + "<a href='{{ route('item-update', $item->id) }}'>" + "<button>&#9998;</button>" + "<a href='{{ route('delete-item', $item->id) }}'>" + "<button>&#10006;</button>")
                    $('#liToChange').prepend("<span id='categoryToChange'>" + element.category + "</span>")
                    $('#liToChange').prepend("<span id='phoneidToChange'>" + element.phone + "</span>")
                    $('#liToChange').prepend("<span id='emailToChange'>" + element.email + "</span>")
                    $('#liToChange').prepend("<span id='surnameToChange'>" + element.surname + "</span>")
                    $('#liToChange').prepend("<span id='nameToChange'>" + element.name + "</span>")
                    $('#liToChange').prepend("<span id='idToChange'>" + element.id + "</span>")
                });
            }
        });

    });
    </script>

    <script src="{{ asset("js/main.js") }}"></script>
</body>
</html>