<table class="table table-striped">
    <thead id="prependTo">
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
                    <option value="0">All categories</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
            </select>
            <button type="submit" id="Btn_category" class="btn btn-dark">ok</button>
          </th>
        </tr>
      </thead>
      <tbody id="toChange">
        <tr>
        @foreach ($items as $item)
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
                    // url: "/filterByCategory",
                    type: "GET",
                    data: {
                        category: category
                    },
                    success: function(result) {
                        let arr = result.items.data
                        $("#toChange").remove()
                        $("#prependTo").after("<tbody id='toChange'></tbody>")

                        arr.forEach(element => {
                            $("#toChange").prepend("<tr id='appendTo'></tr>")
                            $("#appendTo").prepend("<td><div class='upd_del'><a href='{{ route('item-update', $item->id) }}'><button>&#9998;</button></a><a href='{{ route('delete-item', $item->id) }}'><button>&#10006;</button></a>")
                            $("#appendTo").prepend("<td>" + element.category.category)
                            $("#appendTo").prepend("<td>" + element.phone)
                            $("#appendTo").prepend("<td>" + element.email)
                            $("#appendTo").prepend("<td>" + element.surname)
                            $("#appendTo").prepend("<td>" + element.name)
                            $("#appendTo").prepend("<th>" + element.id)
                        });
                    }
                })
            })
    </script>

    <script src="{{ asset("js/main.js") }}"></script>