  jQuery(document).ready(function($) {

    //alert('test');
    
    // ADD TO CART FUNCTION
    $(".addToCart").click(function() {
        
        var button = $(this);
        var qtyAdded = $('.addToCartContainer').find('input').val();

        // If the quantity is greater or equal to 1
        if (qtyAdded >= 1) {

           $.ajax({
              type : "POST",
              url : button.attr("data-url"),
              data : {
                  qty: qtyAdded
              },
              dataType: "json",
              success : function (data) {
                  console.log(data);
                  alert('Product added to the cart!');
              },
              error : function (e) {
                  // Ajax error
                  console.log('ajax error');
              }
          });

        } else {
          alert('The quanity has to be equal or greater than 1!');
        }
        return false;
    });

    // UPDATE QTY 

    $('.updateQty').bind('input',function(){ 

        var product = $(this);
        var updateQtyUrl = product.attr("data-url");
        var qty = product.val();

        $.ajax({
            type : "POST",
            url : updateQtyUrl,
            data : {
                  qty: qty
            },
            dataType: "json",
            success : function (data) {
              alert('Qty of this product updated!');
              // Update Subtotal, GST and Total
              $('.gst-line').html(data.cart.gst);
              $('.subtotal-line').html(data.cart.subtotal);
              $('.total-line').html(data.cart.total);
            },
            error : function (e) {
              // Ajax error
              console.log('ajax error');
            }
        });

        return false;

    });

    // REMOVE PRODUCT FROM A CART
    $(".removeProduct").click(function() {
        
        var product = $(this);
        var removeUrl = product.attr("data-url");

        $.ajax({
            type : "POST",
            url : removeUrl,
            dataType: "json",
            success : function (data) {
              //product.closest('.product-line').animate({'line-height':0},1000).hide(1);
              //alert('Product removed to the cart!');
              // Update Subtotal, GST and Total
              //$('.gst-line').html(data.cart.gst);
              //$('.subtotal-line').html(data.cart.subtotal);
              //$('.total-line').html(data.cart.total);
              // Refresh the current page
              location.reload();
            },
            error : function (e) {
              // Ajax error
              console.log(e);
            }
        });

        return false;

    });

    // CHOOSE DELIVERY METHOD
    $('.chooseDelivery').change(function()
    {

      var delivery_price = $(this).find('option:selected').val();
      var delivery_name = $(this).find('option:selected').text();
      var store_id = $(this).closest('select').attr('data-store-id');

      if (delivery_price != '') { 
          $.ajax({
              type : "POST",
              url : $(this).attr("data-url"),
              data : {
                    store_id: store_id,
                    delivery_price: delivery_price,
                    delivery_name: delivery_name
              },
              dataType: "json",
              success : function (data) {
                alert('Delivery Method changed!');
                location.reload();
              },
              error : function (e) {
                console.log(e);
              }
          });
          return false;
      }

    });

  });