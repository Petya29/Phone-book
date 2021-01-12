<form method="GET" action="{{ route('site-search') }}">
    {{-- <div class="siteSearch">
        <input type="text" placeholder="Search" name="query">
        <button type="submit">Search</button>
    </div> --}}
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1" name="query">
          </div>
        </form>
      </nav>
</form>