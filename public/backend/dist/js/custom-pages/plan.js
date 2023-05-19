

  var baseurl=  "{{ url('/') }}";
$(document).ready(function() {
    
  
$('.toggle-class').on('change', function() {
    var status = $(this).prop('checked') == true ? 1 : 0;
    var plan_id = $(this).data('id');
    $.ajax({
        type: 'GET',
        dataType: 'JSON',

        url:'/admin/plans-status',
        data: {
            'status': status,
            'plan_id': plan_id
        },
        success:function(data) {
            $.toast ({
                heading: 'Success',
                text: 'Plan status updated successfully',
                position: 'top-right',
                loaderBg: '#94a19f',
                icon: 'success',
                hideAfter: 3500,
                stack: 6
            });
        }
    });
});


$(document).on('click', '#delete', function(e) {
    e.preventDefault();        
    var id = $(this).data('id');
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
    $.ajax({
       
        url: "delete-plan/" + id,
        type: 'GET',
        data: {
            "id": id,
            "_token": token,
        },
        response: 'Delete',
        success: function(response) {
            console.log(response);
            location.reload();
        }
        
    });
});

} );   
  



 


 







