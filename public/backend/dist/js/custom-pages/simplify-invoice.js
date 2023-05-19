$(function() {
    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
    });
    // // For select 2
    // $(".select2").select2();
    // $('.selectpicker').selectpicker();
    //Bootstrap-TouchSpin
    $(".vertical-spin").TouchSpin({
        verticalbuttons: true
    });
    var vspinTrue = $(".vertical-spin").TouchSpin({
        verticalbuttons: true
    });
    if (vspinTrue) {
        $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
    }
    $("input[name='tch1']").TouchSpin({
        min: 0,
        max: 100,
        step: 0.1,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 10,
        postfix: '%'
    });
    $("input[name='tch2']").TouchSpin({
        min: -1000000000,
        max: 1000000000,
        stepinterval: 50,
        maxboostedstep: 10000000,
        prefix: '$'
    });
    $("input[name='tch3']").TouchSpin();
    $("input[name='tch3_22']").TouchSpin({
        initval: 40
    });
    $("input[name='tch5']").TouchSpin({
        prefix: "pre",
        postfix: "post"
    });

});
 
$(function() {
    $('#myTable').DataTable();
    $(function() {
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before(
                            '<tr class="group"><td colspan="5">' + group +
                            '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
    });
});
 // MAterial Date picker    
 $('#mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
 $('#timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
 $('#date-format').bootstrapMaterialDatePicker({ format: 'dddd DD MMMM YYYY - HH:mm' });

 $('#min-date').bootstrapMaterialDatePicker({ format: 'DD/MM/YYYY HH:mm', minDate: new Date() });
 // Clock pickers
 $('#single-input').clockpicker({
     placement: 'bottom',
     align: 'left',
     autoclose: true,
     'default': 'now'
 });
 $('.clockpicker').clockpicker({
     donetext: 'Done',
 }).find('input').change(function() {
     console.log(this.value);
 });
 $('#check-minutes').click(function(e) {
     // Have to stop propagation here
     e.stopPropagation();
     input.clockpicker('show').clockpicker('toggleView', 'minutes');
 });
 if (/mobile/i.test(navigator.userAgent)) {
     $('input').prop('readOnly', true);
 }
 // Colorpicker
 $(".colorpicker").asColorPicker();
 $(".complex-colorpicker").asColorPicker({
     mode: 'complex'
 });
 $(".gradient-colorpicker").asColorPicker({
     mode: 'gradient'
 });
 // Date Picker
 jQuery('.mydatepicker, #datepicker').datepicker();
 jQuery('#datepicker-autoclose').datepicker({
     autoclose: true,
     todayHighlight: true
 });
 jQuery('#date-range').datepicker({
     toggleActive: true
 });
 jQuery('#datepicker-inline').datepicker({
     todayHighlight: true
 });
 // Daterange picker
 $('.input-daterange-datepicker').daterangepicker({
     buttonClasses: ['btn', 'btn-sm'],
     applyClass: 'btn-danger',
     cancelClass: 'btn-inverse'
 });
 $('.input-daterange-timepicker').daterangepicker({
     timePicker: true,
     format: 'MM/DD/YYYY h:mm A',
     timePickerIncrement: 30,
     timePicker12Hour: true,
     timePickerSeconds: false,
     buttonClasses: ['btn', 'btn-sm'],
     applyClass: 'btn-danger',
     cancelClass: 'btn-inverse'
 });
 $('.input-limit-datepicker').daterangepicker({
     format: 'MM/DD/YYYY',
     minDate: '06/01/2015',
     maxDate: '06/30/2015',
     buttonClasses: ['btn', 'btn-sm'],
     applyClass: 'btn-danger',
     cancelClass: 'btn-inverse',
     dateLimit: {
         days: 6
     }
 });
 function successToast(message) {
    $.toast({
                heading: 'Success',
                text:message,
                position: 'top-right',
                loaderBg: '#94a19f',
                icon: 'success',
                hideAfter: 3500,
                stack: 6
            });
  }

    function errorToast(message) {
        $.toast({
                heading: 'Error',
                text:message,
                position: 'top-right',
                loaderBg: '#94a19f',
                icon: 'error',
                hideAfter: 3500,
                stack: 6
            });
    }
    

  
 
