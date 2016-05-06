$( document ).ready(function() {

	//change bg (and text if pirate) based on selection
    $( "select" ).change(function() {
  		$("body").css("background-image","url(images/" + $(this).val() + ".png)");

  		if($(this).val() == 'pirates'){
  			$('#message').val(talkLikeAPirate($('#message').val()));
  		}
	});

    //If subject = pirates, update text on spacebar press
	$( "#message" ).keyup(function(e) {
		if($("#subject").val() == 'pirates')
		if (e.which === 32) {
	    	$(this).val(talkLikeAPirate($(this).val()));
	    }
	});

	//Submit form	
	var data = {};
	$('input[type="submit"]').on('click', function() {
		resetErrors();

		var url = 'resources/process.php';

		 $.each($('form input, form select, form textarea'), function(i, v) {
	          if (v.type !== 'submit') {
	              data[v.name] = v.value;
	          }
	      });

		 $.ajax({
		 	dataType: 'json',
		    type: 'POST',
		    url: url,
		    data: data
		})
		.done(function(response) {

			if (!response.errors) {
				//successful validation
                $('form').submit();
              	return false;
			} else {
                  $.each(response.errors, function(i, v) {
                      var msg = '<label class="error-text" for="'+i+'"> - '+v+'</label>';
                      $('input[name="' + i + '"], select[name="' + i + '"], textarea[name="' + i + '"]').addClass('inputTxtError').before(msg);
                  });
                  var keys = Object.keys(response.errors);
                  $('input[name="'+keys[0]+'"]').focus();
              }
              return false;
		})
		.fail(function(data) {
		    console.log(data)
		});

		return false;
	});

	function resetErrors() {
	    $('form input, form select, form textarea').removeClass('inputTxtError');
	    $('label.error-text').remove();
	}
});