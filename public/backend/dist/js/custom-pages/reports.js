var baseurl = window.location.origin;
// DiscountLadger 
function DiscountLadger() {
    PDFLadger()
}
// PaymentLadger 
function PaymentLadger() {
    PDFLadger()
}




function PDFLadger() {
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: baseurl + '/admin/reports/pdf',
        type: 'POST',
        data: {
            start_date: $("#start_date").val(),
            end_date: $("#end_date").val(),
            report_type: $("#report_type").val(),
            _token: token
        },
            
    success: function(res) {
        $("#imageLoading").addClass("d-none");
        let a = document.createElement("a");
        a.href = baseurl + "/" + res;              
        a.setAttribute("target", "_blank");
        a.click();
    }
      
    });
}

// success: function(res) {
//     $("#imageLoading").addClass("d-none");
//     let a = document.createElement("a");
//     a.href = baseurl + "/" + res;              
//     a.setAttribute("target", "_blank");
//     a.click();
// }