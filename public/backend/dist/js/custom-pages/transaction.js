var baseurl = window.location.origin;
//  delete discount on click #delete 
$(document).on('click', '#delete', function() {
    var id = $(this).data('id');
    // ajax 
    $.ajax({
        url: baseurl + '/admin/transaction/delete/' + id,
        type: 'DELETE',
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(response) {
            successToast(response.message);
            location.reload();     
        }
});
});

