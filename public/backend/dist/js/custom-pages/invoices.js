

var baseurl = window.location.origin;

// daynamic fields add and remove
$(document).ready(function () {
    var i = 1;
    $('#add').click(function () {
        i++;
        $('#dynamic_form').append('<tr id="row' + i +
            '"><td class="item"><input type="text" name="product_name[]" class="form-control mx-2 " placeholder="Enter product" ><input type="textarea" name="short_description[]" class="form-control mx-2"   placeholder="Short description"  ></td><td><input type="number" step="1" value="1" placeholder="1" name="quantity[]" class="form-control space-sty"     ></td><td><input type="number" name="unit_cost[]" step="0.01" value="0.00" placeholder="0.00" class="form-control space-sty"   ></td><td><input type="number" readonly name="amount[]" class="form-control space-sty"   > <span class="remove">  <i  class="fa fa-trash icon-sty"></i></span></td></tr>'
        );
        // alert(i);
    });

    $(document).on('click', '.remove', function () {

        var count = $('.remove').length;
        if (count > 1) {
            $(this).closest('tr').remove();
        }

    });
    // fields validation 
    $('input[name^="quantity"]').on('input', function () {
        var value = $(this).val();
        if (value.indexOf('.') >= 0) {
            var parts = value.split('.');
            if (parts[1].length > 0) {
                $(this).val(parts[0] + '.' + parts[1].substring(0, 0));
            }
        }
    });
    $('input[name^="unit_cost"], input[name^="discount"],input[name^="tax"]').on('input', function () {
        var value = $(this).val();
        if (value.indexOf('.') >= 0) {
            var parts = value.split('.');
            if (parts[1].length > 2) {
                $(this).val(parts[0] + '.' + parts[1].substring(0, 2));
            }
        }
    });



    // calculate amount
    $(document).on('keyup', 'input[name^="quantity"], input[name^="unit_cost"]', function () {
        var tr = $(this).closest('tr');
        var quantity = tr.find('input[name^="quantity"]').val();
        var unit_cost = tr.find('input[name^="unit_cost"]').val();
        var amount = (quantity * unit_cost);
        tr.find('input[name^="amount"]').val(amount.toFixed(2));
        calculateTotal();
    });

    function calculateTotal() {
        var totalAmount = 0;
        $('input[name^="amount"]').each(function () {
            totalAmount += +$(this).val();
        });
        $('input[name="sub_total"]').val(totalAmount);
        calculateDiscount();
        CalculateTax();

    }
    function calculateDiscount() {
        var sub_total = $('input[name="sub_total"]').val();
    var discount = $('input[name="discount"]').val() || 0;
        var total_amount = (sub_total - 0);  // for the discount is not calculting here so its 0
        $('input[name="total_amount"]').val(total_amount.toFixed(2));


    }
    // calculate tax amount from tax percentage and add to total amount
    function CalculateTax() {
        /*
        var tax = $('input[name="tax"]').val();
        var tax_amount = (sub_total * tax) / 100;
        */
        var sub_total = $('input[name="sub_total"]').val();
/*
        $('input[name="totalAterTax"]').val(tax_amount + +sub_total);  e  
        var totalAterTax = $('input[name="totalAterTax"]').val();
        var discount = $('input[name="discount"]').val() || 0;
        var total_amount = (totalAterTax - 0); // for the discount is not calculting here so its 0
        */
        var total_amount = sub_total;
 
        $('input[name="total_amount"]').val(total_amount.toFixed(2));
    }

    $(document).on('keyup', 'input[name^="tax"]', function () {

        CalculateTax();
    }

    );

    $(document).on('keyup', 'input[name="discount"]', function () {
        calculateDiscount();
        CalculateTax();

    });
});



//  show taxBox on clicking button 

$(".btn-add").click(function () {
    $(".taxBox").toggle();
});


