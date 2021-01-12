    @extends('phone-book-form.layout')

    <div class="wrapper">
        <div class="items">

            @include('layouts.nav')

            @include('layouts.notification')

            {{-- @include('layouts.form-header') --}}
            
            @include('layouts.form-body')

            <div class="page-links">
                {{ $items->links() }}
            </div>
 
        </div>
    </div>