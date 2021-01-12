    @extends('phone-book-form.layout')

    @include('layouts.nav')

    <div class="wrapper">
        <div class="items">

            @include('layouts.form-header')
            
            @include('layouts.form-body')
 
        </div>
    </div>

    <div class="page-links">
        {{ $items->links() }}
    </div>