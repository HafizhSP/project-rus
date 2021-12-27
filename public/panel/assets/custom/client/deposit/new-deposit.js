$(document).ready(function () {

    // On change metode pembayaran
    $("#payment").on("change", function () {
        $("#amount").attr('disabled', false);
        $("#select_nominal").slideDown();
    });

    // On typing amount/nominal
    $('#amount').keyup(function () {
        var amount = parseInt($('#amount').val());
        if (isNaN(amount)) {
            $("#amount_total").text(0);
        } else {
            $("#amount_total").text(addCommas(amount));
        }
    });

    $("button[type='reset']").on("click", function () {
        $("#amount").val(0);
        $("#amount").attr('disabled', true);
        $("#amount_total").text(0);
        $("#select_nominal").slideUp();
    });
});


// Function on click option nominal
function nominal(val) {
    $("#amount").val(val)
    $("#amount_total").text(addCommas(val));
}

// Change currency format
function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}