// get client id from #inv_client on change and pass to url 
$('#inv_client').on('change', function () {
    var id = $(this).val();
    $.ajax({
        url: baseurl + '/admin/invoice/customer/select/' + id,
        type: 'POST',
        success: function (data) {
            // clear the select option if any
            $('#inv_customer').empty();
            // parse json data to array 
            data = JSON.parse(data);
            // loop through the data and append to the select in #inv_customer 
            $.each(data, function (key, value) {
                $('#inv_customer').append('<option value="' + value.id + '">' + value.name + '</option>');
            }
            );
        }
    });
});




$(document).ready(function () {
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // js-client-example-ajax
    $('.js-data-example-ajax').select2({
        placeholder: 'Select a Customer',
        ajax: {
            method: 'POST',
            url: '/admin/customer/search',
            dataType: 'json',
        },
    });



    // js-client-example-ajax 
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


    // $('.js-data-customer-ajax').select2({
    //     placeholder: 'Fliter by Customer',
    //     ajax: {
    //         method: 'POST',
    //         url: '/admin/customer/filter',
    //         dataType: 'json',
    //     },
    // });
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

    $('.js-data-client-ajax').select2({
        placeholder: 'Fliter by Client',
        ajax: {
            method: 'POST',
            url: '/admin/client/filter',
            dataType: 'json',
        },

    });


});

$(document).ready(function () {
    var invTable = $('#dataTableInvoice').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/admin/invoices/get',
            data: function (data) {
                data.searchClient = $('#sel_client').val();
                data.searchCustomer = $('#sel_customer').val();
                data.searchInvoiceNumber = $('#searchInvoiceNumber').val();
                data.client_id = $('#client_id').val();
                data.inv_status = $('#inv_status').val();

            }
        },
        columns: [
            { data: 'invoice_date' },
            { data: 'client_name' },
            { data: 'customer_name' },
            { data: 'invoice_number' },
            { data: 'inv_total_amount' },
            {
                "data": null,
                render: function (data, type, row) {
                    //  if paid_status == null show unpaid badge elseif paid_status == 1 show paid badge else show partial badge

                    if (row.paid_status == 0 || row.paid_status == null) {
                        return `<div class="label label-table label-danger">UnPaid</div>`;
                    }
                    else if (row.paid_status == 1) {
                        return `<div class="label label-table label-success">Paid</div>`;
                    }
                    else {
                        return `<div class="label label-table label-warning">Partial</div>`;
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
            { data: 'action', name: 'Action', orderable: false, searchable: false },
        ]
    });
    $('#sel_client,#sel_customer').change(function () {
        invTable.draw();
    });

    $('#searchInvoiceNumber').keyup(function () {
        invTable.draw();
    });

});

// reset filter on click reset button
$('#reset').click(function () {
    $('#sel_client').val('').trigger('change');
    $('#sel_customer').val('').trigger('change');
    $('#searchInvoiceNumber').val('');
    $('#dataTableInvoice').DataTable().draw();
});
//     onclick="deleteInvoice('.$invoice->id.')">Delete</a>

function deleteInvoice(id) {
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "invoice-delete/" + id,
        type: 'GET',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (response) {
            successToast(response.message);
            location.reload();
        }

    });
}

// markComp 
function markComp(id) {
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "invoice/mark-comp/" + id,
        type: 'GET',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (response) {
            successToast(response.message);
            location.reload();
        }

    });
}



//    invoice payment from stripe 
// src="https://js.stripe.com/v2/" 



$(function () {
    var $form = $(".validation");
    $('form.validation').bind('submit', function (e) {
        var $form = $(".validation"),
            inputVal = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'].join(', '),
            $inputs = $form.find('.required').find(inputVal),
            $errorStatus = $form.find('div.error'),
            valid = true;
        $errorStatus.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function (i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorStatus.removeClass('hide');
                e.preventDefault();
            }
        });

        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-num').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeHandleResponse);
        }

    });

    function stripeHandleResponse(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

});


