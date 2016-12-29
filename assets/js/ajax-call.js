$(document).ready(function() {

	/* ============      Seeker Profile Start        ================== */

	/* Accept Only Numbers */
	$(document).on("keypress",".numeric_value",function (e) {
		if (e.which != 8 && e.which != 46 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
		}
	});
	/* Accept Only Characters */
	$(document).on("keypress",".alpha_value",function (e) {
		if (e.which != 8 && e.which != 46 && e.which != 0 && (e.which < 97 || e.which > 122)) {
			return false;
		}
	});
	/* Accept Only Numbers With Dot Operator */
	$(document).on("keyup",".numeric_dot",function () {
    	var number_with_dot = new RegExp("^([0-9]+(.[0-9]+)?)*$");
		if(!number_with_dot.test($(this).val())) {
			$(this).addClass('form-input-error');
		}
		else {
			$(this).removeClass('form-input-error');
		}
	});
	
	/* Restriction for department values based on qualification - SSLC and HSC */
    $(document).on('change','.education_qualification',function() {
        var option = $('option:selected', this).text().toLowerCase().trim();
        if(option == "sslc" || option == "hsc")  {
            $(this).parents('.education_clone').find('.education_department').html("<option value='0'> None </option>");
        }
        else {
        	var input;
        	for(var j=0; j<departments_name_text.length; j++) {
        		input += '<option value="'+departments_name_value[j]+'">'+departments_name_text[j]+'</option>';
        	}
        	$(this).parents('.education_clone').find('.education_department').html(input);
        }
    });

    /* Professional Profile Restriction */
	var professional_group;
	$('.opt_fresh').on('click',function() {
		if($(this).find('input').is(':checked')) {
			// professional_group = $(this).siblings('.professional_profile').html();
			// $(this).siblings('.professional_profile').remove();	
			$(this).siblings('.professional_profile').slideUp();
		}
		else {
			$(this).siblings('.professional_profile').slideDown();
			// $('<div class="professional_profile"> '+professional_group+' </div>').insertAfter($(this));	
		}
	});

	/* Seeker Form Validation On Submit */
	$(document).on('submit','.seeker_edit_form',function(e) {
		e.preventDefault();
		var error = 0;
	
		/* Validate Input and Select element */
		$(this).find('.form_inputs').each(function() {
			var tag_name = $(this).prop("tagName").toLowerCase();
			if($(this).val() == '') {
				error = 1;
				$(this).addClass('form-input-error');
				if(tag_name == "select") {
					$(this).siblings('span').find('.select2-selection').addClass('form-input-error');
				}
			}
			else {
				$(this).removeClass('form-input-error');
				if(tag_name == "select") {
					$(this).siblings('span').find('.select2-selection').removeClass('form-input-error');
				}
			}
		});

		/* Validate Radio Button */
		var radio = [];
    	$('.form_radio').each(function () {
        	var rname = $(this).attr('name');
        		if ($.inArray(rname, radio) == -1) radio.push(rname);
    		});
    		$.each(radio, function (i, name) {
        		if ($('input[name="' + name + '"]:checked').length == 0) {
        			error = 1;
            		$('input[name="' + name + '"]').first().addClass('form-input-error');
            		$('input[name="' + name + '"]').first().parents('.form-group').find('label').addClass('form-input-error');
                }
        	else {
        		$('input[name="' + name + '"]').first().removeClass('form-input-error');
        		$('input[name="' + name + '"]').first().parents('.form-group').find('label').removeClass('form-input-error');
        	}
    	});

    	/* Validate Checkbox */
	    var checkbox = [];
    	$('.form_checkbox').each(function () {
        	var cname = $(this).attr('name');
        	if ($.inArray(cname, checkbox) == -1) checkbox.push(cname);
    	});
    	$.each(checkbox, function (i, name) {
	        if ($('input[name="' + name + '"]:checked').length == 0) {
	        	error = 1;
        	    $('input[name="' + name + '"]').first().addClass('form-input-error');
    	        $('input[name="' + name + '"]').first().parents('.form-group').find('label').addClass('form-input-error');
        	}
        	else {
	        	$('input[name="' + name + '"]').first().removeClass('form-input-error');
        		$('input[name="' + name + '"]').first().parents('.form-group').find('label').removeClass('form-input-error');
        	}
    	});

    	/* Validate Professional Profile */
    	if($('#fresher_option').is(':checked')) {
    		$('.form_exp_inputs').removeClass('form-input-error');
    	}
    	else {
    		$(this).find('.form_exp_inputs').each(function() {
				if($(this).val() == '') {
					error = 1;
					$(this).addClass('form-input-error');
				}
				else {
					$(this).removeClass('form-input-error');
				}
			});	
    	}

    	/* Validate correct details with number fields */
    	if(error == 0) {
	    	var amount_error = 0;
    		$('.inr_validation').each(function() {
	    		if($(this).val().length < 4 ) {
	    			amount_error = 1;
	    			error = 2;
	    			$(this).addClass('form-input-error');
	    		}
	    		else {
	    			$(this).removeClass('form-input-error');
	    		}
    		});
    		var min_amount = parseInt($('#min_amount').val());
    		var max_amount = parseInt($('#max_amount').val());
    		var postal_code = $('#postal-code').val().length;
    		var mobile = $('#seeker_mobile').val().length;
    		if((min_amount > max_amount) && amount_error == 0) {
    			error = 2;
    			$('#max_amount').addClass('form-input-error');
    		}
    		else {
    			$('#max_amount').removeClass('form-input-error');
    		}
    		if(postal_code < 4) {
    			error = 2;
    			$('#postal-code').addClass('form-input-error');
    		}
    		else {
    			$('#postal-code').removeClass('form-input-error');
    		}
    		if(mobile < 10) {
    			error = 2;
    			$('#seeker_mobile').addClass('form-input-error');
    		}
    		else {
    			$('#seeker_mobile').removeClass('form-input-error');
    		}
    		$('.numeric_dot').each(function() {
    			var split_val = $(this).val().split('.');
	    		if(split_val[0].length > 2 ) {
	    			error = 2;
	    			$(this).addClass('form-input-error');
	    		}
	    		else {
	    			$(this).removeClass('form-input-error');
	    		}
    		});
    		$('.edu_percen').each(function() {
	    		if($(this).val().length < 2 ) {
	    			error = 2;
	    			$(this).addClass('form-input-error');
	    		}
	    		else {
	    			$(this).removeClass('form-input-error');
	    		}
    		});
    	}

    	/* Check whether the input and select element has error or not */
		if($('input,select').hasClass('form-input-error')) {
			if(error == 1) {
				$(this).parents('.edit_section_seeker').find('.form_error_ajax').text('Please fill out all mandatory fields').fadeIn();
			}
			else {
				$(this).parents('.edit_section_seeker').find('.form_error_ajax').text('Please fill out with correct details').fadeIn();
			}
			

			var current_error_section = $(this).find('.form-input-error').first().parents('.panel-default');
			$('.panel-heading').removeClass('tab-collapsed');
			$('.panel-collapse').removeClass('in')
			$('.panel-collapse').attr('aria-expanded',"false");
			current_error_section.children('.panel-heading').addClass('tab-collapsed');
			current_error_section.children('.panel-collapse').addClass('in');
			current_error_section.children('.panel-collapse').attr('aria-expanded',"true");
		}
		else {
			/* Ajax Post - Store values - Redirect to controller */
			error = 0;
			var this_error = $(this).parents('.edit_section_seeker').find('.form_error_ajax');
			this_error.text('').fadeOut();
			var form_data = new FormData(this);
			form_data.append('csrf_token',csrf_token_value);

			
			$.ajax({
				type : "POST",
				url : baseurl+"seeker/seeker_edit_form",
				data : form_data,
				contentType: false,
				processData:false,
				success : function(res) {
					if(res == 'success') {
						$("html, body").animate({ scrollTop: 0 }, 1000);
						this_error.addClass('succ_msg');
						this_error.text("Updated Sucessfully").fadeIn();
						setTimeout(function() { location.reload(); }, 3000);
					}
					else {
						$("html, body").animate({ scrollTop: 0 }, 1000);
						this_error.text(res).fadeIn();	
					}
				}
			});
		}
	}); // Submit End

	/* ============      Seeker Profile End        ================== */




}); // End document