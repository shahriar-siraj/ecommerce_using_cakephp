
  jQuery(document).ready(function($) {


    function searchDeleteInput() { 

	    $(".delete-input-search").click(function() {
	        
	        var button = $(this);
	        button.closest('.line-input-search').remove();
	        return false;

	    });

	}

  function typeahead() {

    $('.search-multiple-fields').each(function(){
        var myTypeahead = $(this).typeahead({
          minLength: 3,
          maxItem: 5,
          order: "asc",
          dynamic: true,
          delay: 500,
          emptyTemplate: 'No result for "{{query}}"',
          source: {
              url: [{
                  type: "POST",
                  dataType: "json",
                  url: $(".search-multiple-fields").attr("data-url"),
                  data: {
                      q: "{{query}}"
                  }
              }, "data"]
          }
        });

      });

    }

	searchDeleteInput();
  typeahead();

    // ADD TO CART FUNCTION
    $(".duplicate-form-field").click(function() {
        
        var button = $(this);
        var inputUrl = button.attr("data-url");

        $.ajax({
            type : "POST",
            url : inputUrl,
            dataType: "HTML",
            success : function (data) {
              $('.inputs').append('<div style="margin-top: 20px;">' + data + '</div>');
              searchDeleteInput();
              typeahead();
            },
            error : function (e) {
              // Ajax error
              console.log('ajax error');
            }
        });

        return false;

    });


  });