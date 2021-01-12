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
                <span id="categoryToChange">{{ $item->category_id }}</span>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>

    <script src="{{ asset("js/main.js") }}"></script>