jQuery(function ($) {

                // For small devices
                if ($(window).width() > 747) {

                    $('.navbar [data-toggle="dropdown"]').bootstrapDropdownHover({
                      // see next for specifications
                    });

                    var a = 50;
                    $(window).scrollTop() > a && $("#indexNav").addClass("scrolled");
                    var b = ($("#veronaLogo"), $("#indexNav"));
                    $(window).width();
                    $(window).bind("scroll", function() {
                        $(window).scrollTop() > a ? b.addClass("scrolled") : b.removeClass("scrolled")
                    }), $("ul.navbar-nav li a").bind("click", function() {
                        $(this).closest(".navbar-collapse").hasClass("in") && $(this).closest(".navbar-collapse").removeClass("in")
                    })
                }

                $(".scrollP").on('click', function(event) {
                    // Make sure this.hash has a value before overriding default behavior
                    if (this.hash !== "") {
                      // Prevent default anchor click behavior
                      event.preventDefault();

                      // Store hash
                      var hash = this.hash;

                      // Using jQuery's animate() method to add smooth page scroll
                      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                      $('html, body').animate({
                        scrollTop: $(hash).offset().top
                      }, 800, function(){
                   
                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                      });
                    } // End if
                  });
            });
  
            $(function() {

              // We can attach the `fileselect` event to all file inputs on the page
              $(document).on('change', ':file', function() {

                    var input = $(this);

                    // File Extension
                    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'docx', 'csv', 'zip'];
                    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                        alert("Only formats are allowed : "+fileExtension.join(', '));
                        input.val("");
                        return false;
                    }

                    else { 
                      var input = $(this);
                      var f=this.files[0];
                      var sizeInMb = f.size/1024;
                      var sizeLimit= 1024*2; // if you want 5 MB
                      if (sizeInMb > sizeLimit) {
                          alert('Sorry the file exceeds the maximum size of 2 MB!');
                          input.val("");
                          return false;
                      } else {
                          numFiles = input.get(0).files ? input.get(0).files.length : 1,
                          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                          input.trigger('fileselect', [numFiles, label]);
                          $('.files_list').show().append(label + '<br />')
                      }
                  }

              });

              // We can watch for our custom `fileselect` event like this
              $(document).ready( function() {
                  $(':file').on('fileselect', function(event, numFiles, label) {

                      var input = $(this).parents('.input-group').find(':text'),
                          log = numFiles > 1 ? numFiles + ' files selected' : label;

                      if( input.length ) {
                          input.val(log);
                      } else {
                          if( log ) alert(log);
                      }

                  });
              });
              
            });