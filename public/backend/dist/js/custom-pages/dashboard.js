// on doucment ready 
$(document).ready(function () {
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    dashPayData();
    var selected_month = $('#selected_month').val();
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $('#active_month').text(months[selected_month - 1]);
}
);
//  on change select option alert the value 

function setParams() {
    var selected_month = $('#selected_month').val();
    var params = {
        selected_month: selected_month,
    };
    return params;
}
// dashPayTable 
function dashPayData() {
    var params = setParams();
    var dashPayTable = $('#dataTablePayments').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/admin/dashboard/getPayments',
            data: {
                selected_month: params.selected_month,
            },
            dataSrc: function (response) {
                var total_amount_sum = 0;
                for (var i = 0; i < response.aaData.length; i++) {
                    total_amount_sum += response.aaData[i]["total_amount"];
                }
                document.getElementById("active_month_sum").innerHTML = "$" + total_amount_sum;
                return response.aaData;
            }

        },

        columns: [
            { data: 'id' },
            { data: 'payment_date' },
            { data: 'client_name', orderable: false },
            { data: 'customer_name', orderable: false },
            { data: 'invoice_number' },
            { data: 'total_amount' },
        ]

    });
    $('#selected_month').on('change', function () {
        setParams();
        dashPayTable.destroy();
        dashPayData();
        var selected_month = $('#selected_month').val();
        var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $('#active_month').text(months[selected_month - 1]);

    });
}
 // success: function (response) {
            //     // var total_amount_sum = 0;
            //     // for (var i = 0; i < response.aaData.length; i++) {
            //     //     total_amount_sum += response.aaData[i]["total_amount"];
            //     // }
            //     // document.getElementById("active_month_sum").innerHTML = "$" + total_amount_sum;
            // },