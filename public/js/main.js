// $(document).ready(function() {
//     $('#Btn_category').click(function (e) {

//         let category = $('#chooseCategory').val()
//         console.log(category)

//         $.ajaxSetup({
//             headers:
//                 {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 }
//         });
    
//         $.ajax({
//             //url: "{{ route('filterByCategory') }}",
//             url: "/filterByCategory",
//             type: "GET",
//             data: {
//                 category: category
//             },
//             success: function(result) {
//                 let arr = result.items.data
//                 $("#toChange").remove()
//                 $("#prependTo").after("<tbody id='toChange'></tbody>")

//                 arr.forEach(element => {
//                     $("#toChange").prepend("<tr id='appendTo'></tr>")
//                     $("#appendTo").prepend("<td><div class='upd_del'><a href='{{ route('item-update', $item->id) }}'><button>&#9998;</button></a><a href='{{ route('delete-item', $item->id) }}'><button>&#10006;</button></a>")
//                     $("#appendTo").prepend("<td>" + element.category.category)
//                     $("#appendTo").prepend("<td>" + element.phone)
//                     $("#appendTo").prepend("<td>" + element.email)
//                     $("#appendTo").prepend("<td>" + element.surname)
//                     $("#appendTo").prepend("<td>" + element.name)
//                     $("#appendTo").prepend("<th>" + element.id)
//                 });
//             }
//         })
//     })
// })