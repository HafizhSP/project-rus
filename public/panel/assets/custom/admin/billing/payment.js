$(document).ready(function () {

     // Show Konfirmasi Image
    $(".show-konfirmasi").on("click", function () {
        var image = $(this).attr('image');
        var invoice_id = $(this).attr('invoice');
        $('#image_konfirmasi').modal('show');
        $('#invoice-konfirmasi').text(invoice_id);
        $('#img-konfirmasi').attr('src', image);
    });

    // Sweet Alert
    $(".selectButton").click(function () {
        var form = $(this).parents('form');
        Swal.fire({
            title: 'Yakin Ingin Melakukan Perubahan?',
            text: "Status Invoice terkait akan berubah sesuai dengan pilihan",
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
