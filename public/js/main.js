// console.log('Js enabled')  

// $(document).ready(function () {

//     $('#chooseCategory').click(function (e) {
//         e.preventDefault();
        
//         let category = $('#chooseCategory').val()
//         console.log(category)

//     $.ajaxSetup({
//         headers:
//             {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//     });

//         $.ajax({
//             url: "{{ url('/') }}",
//             type: "GET",
//             data: {
//                 category: category
//             },
//             success: function() {
//                 console.log(data.category)
//             }
//         });

//     });

// });