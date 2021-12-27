/*
 *  Document   : reseller.js
 *  Author     : SMMReseller
 *  Description: Custom JS code used in Forms Validation Page
 */


$(document).ready(function () {
    // Sweet Alert
    $(".selectButton").on('click', function () {
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
                'email': {
                    required: true,
                    email: true
                },
                'saldo': {
                    required: true,
                    digits: true
                },
            },
            messages: {
                'email': 'Please enter a valid email address!',
                'saldo': 'Only digits!',
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
jQuery(() => {
    pageFormsValidation.init();
});
