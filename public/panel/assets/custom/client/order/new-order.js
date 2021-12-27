$(document).ready(function () {

    // AJAX Dependent Dropdown to show Category based on Socmed
    $('input[name=socmed]').on("change", function () {
        var socmed_id = $('input[name=socmed]:checked').val(); //Get checked Radio button
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: BASE_URL + "/service/order/dropdown-category",
            method: "POST",
            data: {
                _token: token,
                socmed_id: socmed_id,
            },
            success: function (data) {
                // Set all input value to null
                $("#price").val("");
                $("#min").val("");
                $("#max").val("");
                $("#keterangan_area").slideUp();
                $("#keterangan").empty();
                $("#target").val("");
                $("#target").attr("disabled", false);
                $("#komentar_area").slideUp();
                $("#komentar").empty();
                $("#amount").val("");
                $("#amount").attr("disabled", false);
                $("#total_price").val(0);
                $("#total_price").attr("disabled", false);

                $("#pilih-product").prop("disabled", true);
                $("#pilih-product").empty();
                $("#pilih-product").append(
                    '<option value="" selected> Harap terlebih dahulu pilih kategori </option>'
                );

                // Show Category
                $("#pilih-category").prop("disabled", false);
                $("#pilih-category").empty();
                $("#pilih-category").append(
                    '<option value="" selected> Pilih Category </option>'
                );
                $.each(data.listCategories, function (id, value) {
                    $("#pilih-category").append(
                        '<option value="' + value.id + '">' + value.name + '</option>'
                    );
                });
            },
            error: function () {
                toastr.warning("Pastikan data sosmed benar!", 'FAIL', {
                    "timeOut": 2500,
                    "progressBar": true,
                    "closeButton": true,
                });
            }
        });
    });


    // AJAX Dependent Dropdown to show Product based on Category
    $("#pilih-category").on("change", function () {
        var category_id = $('#pilih-category').val(); //Get selected Category
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: BASE_URL + "/service/order/dropdown-product",
            method: "POST",
            data: {
                _token: token,
                category_id: category_id,
            },
            success: function (data) {
                // Set all input value to null
                $("#price").val("");
                $("#min").val("");
                $("#max").val("");
                $("#keterangan_area").slideUp();
                $("#keterangan").empty();
                $("#target").val("");
                $("#target").attr("disabled", false);
                $("#komentar_area").slideUp();
                $("#komentar").empty();
                $("#amount").val("");
                $("#amount").attr("disabled", false);
                $("#total_price").val(0);
                $("#total_price").attr("disabled", false);

                $("#pilih-product").prop("disabled", false);
                $("#pilih-product").empty();
                $("#pilih-product").append(
                    '<option value="" selected> Pilih product </option>'
                );

                // Foreach to show Product
                $.each(data.listProducts, function (id, value) {
                    $("#pilih-product").append(
                        '<option value="' + value.id + '">' + value.name + '</option>'
                    );
                });

            },
            error: function () {
                toastr.warning("Pastikan data category benar!", 'FAIL', {
                    "timeOut": 2500,
                    "progressBar": true,
                    "closeButton": true,
                });
            }
        });
    });


    // AJAX to show Product Detail based on Category
    var hjual = 
    $("#pilih-product").on("change", function () {
        var product_id = $('#pilih-product').val(); //Get selected Product
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: BASE_URL + "/service/order/show-product",
            method: "POST",
            data: {
                _token: token,
                product_id: product_id,
            },
            success: function (data) {
                // Set all input value to null
                $("#price").val("");
                $("#min").val("");
                $("#max").val("");
                $("#keterangan_area").slideUp();
                $("#keterangan").empty();
                $("#target").val("");
                $("#target").attr("disabled", false);
                $("#komentar_area").slideUp();
                $("#komentar").empty();
                $("#amount").val("");
                $("#amount").attr("disabled", false);
                $("#total_price").val(0);
                $("#total_price").attr("disabled", false);

                // Show Value
                hjual = data.detailProducts['hjual'];
                $("#price").val(data.detailProducts['hjual']);
                $("#min").val(data.detailProducts['min']);
                $("#max").val(data.detailProducts['max']);
                $("#keterangan_area").slideDown();
                $("#keterangan").val(data.detailProducts['desc']);
            },
            error: function () {
                toastr.warning("Pastikan data category benar!", 'FAIL', {
                    "timeOut": 2500,
                    "progressBar": true,
                    "closeButton": true,
                });
            }
        });
    });


    // Show Total Price
    $('#amount').keyup(function () {
        var amount = parseInt($('#amount').val());
        if (isNaN(amount)) {
            $("#total_price").val(0);
        } else {
            var total_price = Math.round((hjual/1000) * amount);
            $("#total_price").val(total_price);
        }
    });

});


// Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
class pageFormsValidation {
    /*
     * Init Validation functionality
     *
     */
    static initValidation() {
        // Load default options for jQuery Validation plugin
        One.helpers('validation');

        // Init Form Validation
        jQuery('.js-validation').validate({
            ignore: [],
            rules: {
                'target': {
                     required: true,
                },
                'amount': {
                    required: true,
                    digits: true
                },
            },
            messages: {
                'target': 'Please input target value!',
                'amount': 'Only digits!',
            }
        });

        // Init Validation on Select2 change
        jQuery('.js-select2').on('change', e => {
            jQuery(e.currentTarget).valid();
        });
    }

    /*
     * Init functionality
     *
     */
    static init() {
        this.initValidation();
    }
}

// Initialize when page loads
jQuery(() => { pageFormsValidation.init(); });
