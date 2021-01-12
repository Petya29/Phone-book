<table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">
            <a href="{{ route('sortById') }}" class="sort-links">id</a>
          </th>
          <th scope="col">
            <a href="{{ route('sortByName') }}" class="sort-links">name</a>
          </th>
          <th scope="col">
            <a href="{{ route('sortBySurname') }}" class="sort-links">surname </a>
          </th>
          <th scope="col">email</th>
          <th scope="col">phone</th>
          <th scope="col">
            <select class="chooseCategory" id="chooseCategory">
                    <option>All categories</option>
                    <option>Student</option>
                    <option>Programmer</option>
                    <option>Teacher</option>
                    <option>Another</option>
            </select>
            <button type="submit" id="Btn_category" class="btn btn-dark">ok</button>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->surname }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->category->category }}</td> 
            <td>
                <div class="upd_del">
                <a href="{{ route('item-update', $item->id) }}">
                    <button>&#9998;</button>
                </a>
                <a href="{{ route('delete-item', $item->id) }}">
                    <button id="BtnDel">&#10006;</button>
                </a>
                </div>
            </td>   
        </tr>
        @endforeach
      </tbody>
</table>

<a href="/addNew">
    <button type="button" class="btn btn-success">Add new</button>
</a>

<script src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>

    <script>
            console.log('js ready')
            $('#Btn_category').click(function (e) {

                let category = $('#chooseCategory').val()
                console.log(category)

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