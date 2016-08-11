
$(function() {


    
    // Pick-a-date picker
    // ------------------------------
    
    $.datepicker.setDefaults($.datepicker.regional['en']);
    // Basic options
    $('.pickadate').datepicker({
        dateFormat: "dd MM yy",
        showOtherMonths: true,
        selectOtherMonths: true
    });


    // Change day names
    $('#bulanInspeksi').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "MM yy"
    });

    $('#KeteranganTanggal').datepicker({
        dateFormat: "dd MM yy",
        showOtherMonths: true,
        selectOtherMonths: true
    });

    $(".watch").AnyTime_picker({
        format: "%H:%i"
    });
});
