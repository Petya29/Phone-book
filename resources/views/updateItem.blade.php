    @extends('phone-book-form.layout')

    <div class="wrapper">

        <form action="{{ route('item-update-submit', $item->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name:</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{ $item->name }}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">Surname: </label>
                <input type="text" name="surname" class="form-control" id="exampleInputPassword2" placeholder="Enter surname" value="{{ $item->surname }}">
                @error('surname')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword3">Email: </label>
                <input type="text" name="email" class="form-control" id="exampleInputPassword3" placeholder="Enter email" value="{{ $item->email }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Phone: </label>
                <input type="text" name="phone" class="form-control" id="exampleInputPassword4" placeholder="Enter phone" value="{{ $item->phone }}">
                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Category: </label>
                {{-- <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Enter phone"> --}}
                <select name="category" autofocus="{{ $item->category }}" id="exampleInputPassword4">
                    <option value="1">Student</option>
                    <option value="2">Programmer</option>
                    <option value="3">Teacher</option>
                    <option value="4">Another</option>
                </select>
            </div>
            {{-- Role:
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="role">
                <label class="form-check-label" for="defaultCheck1">Admin</label>
                @error('role')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="2" id="defaultCheck1" name="role" checked>
                <label class="form-check-label" for="defaultCheck1">User</label>
                @error('role')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div> --}}
            Role:
            @foreach ($roles as $role)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $role->id }}" id="defaultCheck1" name="roles[]">
                <label class="form-check-label" for="defaultCheck1">{{ $role->name }}</label>
                @error('role')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @endforeach
            <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile02" name="photo" accept="image/png">
                  <label class="custom-file-label" for="inputGroupFile02">Choose photo in png</label>
                </div>
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