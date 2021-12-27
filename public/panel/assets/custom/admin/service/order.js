$(document).ready(function () {
    // Sweet Alert
    $("#updateButton").click(function () {
        var order_id = $(this).data("id");
        var target = $("#target").val()
        var start = $("#start").val()
        var status = $("#status").val()
        var custom_field = $("#custom_field").text();
        var token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
            title: 'Yakin Ingin Melakukan Perubahan?',
            text: "Status Order terkait akan berubah sesuai dengan pilihan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: BASE_URL + "/manage/order/update/" + order_id,
                    method: "PATCH",
                    data: {
                        _token: token,
                        target: target,
                        start: start,
                        status: status,
                        custom_field: custom_field,
                    },
                    success: function (data) {
                        var result = data.result;

                        // Show result
                        $("#target_" + order_id).text(result['target'])
                        $("#href_" + order_id).attr('href',result['target'])
                        $("#start_" + order_id).text(result['start'])
                        if (result['status'] == "Pending") {
                            var span = '<span class="badge badge-warning">Pending</span>';
                        } else if (result['status'] == "Completed") {
                            var span = '<span class="badge badge-success">Completed</span>';
                        } else if (result['status'] == "Canceled") {
                            var span = '<span class="badge badge-danger">Canceled</span>';
                        }
                        $("#status_" + order_id).children("span").remove();
                        $("#status_" + order_id).append(span);

                        // Hide modal
                        $('#detail').modal('hide');
                        Swal.fire(
                            'Success!',
                            "Order No. " + order_id + " Success for Update",
                            'success'
                        )
                    },
                    error: function () {
                        Swal.fire(
                            'Error!',
                            "Data tidak dapat ditemukan. Silahkan refresh halaman ini!",
                            'error'
                        )
                    }
                });
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


// Function show detail
function detail(id) {
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: BASE_URL + "/manage/order/detail/" + id,
        method: "POST",
        data: {
            _token: token,
        },
        success: function (data) {
            var detail = data.order;

            // Empty text
            $("#detail_id").empty()
            $("#updateButton").data('id', "")
            $("#target").val("")
            $("#start").val("")
            $("#status").val("Pending")
            $("#custom_field").text('')

            // Append and add text
            $("#detail_id").append(detail['id']);
            $("#updateButton").data('id', detail['id']);
            $("#target").val(detail['target']);
            $("#start").val(detail['start']);
            $("#status").val(detail['status']);
            $("#custom_field").text(detail['custom_filed']);

            // Show modal
            $('#detail').modal('show');
        },
        error: function () {
            Swal.fire(
                'Error!',
                "Data tidak dapat ditemukan. Silahkan refresh halaman ini!",
                'error'
            )
        }
    });
}


// Function to copy ID Order
function copyId(id) {
    var dummy = document.createElement("textarea");
    // to avoid breaking orgain page when copying more words
    // cant copy when adding below this code
    // dummy.style.display = 'none'
    document.body.appendChild(dummy);
    dummy.value = id;
    dummy.select();
    document.execCommand("copy");
    document.body.removeChild(dummy);
}
