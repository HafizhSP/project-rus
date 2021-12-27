$(document).ready(function () {

    // Konfirmasi Manual and show modals
    $("#konfirmasi_button").on("click", function () {
        var invoice = $(this).data("invoice");
        $('#invoice_show').val('');
        $('#invoice_show').val(invoice);
        // Set action Form Konfirmasi Manual
        $('#formKonfirmasi').attr('action', BASE_URL + '/deposit/history/confirmation/' + invoice);
        $('#konfirmasi').modal('show');
    });

    // Show Konfirmasi Image
    $("#show-konfirmasi").on("click", function () {
        $('#image_konfirmasi').modal('show');
    });

    // Sweet Alert
    $(".js-swal-confirm").click(function () {
        var form = $(this).parents('form');
        Swal.fire({
            title: 'Yakin Ingin Melakukan Perubahan?',
            text: "Pastikan pilihan anda benar dan sesuai",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                form.submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: "Cancelled",
                    text: "Pastikan pilihan anda benar :)",
                    icon: "error",
                    confirmButtonColor: '#3085d6',
                });
            }
        });
    });

});

// Init Plugins Form
jQuery(function () {
    One.helpers(['flatpickr', 'datepicker']);
});


// Function Countdown Pembayaran
function timer() {
    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    $("#countdownPayment").html(hours + " Jam " + minutes + " Menit " + seconds + " Detik");

    // If the count down is finished, write some text
    if (distance < 0) {
        $("#countdownPayment").html(0 + " Jam " + 0 + " Menit " + 0 + " Detik");
        clearInterval(countdownTimer);
    }
}
