$(document).ready(function () {
   "use strict";
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('#payBtn').removeAttr("disabled");
                $('#payment-errors').addClass('alert alert-danger');
                $("#payment-errors").html(response.error.message);
            } else {
                var form$ = $("#paymentFrm");
                var token = response['id'];
                form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                form$.get(0).submit();
            }
        }
         $("#paymentFrm").submit(function(event) {
                $('#payBtn').attr("disabled", "disabled");
                Stripe.createToken({
                    number: $('#card_num').val(),
                    cvc: $('#card-cvc').val(),
                    exp_month: $('#card-expiry-month').val(),
                    exp_year: $('#card-expiry-year').val()
                }, stripeResponseHandler);
                return false;
            });
});