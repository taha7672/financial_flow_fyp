var baseurl = window.location.origin;

// #filter-btn button show .filters div 
$('#filter-btn').on('click', function () {
    $('.filters').toggle();
});
function setParams() {
    var s_date = $("#start_date").val();
    var e_date = $("#end_date").val();
    let status = $("#status").val();
    let client = $("#client").val();
    let customer = $("#customer").val();
    if (s_date === "") {
        s_date = "-1"
    }
    if (e_date === "") {
        e_date = "-1"
    }
    return {
        end_date: e_date,
        start_date: s_date,
        client: client,
        customer: customer,
        status: status,
    };
}



$(document).ready(function () {
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.filters').hide();
    $('.unpaid-a').addClass('active');
    var tab = $('.unpaid-tab').attr('data-id');
    receivableData(tab)
    // #clients 
    $('.js-client-example-ajax').select2({
        placeholder: 'Select a Client',
        ajax: {
            method: 'POST',
            url: '/admin/client/search',
            dataType: 'json',
        },
    });
    $('.js-customer-example-ajax').select2({
        placeholder: 'Select a Customer',
        ajax: {
            method: 'POST',
            url: '/admin/inv-customer/search',
            dataType: 'json',
        },
    });
    $('.js-client-example-ajax').on('change', function() {
        var clientId = $(this).val();
        $('.js-customer-example-ajax').select2({
            placeholder: 'Select a Customer',
            ajax: {
                method: 'POST',
                url: '/admin/inv-customer/search',
                dataType: 'json',
                data: {
                    client_id: clientId
                },
            },
        });
    });
    

});

function receivableData(tab) {
    var params = setParams();
    var receivableTable = $('#receivableTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/admin/receivables/getReceivable',
            data: {
                selectedTab: tab,
                start_date: params.start_date,
                end_date: params.end_date,
                client: params.client,
                customer: params.customer,
                status: params.status,
            }
        },
        columns: [
            // { data: 'id' , name:'id'},
            { data: 'invoice_date' },
            { data: 'client_name', orderable: false },
            { data: 'customer_name', orderable: false },
            { data: 'invoice_number' },
            { data: 'amount_due', orderable: false },
            {
                "data": null,
                render: function (data, type, row) {
                    if (row.paid_status == 1) {
                        return `<div class="label label-table label-success">Paid</div>`;
                    }
                    else {
                        return `<div class="label label-table label-danger">UnPaid</div>`;
                    }
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    if (row.status == 'Completed') {
                        return `<div class="label label-table label-success">Completed</div>`;
                    }
                    else if (row.status == 'Sent') {
                        return `<div class="label label-table label-info">Sent</div>`;
                    }
                    else {
                        return `<div class="label label-table label-primary">Pending</div>`;
                    }
                }
            },
        ]
    });
    $('.paid-tab, .all-tab, .unpaid-tab').on('click', function () {
        receivableTable.destroy();
        var tab = $(this).attr('data-id');
        $('.nav-item').removeClass('active');
        $(this).addClass('active');
        receivableData(tab);

    });
    // #apply-filter 
$('#apply-filter').on('click', function () {
    receivableTable.destroy();
    $('.nav-link').removeClass('active');
    var tab = $('.all-tab').attr('data-id');
    receivableData(tab)
}
);
// #reset-filter
$('#reset-filter').on('click', function () {
    receivableTable.destroy();
    $('.unpaid-a').addClass('active');
    $('.filters').hide();
    var tab = $('.unpaid-tab').attr('data-id');
    $('#start_date').val('');
    $('#end_date').val('');
    $('#client').val('').trigger('change');
    $('#customer').val('').trigger('change');
    $('#status').val('').trigger('change');
    receivableData(tab)
}
);

}



