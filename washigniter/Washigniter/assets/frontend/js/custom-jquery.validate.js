jQuery(document).on('ready', function($) {
    "use strict";

    /**=========================
        GET QUOTE FORM
    =========================**/
    // input attr
    $("input").attr("autocomplete", "off");
    
    // validate
    $('#booking_form').validate({
        ignore: "",
        // validation rules
        rules: {
            servicecategory: {
                required: true,
            },
            'services_list[]': {
                required: true,
            },
            first_name: {
                required: true,
            },
            dates: {
                required: true,
            },
            last_name: {
                required: true,
            },
            
            email_id: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                number: true,
                minlength: 9
            },
            address: {
                required: true,
            },
            message: {
                required: true,
            },
            agree: {
                required: true,
            },
            pgmethod: {
                required: true
              }, 
        },
        // validation messages
        messages: {
            servicecategory: {
                required: "Choose service category",
            },
             pgmethod:{
                 required: "Please choose payment method",
              },
            'services_list[]': {
                required: "Choose atleast one Serivce",
            },
            first_name: {
                required: "Enter first name",
            },
            last_name: {
                required: "Enter last name",
            },
            company_name: {
                required: "Enter company name",
            },
            email_id: {
                required: "Enter email id",
                email: "Enter a valid email id"
            },
            dates:{
                 required: "Choose time slot",
            },
            phone: {
                required: "Enter phone number",
                number: "Enter a valid phone number",
                minlength: "Enter at least 9 characters"
            },
            address: {
                required: "Enter address",
            },
            message: {
                required: "Enter message",
            },
            agree: {
                required: "Please check Terms and Conditions",
            }, 
        },
        // error message
        highlight: function (form) { 
            $(form).closest('.form-control').addClass('is-invalid');
        },
        unhighlight: function (form) {
            $(form).closest(".form-control").removeClass("is-invalid");
        },
        focusInvalid: false,
        invalidHandler: function(form, validator) {
        
        if (!validator.numberOfInvalids())
            return;
        
        $('html, body').animate({
            scrollTop: $(validator.errorList[0].element).offset().top
        }, 1000);
        
        },
        // submit handler
        submitHandler: function (form) {
            if ($(form).valid()) {
                form.submit();
            } 

            return false;
        }
    });

}(jQuery)); // End jQuery