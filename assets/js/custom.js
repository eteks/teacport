function provider_inbox_ajax_message_count(url,id,csrf){    var messagecount = $.ajax({        type: "POST",        url: url+"provider/inbox/messagecount",        data : { orgid : id , csrf_token : csrf},        async: false    }).complete(function(){        setTimeout(function(){provider_inbox_ajax_message_count(url,id,csrf);}, 10000);    }).responseText;    $('.provider_message_count .button__badge').text(messagecount);}  // Seeker inbox countfunction seeker_inbox_ajax_message_count(url,id,csrf){    var messagecount = $.ajax({        type: "POST",        url: url+"seeker/inbox/messagecount",        data : { cand_id : id , csrf_token : csrf},        async: false    }).complete(function(){        setTimeout(function(){seeker_inbox_ajax_message_count(url,id,csrf);}, 10000);    }).responseText;    $('.seeker_message_count .button__badge').text(messagecount);}$(window).load(function(){ 	$('#dashboard_popup_act').modal({backdrop: 'static', keyboard: false}) ; 	$('#dashboard_popup_act').modal('show');}); $(document).ready(function() {    "use strict";        /*--- PRE LOADER JS ---*/    window.onload = function() {        document.getElementById('spinner').style.display = 'none';    };    /*--- Counter Up---*/    $('.counter').counterUp({        delay: 10,        time: 2000    });    /*--- OUR CLIENTS CAROUSEL---*/        $(".clients-list").owlCarousel({        autoPlay: true,        slideSpeed: 2000,        pagination: false,        navigation: false,        loop: true,        items: 6,        itemsDesktop: [1199, 4],        itemsDesktopSmall: [980, 3],        itemsTablet: [768, 4],        itemsTabletSmall: false,        itemsMobile: [479, 2],    });    /*--- TESTIMONIAL 1---*/        $("#owl-testimonial").owlCarousel({        navigation: false, // Show next and prev buttons        slideSpeed: 600,        paginationSpeed: 700,        autoPlay: 5000,        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],        pagination: false,        responsive: true,        loop: true,        // "singleItem:true" is a shortcut for:        items: 2    });	/*--- TESTIMONIAL 2---*/    $(".owl-testimonial-2").owlCarousel({        autoPlay: true,        slideSpeed: 2000,        pagination: false,        navigation: false,        loop: true,        items: 3,        itemsDesktop: [1199, 3],        itemsDesktopSmall: [980, 2],        itemsTablet: [768, 2],        itemsTabletSmall: false,        itemsMobile: [479, 1]    });    /*--- ACCORDIAN---*/    $('.panel-heading').click(function(e) {        $('.panel-heading').removeClass('tab-collapsed');        var collapsCrnt = $(this).find('.collapse-controle').attr('aria-expanded');        if (collapsCrnt != 'true') {            $(this).addClass('tab-collapsed');        }    });    /*--- SEACRH FIXED---*/        $(window).scroll(function() {        var scrollTop = $(window).scrollTop();        if (scrollTop > 300) {            $(".search").addClass("navbar-fixed-top");        } else if (scrollTop < 300) {            $(".search").removeClass("navbar-fixed-top");        }    });    $(".select-category ").select2({        placeholder: "Select Job Category",        allowClear: true,        minimumResultsForSearch: Infinity            });    $(".select-location").select2({        placeholder: "Select Job Location",        allowClear: true,            });    $(".select-resume").select2({        placeholder: "Select Job Resume",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-classlevel").select2({        placeholder: "Select Class Level",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-qualification").select2({        placeholder: "Select Qualification",        allowClear: true,        minimumResultsForSearch: Infinity    });	$(".select-subject").select2({        placeholder: "Select Subject",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-experience").select2({        placeholder: "Select Experience",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-medium").select2({        placeholder: "Select Medium",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-institution").select2({        placeholder: "Select Institution",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-nationality").select2({        placeholder: "Nationality",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-religion").select2({        placeholder: "Select Religion",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-mothertongue").select2({        placeholder: "MotherTongue",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-community").select2({        placeholder: "Community",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-minsalary").select2({        placeholder: "Salary Minimum",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-maxsalary").select2({        placeholder: "Salary Maximum",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-yesno").select2({        placeholder: "",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-tet").select2({        placeholder: "TET",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-jobtype").select2({        placeholder: "JobType",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-tags").select2({        placeholder: "Tags",        allowClear: true,        minimumResultsForSearch: Infinity    });    $(".select-university").select2({        placeholder: "University",        allowClear: true,        minimumResultsForSearch: Infinity    });    /*--- MENU---*/        $('.mega-menu').megaMenu({        // MOBILE MODE SETTINGS         mobile_settings: {            collapse: true,            sibling: true,            scrollBar: true,            scrollBar_height: 400,            top_fixed: true,            sticky_header: true,            sticky_header_height: 200        }    });    /*--- SCROLL TO TOP---*/        $(window).scroll(function() {        if ($(this).scrollTop() > 100) {            $('.scrollup').fadeIn();        } else {            $('.scrollup').fadeOut();        }    });    $('.scrollup').click(function() {        $("html, body").animate({            scrollTop: 0        }, 600);        return false;    });    /*--- FILE UPLOADER---*/        $('.image-preview-clear').click(function() {        $(this).parents('.image-preview').find('.image-preview-filename').val("");        $(this).parents('.image-preview').find('.image-preview-clear').hide();        $(this).parents('.image-preview').find('.image_upload_profile').hide();        $(this).parents('.image-preview').find('.image-preview-input input:file').val("");        $(this).parents('.image-preview').find(".image-preview-input-title").text("Browse");        if($('*').hasClass('imagepreview_act')){        	$('.imagepreview_act').html('');        }    });        $(".image-preview-input input:file").change(function() {        var file = this.files[0];        var parentss = $(this).parents('.image_upload');        var reader = new FileReader();        // Set preview image into the popover data-content        reader.onload = function(e) {            organizationlogo(e.target.result,file.name);        };        reader.readAsDataURL(file);        function organizationlogo(src,filename){        	parentss.find(".image-preview-input-title").text("Change");            parentss.find(".image-preview-clear").show();            parentss.find('.image_upload_profile').show().attr('src',src);            parentss.find(".image-preview-filename").val(filename);            if($('*').hasClass('imagepreview_act')){            	$('.imagepreview_act').html('<img src="'+src+'">');            }        }            });        //Home Page search Bar 	$(".search-close").on("click", function() {		$(".set-srch-strip").hide();	  	$("#search-icon").show();	});    	  	$('#search-icon a').on("click", function() {		$('.set-srch-strip').show();	  	$("#search-icon").hide();	});   	   	//Provider Signin & SignUp	$(".loginbox-signup a").on("click", function() {	  	$("#provider-signin").hide();	  	$("#provider-forgotpwd").hide();	  	$("#provider-signup").show();	});		$(".loginbox-signin a").on("click", function() {		$("#provider-signup").hide();	  	$("#provider-forgotpwd").hide();	  	$("#provider-signin").show();	}); 	  	$(".propwd-forgot a").on("click", function(){	 	$("#provider-signin").hide();	  	$("#provider-signup").hide();	  	$("#provider-forgotpwd").show();	  		});		//Seeker Signin & SignUp	$(".loginbox-signup a").on("click", function() {	  	$("#seeker-signin").hide();	  	$("#seeker-forgotpwd").hide();	  	$("#seeker-signup").show();	});		$(".loginbox-signin a").on("click", function() {	  	$("#seeker-signup").hide();	  	$("#seeker-forgotpwd").hide();	    $("#seeker-signin").show();	});		$(".seekerpwd-forgot a").on("click", function(){	  	$("#seeker-signup").hide();	  	$("#seeker-signin").hide();	  	$("#seeker-forgotpwd").show();	});		//Date Picker	$('.provider_open_date').Zebra_DatePicker({    	direction: true,        format: 'd/m/Y',        show_icon: true,        pair: $('.provider_close_date'),        onClose: function() {        	 $('.provider_close_date').val('').click();        }    });     $('.provider_close_date').Zebra_DatePicker({    	direction: true,        format: 'd/m/Y',    });    $('.provider_start_date').Zebra_DatePicker({    	direction: true,        format: 'd/m/Y',        show_icon: true,        pair: $('.provider_end_date'),        onClose: function() {        	 $('.provider_end_date').val('').click();        }    });     $('.provider_end_date').Zebra_DatePicker({    	direction: true,        format: 'd/m/Y',    });        //Advanced & Normal Search    $('#btn_advanced_act').click(function() {	  	$('#normalsearch_act').hide();	  	$('#advancedsearch_act').show();	});	  	$('#btn_normal_act').click(function() {	  	$('#advancedsearch_act').hide();	  	$('#normalsearch_act').show();	});		var required_fields = ["instituition_name","address","add_district","register_password","postal-code","first_name","designation_profile","profile_image","logo_image","dob"];	var required_postjob = ["job_title","location","no_of_vacancy","open_date","end_date","qualification","radio_ug","radio_pg","class_level","university","institution","medium_of_instruction","accomadation","int_start_date","int_end_date"];	var required_popup = ["mobile","password","cfpassword"];	var required_select_option = ["sel_a","sel_b","sel_c","sel_d","sel_e",];	var feedback = ["subject","feedbck"];	var required_forget = ["forget_email"];	var forget_email=jQuery("#forget_email");	var errornotice = jQuery("#error");	$('#instituition_name,#designation_profile,#first_name').keydown(function (e) {		if (e.ctrlKey || e.altKey) {	    	e.preventDefault();	    }	    else {	    	var key = e.keyCode;	        if (!((key == 8) || (key == 32) || (key == 46) || (key == 9) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {	        	e.preventDefault();	        }	    }	});	jQuery("#form-school").submit(function(){             		for (var i=0;i<required_fields.length;i++) {			var input = jQuery('#'+required_fields[i]);		    if ((input.val() == "")){	            input.addClass("error_input_field");	            $('.error_test').css('display','block');  	            $('.error_image,.error_extension').css('display','none');	        } else {	            input.removeClass("error_input_field");	            $('.error_test').css('display','none');  	        }	    }        	    //  select field 	    for (var i=0;i<required_select_option.length;i++) {	        var input = jQuery('#'+required_select_option[i]);	        if ((input.val() == "")) 	        {	            input.addClass("error_input_field");	            $('.error_test').css('display','block');  	        } 	        else {	                input.removeClass("error_input_field");	                $('.error_test').css('display','none');  	        }	    }            		//if any inputs on the page have the class 'error_input_field' the form will not submit	    if (jQuery(":input").hasClass("error_input_field")  ) {	        $('.error_test').css('display','block');	        return false;	    } 	    else if (jQuery("#profile_image").hasClass("error_input_field")){	        return false;	    }	    else {	        errornotice.hide();	        $('.error_test').css('display','none');	        $(this).unbind();	        $(this).submit();	    }	});    	$("#company_dashboard_form").on('submit',function(e){		e.preventDefault();        for (var i=0;i<required_popup.length;i++) {        	var input = jQuery('#'+required_popup[i]);            if ((input.val() == "")) {                	input.addClass("error_input_field");                    $('.error_test').css('display','block');              }            else {                    input.removeClass("error_input_field");                    $('.error_test').css('display','none');              }		}                   var phoneNo = document.getElementById('mobile');    	if (phoneNo.value == "" || phoneNo.value == null) {        	$('#mobile').addClass("error_input_field_mobile");            $('.error_mobile').css('display','block');        }        if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {        	$('#mobile').addClass("error_input_field_mobile");            $('.error_mobile').css('display','block');       	}        else{        	$('#mobile').removeClass("error_input_field_mobile");            $('.error_mobile').css('display','none');        }        if ($("#password").val() != $("#cfpassword").val()) {        	alert("Passwords do not match.");        }        //if any inputs on the page have the class 'error_input_field' the form will not submit        if (jQuery(":input").hasClass("error_input_field")  ) {            $('.error_test').css('display','block');            $('.error_mobile').css('display','none');            return false;        }         else {            if(jQuery(":input").hasClass("error_input_field_mobile"))  {                $('.error_test').css('display','none');                $('.error_mobile').css('display','block');                return false;            }            else {                errornotice.hide();                $('.error_test').css('display','none');                $('.error_mobile').css('display','none');                $(this).unbind();                $(this).submit();            }    	}    });        $('#job_title,#accomadation,#location,#qualification,#university,#institution,medium_of_instruction').keydown(function (e) {    	if (e.ctrlKey || e.altKey) {        	e.preventDefault();        }         else {        	var key = e.keyCode;            if (!((key == 8) || (key == 32) || (key == 46) || (key == 9) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {            	e.preventDefault();            }        }    });          $("#no_of_vacancy").keypress(function (e) {	    //if the letter is not digit then display error and don't type anything	    if (e.which != 8 && e.which !=46 &&  e.which != 0 && (e.which < 48 || e.which > 57)) {	    	//display error message	        return false;	    }    });        $('.preview_post_ad_image').on('click',function(){		$('.postad_preview').slideToggle();   	});   	   	$('#mobile').keypress(function (e) {		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {	    // $("#error_test").html("Digits Only").show().fadeOut("slow");	    	return false;	    }	});		$("#post_job_form").on('submit',function(e){        e.preventDefault();        for (var i=0;i<required_postjob.length;i++) {        	var input = jQuery('#'+required_postjob[i]);            if ((input.val() == ""))             {                input.addClass("error_input_field");                $('.error_test').css('display','block');              } else {                input.removeClass("error_input_field");                $('.error_footer').css('display','none');              }		}        	for (var i=0;i<required_select_option.length;i++) {        	var input = jQuery('#'+required_select_option[i]);            if ((input.val() == ""))             {                input.addClass("error_input_field");                $('.error_test').css('display','block');              } else {                input.removeClass("error_input_field");                $('.error_test').css('display','none');              }        }              if (jQuery(":input").hasClass("error_input_field")  ) {            $('.error_test').css('display','block');            return false;        }         else {            errornotice.hide();            $('.error_test').css('display','none');            $(this).unbind();            $(this).submit();        }	});		$("#provider_feedback_form").on('submit',function(e){    	e.preventDefault();        for (var i=0;i<feedback.length;i++) {        	var input = jQuery('#'+feedback[i]);            if ((input.val() == ""))             {                input.addClass("error_input_field");                $('.error_test').css('display','block');              } else {                input.removeClass("error_input_field");                $('.error_test').css('display','none');              }        }             if($("#feedbck").val().trim().length < 1){            alert("Please Enter Your feedback...");            return;         }                 //if any inputs on the page have the class 'error_input_field' the form will not submit        if (jQuery(":input").hasClass("error_input_field")  ) {            $('.error_test').css('display','block');            return false;        }        else {            errornotice.hide();            $('.error_test').css('display','none');            $(this).unbind();            $(this).submit();        }    });        jQuery("#forgotpass-form").submit(function(){        var input = jQuery('#'+required_forget);        if ((input.val() == "")){            input.addClass("error_input_field");        } else {            input.removeClass("error_input_field");        }        // Validate the e-mail.        if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(forget_email.val())) {            forget_email.addClass("error_input_field");            $('.error_test').css('display','block');        }        else {            forget_email.removeClass("error_input_field");            $('.error_test').css('display','none');        }        //if any inputs on the page have the class 'error_input_field' the form will not submit        if (jQuery(":input").hasClass("error_input_field") ) {            return false;        } else {            errornotice.hide();            return true;        }    }); 	 	$('#subpack_act option').on('click',function(){ 		var planname = $(this).attr('data-name'); 		var planamount = parseInt($(this).attr('data-amount')); 		var planid = $(this).val(); 		$('.subscription_plan').hide(); 		$('.subscription_plan_description #'+planname).slideDown();		$('#payu_amount').val(planamount);		$('#payu_plan').val(planname);		$('#payu_planid').val(planid); 	}); 	 	$('#accept_terms').click(function() {        if ($('#accept_terms').is(':checked')) {        } else {            alert('please check terms & conditions');        }    });        //Seeker Dashboard - Clone fields for Candidate field 	// var cloneIndex = $(".clonedInput").length;	// function clone() {	// 	$(this).parents(".clonedInput").clone()	//         .appendTo(".clone_all_fields")	//         .attr("id", "edu_set_act " +  cloneIndex)	//         .find("*","input") 	//         .val("")	//               .on('click', 'a.clone', clone)	//         .on('click', 'a.remove', remove);	//     cloneIndex++;	// }	// function remove(){	//     $(this).parents(".clonedInput").remove();	// }	// $("a.clone").on("click", clone);		// $("a.remove").on("click", remove);   					//Seeker Dashboard - Clone Professional Details - OtherJobs	var cloneValue = $(".other_jobs").length;	    function add(){			$(this).parents(".other_jobs").clone()		        .appendTo(".add_otherjobs")		        .attr("id", "otherjobs_act " +  cloneValue)		        .find("*","input") 		        .val("")		              .on('click', 'button.add', add)		        .on('click', 'button.remov', remov);		    cloneValue++;		}		function remov(){		    $(this).parents(".other_jobs").remove();		}		$("button.add").on("click", add);				$("button.remov").on("click", remov); 			// Seeker - Normal & Advanced Search	$("#advanced_srch_act a").on("click", function() {	  	$('#candidate_nos_act').hide();	  	$('#candidate_ads_act').show();	  });      	$("#normal_srch_act a").on("click", function() {	  	$('#candidate_ads_act').hide();	  	$('#candidate_nos_act').show();	}); 	    //Provider dashboard SideMenu	$(".provider-jobs").click(function(){        $(".submenu").slideToggle("slow");    });	    $(window).load(function(){    	$(".submenu").slideUp();    });      //  Added by siva    // DOB datepicker    // var now = new Date();    // var start_year = now.getFullYear() - 80;    // var end_year = now.getFullYear() - 18 ;    // var start_date = start_year+'-'+(now.getMonth()+1)+'-'+now.getDate();    // var end_date = end_year+'-'+(now.getMonth()+1)+'-'+now.getDate();    $('.date_of_birth').Zebra_DatePicker({        direction: ['01-01-1935','31-12-1998'],        format : 'd-m-Y',        view: 'years'    });     $('.year_of_passing').Zebra_DatePicker({        direction: ['1950','2016'],        format: 'Y'    });    //Seeker Dashboard - Clone fields for Candidate field     var education_cloneindex = $(".education_clone").length;    var experience_cloneindex = $(".experience_clone").length;    // Education Clone    function education_clone() {        var id = $(this).parents(".clone_all_fields").find(".clone_section:first").attr("id");        var current_id = id +  education_cloneindex;        $(this).parents(".clone_all_fields").find(".education_clone:last").clone()        .attr("id", current_id).insertAfter('.education_clone:last')        .on('click', 'a.edu_clone', education_clone)        .on('click', 'a.edu_remove', education_remove);        education_cloneindex++;        $('#'+current_id).find('.edit_inputs').val("");    }    // Education Remove    function education_remove(){        $(this).parents(".education_clone").remove();    }    $("a.edu_clone").on("click", education_clone);    $("a.edu_remove").on("click", education_remove);       // Experience Clone    function experience_clone() {        var id = $(this).parents(".clone_all_fields").find(".clone_section:first").attr("id");        var current_id = id +  experience_cloneindex;        $(this).parents(".clone_all_fields").find(".experience_clone:last").clone().insertAfter('.experience_clone:last')        .attr("id", current_id)        .on('click', 'a.exp_clone', experience_clone)        .on('click', 'a.exp_remove', experience_remove);        experience_cloneindex++;        $('#'+current_id).find('.edit_inputs').val("");    }    // Experience Remove    function experience_remove(){        $(this).parents(".experience_clone").remove();    }    $("a.exp_clone").on("click", experience_clone);    $("a.exp_remove").on("click", experience_remove);            // Upload preview    $(document).on('change','.hidden_upload',function()  {        var file = $(this).val();        var img_view = $('#image_upload_seeker_profile_preview').find('img');        var ext = file.substr((file.lastIndexOf('.') + 1));        if (ext == "jpg" || ext == "png" || ext == "jpeg") {            if (this.files && this.files[0]) {                var reader = new FileReader();                reader.onload = function (e) {                              img_view.attr('src', e.target.result);                };                reader.readAsDataURL(this.files[0]);            }        }        else {            alert("Invalid file only files with extension. Jpeg,. Jpg or. Png are accepted.");            return false;        }    });        //  Ended by siva    }); // end of document ready