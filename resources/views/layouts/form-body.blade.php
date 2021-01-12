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
                <span id="categoryToChange">
                    {{-- {{ $item->category_id }} --}}
                    @if ($item->category_id == "1")
                        Student
                    @elseif($item->category_id == "2")
                        Programmer
                    @elseif($item->category_id == "3")
                        Teacher
                    @elseif($item->category_id == "4")
                        Another
                    @endif
                </span>
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

{{-- <table class="table table-striped">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>surname</td>
        <td>email</td>
        <td>phone</td>
        <td>category</td>
    </tr> --}}

</table>

<script src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>

    <script>
            console.log('js ready')
            $('#Btn_category').click(function (e) {
                console.log('ajax')
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
                })
            })
    </script>

    {{-- <script src="{{ asset("js/main.js") }}"></script> --}}