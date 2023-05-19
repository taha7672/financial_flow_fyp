// var baseurl = window.location.origin;
// // document ready 
// $(document).ready(function() {
//     getLadgers();
// });
// //  getLadgers
// function getLadgers() {
//     $.ajax({
//         url: baseurl + 'admin/ladger/getLadgers',
//         type: 'POST',
//         dataType: 'JSON',
//         data: {
//             "_token": $('meta[name="csrf-token"]').attr('content'),
//         },
      
//         success: function(res) {
//             console.log(res);
//             $('#t_body').html(res);
//         }
//     });
// }