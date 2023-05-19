var baseurl = window.location.origin;

//  delete discount on click #delete 
$(document).on('click', '#delete', function () {
    var id = $(this).data('id');
    // ajax 
    $.ajax({
        url: baseurl + '/admin/discount/delete/' + id,
        type: 'DELETE',
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            successToast(response.message);
            location.reload();
        }
    });

});


$(document).ready(function () {
    var discountTable = $('#dataTableDiscount').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/admin/discount/getDiscounts',
            // data: function (data) {
            //     data.searchInvoiceNumber = $('#searchInvoiceNumber').val();
            // }
        },
        columns: [
            { data: 'id' , name:'id'},
            { data: 'discount_date' },
            { data: 'client_name' , orderable: false},
            { data: 'customer_name', orderable: false},
            { data: 'invoice_number' },
            { data: 'amount' },
            { data: 'invoice_amount' },
            // { data: 'invoice_status' },
            {
                "data": null,
                render: function (data, type, row) {
                    if (row.invoice_status == 1) {
                        return `<div class="label label-table label-success">Paid</div>`;
                       
                    }
                    else {
                        return `<div class="label label-table label-danger">UnPaid</div>`;
                    }
                }
            },
            { data: 'action', name: 'Action', orderable: false, searchable: false },

        ]
    });


}
);







