jQuery(document).ready(function($) {

    // CHOOSE DELIVERY METHOD
    $('#activate_flat_rate').change(function()
    {

      var check = $(this).val();

      if (check == 1) { 
        $('#flat-rate-line').show();
      } else {
        $('#flat-rate-line').hide();
      }

    });

    // ORDER GREATER THAN
    $('#activate_order_greater').change(function()
    {

      var check = $(this).val();

      if (check == 1) { 
        $('#order-greater-line').show();
      } else {
        $('#order-greater-line').hide();
      }

    });

    // ORDER GREATER THAN
    $('#activate_order_greater_weight').change(function()
    {

      var check = $(this).val();

      if (check == 1) { 
        $('#order-greater-weight-line').show();
      } else {
        $('#order-greater-weight-line').hide();
      }

    });

    // Next (Payment Method)
    $("#next_link_payment").click(function() {

      var check = $('#pay_method').val();

      if (check == 0) {
        alert('Please choose a payment method!');
        return false;
      } else {
        // Redirect to, we will parse the payment method name
        return true;
      }

    });

  });