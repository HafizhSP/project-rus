// Function show detail
function detail(id) {
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: BASE_URL + "/service/history/detail/" + id,
        method: "POST",
        data: {
            _token: token,
        },
        success: function (data) {
            var detail = data.order;
            // Empty text
            $("#detail_id").empty()
            $("#jml_awal").empty()
            $("#jml_pesan").empty()
            $("#sisa").empty()
            $("#refunded").empty()
            $("#date").empty()
            $("#date_proses").empty()
            $("#date_selesai").empty()
            $("#catatan").text('');

            // // Append and add text
            $("#detail_id").append(detail['id']);
            $("#jml_pesan").append(detail['amount']);
            $("#jml_awal").append(detail['start']);
            $("#sisa").append(detail['remain']);
            if (detail['status'] == "Refund") {
                $("#refunded").append("Refund");
            } else {
                $("#refunded").append("-");
            }
            $("#date").append(detail['date_added']);
            if (detail['date_processed']) {
                $("#date_proses").append(detail['date_processed']);
            } else {
                $("#date_proses").append("-");
            }
            if (detail['date_completed']) {
                $("#date_selesai").append(detail['date_completed']);
            } else {
                $("#date_selesai").append("-");
            }
            $("#catatan").text(detail['custom_filed']);

            // Show modal
            $('#detail').modal('show');
        },
        error: function () {
            Swal.fire(
                'Error!',
                "History order tidak dapat ditemukan. Silahkan refresh halaman ini!",
                'error'
            )
        }
    });
}

// Function to copy ID Order
function copyId(id) {
    var copyText = document.getElementById(id);
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    /* Copy the text inside the text field */
    document.execCommand("copy");
}

// Function to copy Target Order
function copyTarget(id) {
    var copyText = document.getElementById("link_" + id);
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    /* Copy the text inside the text field */
    document.execCommand("copy");
}
