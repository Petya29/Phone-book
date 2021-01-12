$(document).ready(function() {
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
        });
    
    });
});