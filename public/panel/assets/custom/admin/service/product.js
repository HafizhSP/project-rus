/*
 *  Document   : product.js
 *  Author     : SMMReseller
 *  Description: Custom JS code used in Forms Validation Page
 */

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
                'api_id': {
                    required: true,
                    digits: true
                },
                'min': {
                    required: true,
                    digits: true
                },
                'max': {
                    required: true,
                    digits: true
                },
                'hbeli': {
                    required: true,
                    digits: true
                },
                'hjual': {
                    required: true,
                    digits: true
                },
                'vendor': {
                    required: true,
                },
            },
            messages: {
                'api_id': 'Only digits!',
                'min': 'Only digits!',
                'max': 'Only digits!',
                'hbeli': 'Only digits!',
                'hjual': 'Only digits!',
                'vendor': 'Please select a value!',
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


// Other Javascript
$(document).ready(function () {
    $('#margin').on('input', function () {
        var margin = parseInt($(this).val());
        var hbeli = parseInt($('#hbeli').val());
        
        // Check IsNan
        if (isNaN(margin) || isNaN(hbeli)) {
            var hjual = 0
        } else {
            var hjual = (hbeli * (margin/100)) + hbeli;
        }
        $('#hjual').val(hjual);
    });
});
