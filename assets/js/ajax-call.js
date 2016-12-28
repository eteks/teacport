$(document).ready(function() {



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



$(document).on('submit','.seeker_edit_form',function(e) {
	e.preventDefault();
	var error = 0;
	
	// Validate input and select element
	$(this).find('.form_inputs').each(function() {
		var tag_name = $(this).prop("tagName").toLowerCase();
		if($(this).val() == '') {
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

	// Validate radio button
	var radio = [];
    $('.form_radio').each(function () {
        var rname = $(this).attr('name');
        if ($.inArray(rname, radio) == -1) radio.push(rname);
    });
    $.each(radio, function (i, name) {
        if ($('input[name="' + name + '"]:checked').length == 0) {
            $('input[name="' + name + '"]').first().addClass('form-input-error');
            $('input[name="' + name + '"]').first().parents('.form-group').find('label').addClass('form-input-error');

        }
        else {
        	$('input[name="' + name + '"]').first().removeClass('form-input-error');
        	$('input[name="' + name + '"]').first().parents('.form-group').find('label').removeClass('form-input-error');
        }
    });

    // Validate checkbox
    var checkbox = [];
    $('.form_checkbox').each(function () {
        var rname = $(this).attr('name');
        if ($.inArray(rname, checkbox) == -1) checkbox.push(rname);
    });
    $.each(checkbox, function (i, name) {
        if ($('input[name="' + name + '"]:checked').length == 0) {
            $('input[name="' + name + '"]').first().addClass('form-input-error');
            $('input[name="' + name + '"]').first().parents('.form-group').find('label').addClass('form-input-error');
        }
        else {
        	$('input[name="' + name + '"]').first().removeClass('form-input-error');
        	$('input[name="' + name + '"]').first().parents('.form-group').find('label').removeClass('form-input-error');
        }
    });

    // Validate professional profile
    if($('#fresher_option').is(':checked')) {
    	$('.form_exp_inputs').removeClass('form-input-error');
    }
    else {
    	$(this).find('.form_exp_inputs').each(function() {
			var tag_name = $(this).prop("tagName").toLowerCase();
			if($(this).val() == '') {
				$(this).addClass('form-input-error');
			}
			else {
				$(this).removeClass('form-input-error');
			}
		});	
    }


	if($('input,select').hasClass('form-input-error')) {
		error = 1;
		$(this).parents('.edit_section_seeker').find('.form_error_ajax').text('Please fill out all mandatory fields').fadeIn();
		var current_error_section = $(this).find('.form-input-error').first().parents('.panel-default');
		$('.panel-heading').removeClass('tab-collapsed');
		$('.panel-collapse').removeClass('in')
		$('.panel-collapse').attr('aria-expanded',"false");
		current_error_section.children('.panel-heading').addClass('tab-collapsed');
		current_error_section.children('.panel-collapse').addClass('in');
		current_error_section.children('.panel-collapse').attr('aria-expanded',"true");
	}
	else {
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
					location.reload();
					// this_error.text(res).fadeIn();
				}
				else {
					this_error.text(res).fadeIn();	
				}
			}

		});
	}




});




}); // End document