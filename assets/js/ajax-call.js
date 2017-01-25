$(document).ready(function() {

	/* ============      Seeker Profile Start        ================== */

	/* Accept Only Numbers */
	$(document).on("keypress",".numeric_value",function (e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
		}
	});

	/* Accept Only Characters with space */
	$(document).on("keypress",".alpha_value",function (e) {
		if (e.which != 8 && e.which != 32 && e.which != 0 && (e.which < 65 || e.which > 90) && (e.which < 97 || e.which > 122)) {
			return false;
		}
	});

	/* Accept Only Numeric with dot */
	$(document).on("keypress",".numeric_dot",function (e) {
		if (e.which != 8 && e.which != 46 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
		}
	});

	/* Validate minlength and maxlength */
	$(document).on("keyup",".form_inputs",function () {
    	var this_val = $.trim($(this).val());
    	var data_min = parseInt($(this).data('minlength'));
		if(this_val.length < data_min && this_val.length!=0) {
			$(this).addClass('form-field-error');
		}
		else {
			$(this).removeClass('form-field-error');
		}
	});

	/* Accept Only Numbers With Dot Operator */
	$(document).on("keyup",".numeric_dot",function () {
    	var number_with_dot = new RegExp("^([0-9]+(.[0-9]+)?)*$");
		if(!number_with_dot.test($(this).val())) {
			$(this).addClass('form-field-error');
		}
		else {
			$(this).removeClass('form-field-error');
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
		var error = '';
		var error_msg = $(this).find('.val_status');
		var message = '';
		var this_form = $(this);
		$('.form_inputs').removeClass('form-field-error');

		/* Validate Input and Select element */
		$(this).find('.form_inputs').each(function() {
			if(!$(this).hasClass('not-required')) {
				var tag_name = $(this).prop("tagName").toLowerCase();
				var this_val = $.trim($(this).val()); 
				if(this_val == '') {
					error = 1;
					message ="Please Provide Valid Information!";
					$(this).addClass('form-field-error');
					if(tag_name == "select") {
						$(this).siblings('span').find('.select2-selection').addClass('form-field-error');
					}
				}
				else {
					$(this).removeClass('form-field-error');
					if(tag_name == "select") {
						$(this).siblings('span').find('.select2-selection').removeClass('form-field-error');
					}
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
				message ="Please Provide Valid Information!";
           		$('input[name="' + name + '"]').first().addClass('form-field-error');
           		$('input[name="' + name + '"]').first().parents('.form-group').find('label').addClass('form-label-error');
            }
        	else {
        		$('input[name="' + name + '"]').first().removeClass('form-field-error');
        		$('input[name="' + name + '"]').first().parents('.form-group').find('label').removeClass('form-label-error');
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
				message ="Please Provide Valid Information!";
        	    $('input[name="' + name + '"]').first().addClass('form-field-error');
    	        $('input[name="' + name + '"]').first().parents('.form-group').find('label').first().addClass('form-label-error');
        	}
        	else {
	        	$('input[name="' + name + '"]').first().removeClass('form-field-error');
        		$('input[name="' + name + '"]').first().parents('.form-group').find('label').first().removeClass('form-label-error');
        	}
    	});

    	/* Validate Professional Profile */
    	if($('#fresher_option').is(':checked')) {
    		$('.form_exp_inputs').removeClass('form-field-error');
    	}
    	else {
    		$(this).find('.form_exp_inputs').each(function() {
				if($(this).val() == '') {
					error = 1;
					message ="Please Provide Valid Information!";
					$(this).addClass('form-field-error');
				}
				else {
					$(this).removeClass('form-field-error');
				}
			});	
    	}

    	/* Validate minlength for input fields */
    	if(error == '') {
			$(this).find('.form_inputs').each(function() {
				var this_val = $.trim($(this).val()); 
				var data_min = parseInt($(this).data('minlength'));
				var data_max = parseInt($(this).attr('maxlength'));
    			var data_name = $(this).data('name');
    			if(this_val.length < data_min && this_val.length != '') {
    				error = 1;
    				message = data_name + " must containes atleast "+data_min+" characters";
					$(this).addClass('form-field-error');
					return false;
				}
				else if(this_val.length > data_max) { 
                    error = 1;
                    message = data_name + " must containes maximum "+data_max+" characters";
                    $(this).addClass('form-field-error');
                    return false;
                }
				else {
					$(this).removeClass('form-field-error');
				}
			});
	   	}

    	/* Validate correct details with number fields */
    	if(error == '') {
			var min_amount = parseInt($('#min_amount').val());
    		var max_amount = parseInt($('#max_amount').val());
			if(min_amount > max_amount) {
    			error = 1;
    			message = "Please Enter Maximum Amount!";
    			$('#max_amount').addClass('form-field-error');
    		}
    		else {
    			$('#max_amount').removeClass('form-field-error');
    		}
    	}
    	/* Validate correct details with number fields */
    	if(error == '') {
			$('.numeric_dot').each(function() {
 				if($(this).is(':visible')) {
	    		 	var split_val = $(this).val().split('.');
	    		 	var number_with_dot = new RegExp("^([0-9]+(.[0-9]+)?)*$");
		    	 	if(split_val[0].length > 2 || split_val[0].length < 2 || !number_with_dot.test($(this).val())) {
		    	 		error = 1;
	    				message = "Please Provide Valid Information!";
		    	 		$(this).addClass('form-field-error');
		    	 	}
		    	 	else {
		    	 		$(this).removeClass('form-field-error');
		    	 	}
		    	}
    		});
    	}


    	/* Check whether the input and select element has error or not */
		if($('input,select').hasClass('form-field-error')) {
			if(message == '') {
				message ="Please Provide Valid Information!";
			}
			error_msg.removeClass('val_success');
            error_msg.addClass('val_error');
            $('html,body').animate({scrollTop : $(this).offset().top }, 500);
            error_msg.html('<i class="fa fa-times" aria-hidden="true"></i> '+message+' ').fadeIn(350);
			
			var current_error_section = $(this).find('.form-field-error').first().parents('.panel-default');
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
			error_msg.html('').fadeOut(350);
			var this_loader = $(this).parents('.edit_section_seeker').find('.edit_loader');
			var form_data = new FormData(this);
			form_data.append('csrf_token',csrf_token_value);
			
			$.ajax({
				type : "POST",
				url : baseurl+"seeker/seeker_edit_form",
				data : form_data,
				contentType: false,
				processData:false,
				beforeSend: function(){
       				this_loader.removeClass('loader-dn');
   				},
 				success : function(res) {
					if(res == 'success') {
            			error_msg.removeClass('val_error');
						error_msg.addClass('val_success');
            			$('html,body').animate({scrollTop : this_form.offset().top }, 500);
            			error_msg.html('<i class="fa fa-check" aria-hidden="true"></i> Updated Sucessfully').fadeIn(350);
						setTimeout(function() { location.reload(); }, 3000);
					}
					else {
						error_msg.removeClass('val_success');
            			error_msg.addClass('val_error');
            			$('html,body').animate({scrollTop : this_form.offset().top }, 500);
            			error_msg.html('<i class="fa fa-times" aria-hidden="true"></i> '+res+'').fadeIn(350);
					}
				},
				complete : function(){
				    this_loader.addClass('loader-dn');
				},
				error : function() {
				    this_loader.addClass('loader-dn');
				    $("html, body").animate({ scrollTop: 0 }, 1000);
				    this_error.text("Not Updated due to Connection Problem. Try again.").fadeIn();
				    setTimeout(function() { location.reload(); }, 3000);
				},

			});
		}
	}); // Submit End

	/* ============      Seeker Profile End        ================== */




}); // End document