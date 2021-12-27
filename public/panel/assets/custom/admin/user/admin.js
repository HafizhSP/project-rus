/*
 *  Document   : admin.js
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
                'email': {
                    required: true,
                    email: true
                },
            },
            messages: {
                'email': 'Please enter a valid email address!',
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
