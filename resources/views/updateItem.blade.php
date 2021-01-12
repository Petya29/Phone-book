    @extends('phone-book-form.layout')

    <div class="wrapper">

        <form action="{{ route('item-update-submit', $data->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name:</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{ $data->name }}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">Surname: </label>
                <input type="text" name="surname" class="form-control" id="exampleInputPassword2" placeholder="Enter surname" value="{{ $data->surname }}">
                @error('surname')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword3">Email: </label>
                <input type="text" name="email" class="form-control" id="exampleInputPassword3" placeholder="Enter email" value="{{ $data->email }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Phone: </label>
                <input type="text" name="phone" class="form-control" id="exampleInputPassword4" placeholder="Enter phone" value="{{ $data->phone }}">
                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Category: </label>
                {{-- <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Enter phone"> --}}
                <select name="category" autofocus="{{ $data->category }}" id="exampleInputPassword4">
                    <option>Student</option>
                    <option>Programmer</option>
                    <option>Teacher</option>
                    <option>Another</option>
                </select>
            </div>
            <a href="/">
                <button type="submit" class="btn btn-primary btn-update">Submit</button>
            </a>
            <a href="/">
                <button type="button" class="btn btn-primary btn-update">&larr; main page</button>
            </a>
        </form>

    </div>

    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <script src="{{ asset("js/main.js") }}"></script>