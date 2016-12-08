//Job Provider and Job seeker Dashboard Popup
	 $(window).load(function()
	{
		$('#dashboard_popup_act').modal({ backdrop: 'static',keyboard: false })
	    $('#dashboard_popup_act').modal('show');
	}); 

//Image Thumbnail Preview for company dashboard
	 // $(function() {
	    // $(".uploadimage_act").on("change", function()
	    // {
	    	// var thisvalue = $(this);
	        // var files = !!this.files ? this.files : [];
	        // if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
// 	
	        // if (/^image/.test( files[0].type)){ // only image file
	            // var reader = new FileReader(); // instance of the FileReader
	            // reader.readAsDataURL(files[0]); // read the local file
// 	
	            // reader.onloadend = function(){ // set image data as background of div
	                // thisvalue.next().css("background-image", "url("+this.result+")");
	            // }
	        // }
	    // });
	// });


//Home Page search Bar 
	  $(".search-close").on("click", function() {
	  	$(".set-srch-strip").hide();
	  	$("#search-icon").show();
	  });    
	  
	  $('#search-icon a').on("click", function() {
	   	$('.set-srch-strip').show();
	  	$("#search-icon").hide();
	  }); 


//Normal & Advanced Search
  $('#btn_advanced_act').click(function() {
  	$('#normalsearch_act').hide();
  	$('#advancedsearch_act').show();
  });    
  
  
   $('#btn_normal_act').click(function() {
  	$('#advancedsearch_act').hide();
  	$('#normalsearch_act').show();
  }); 


//Provider Signin & SignUp
  $(".loginbox-signup a").on("click", function() {
  	$("#provider-signin").hide();
  	$("#provider-forgotpwd").hide();
  	$("#provider-signup").show();
  });    
  
  $(".loginbox-signin a").on("click", function() {
  	$("#provider-signup").hide();
  	$("#provider-forgotpwd").hide();
   	$("#provider-signin").show();
  }); 
  
  $(".loginbox-forgot a").on("click", function(){
  	$("#provider-forgotpwd").show();
  	$("#provider-signin").hide();
  	$("#provider-signup").hide();
  });
  
  
//Seeker Signin & SignUp
  $(".loginbox-signup a").on("click", function() {
  	$("#seeker-signin").hide();
  	$("#seeker-forgotpwd").hide();
  	$("#seeker-signup").show();
  });    
  
  $(".loginbox-signin a").on("click", function() {
  	$("#seeker-signup").hide();
  	$("#seeker-forgotpwd").hide();
   	$("#seeker-signin").show();
  }); 
  
  $(".loginbox-forgot a").on("click", function(){
  	$("#seeker-forgotpwd").show();
  	$("#seeker-signup").hide();
  	$("#seeker-signin").hide();
  }); 
    

$(document).ready(function() {
	
	// DATE-PICKER
    // $('input.datepicker').Zebra_DatePicker();
      // $('.pickdate_act').Zebra_DatePicker();
 
  // Display Subscription option based on Plan Select for Company Dashboard  
	  $("select").change(function(){
	  		$(this).find("option:selected").each(function(){
	  		if($(this).attr("value") == "basic"){
	  			 $(".subplan_act").not(".basic").hide();
	  			$("#basic_plan_act").show();
	  		}
	  		else if ($(this).attr("value") == "premium"){
	  			 $(".subplan_act").not(".premium").hide();
	  			$("#premium_plan_act").show();
	  		}
	  		else if ($(this).attr("value") == "standard"){
	  			 $(".subplan_act").not(".standard").hide();
	  			$("#standard_plan_act").show();
	  		}
	  		else {
	  			$(".subplan_act").hide();
	  		}
	    });
	     	
	  }).change();
	
	
	
	// Clone fields for Candidate field
		var cloneIndex = $(".clonedInput").length;
		function clone(){
			alert('hi');
		    $(this).parents(".clonedInput").clone()
		        .appendTo(".clone_all_fields")
		        .attr("id", "edu_set_act " +  cloneIndex)
		        .find("*","input") 
		        .val("")
		              .on('click', 'button.clone', clone)
		        .on('click', 'button.remove', remove);
		    cloneIndex++;
		     
		}
		function remove(){
		    $(this).parents(".clonedInput").remove();
		}
		$("button.clone").on("click", clone);
		
		$("button.remove").on("click", remove);   
		
		
	//Clone Professional Details - OtherJobs
	var cloneValue = $(".other_jobs").length;
		function add(){
			alert('hi');
		    $(this).parents(".other_jobs").clone()
		        .appendTo(".add_otherjobs")
		        .attr("id", "otherjobs_act " +  cloneValue)
		        .find("*","input") 
		        .val("")
		              .on('click', 'button.add', add)
		        .on('click', 'button.remov', remov);
		    cloneValue++;
		}
		function remov(){
		    $(this).parents(".other_jobs").remove();
		}
		$("button.add").on("click", add);
		
		$("button.remov").on("click", remov); 	
	
		
});  //end document 




/*Added by thangam*/
	/*Popup validation for company dashboard*/
	$('#mobile,#yrs_pr,yrs_kg').keypress(function (e) {
	             //if the letter is not digit then display error and don't type anything
	             if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	                //display error message
	                // $("#error_test").html("Digits Only").show().fadeOut("slow");
	                return false;
	            }
	           });
	$('#sslc_percent,#hsc_percent,#degree_percent,#pgdegree_percent,#mphil_percent,#phd_percent,#dted_percent,#bed_percent,#bed_percent,#med_percent,#med_percent,#mped_percent,#mped_percent').keypress(function (e) {
	             //if the letter is not digit then display error and don't type anything
	             if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	                //display error message
	                // $("#error_test").html("Digits Only").show().fadeOut("slow");
	                return false;
	            }
	           });

     $('#initial,#firstname,#finitial,#fname,#university,#institution,medium_of_instruction').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                  e.preventDefault();
              }
          }
      });
    $(document).ready(function() {
        var required_popup = ["username","email","mobile","password","cfpassword"];
        var reg_email=jQuery("#email");
        var personal_profile= ["initial","firstname","finitial","fname","sslc_percent","hsc_percent","degree_percent","pgdegree_percent","mphil_percent","phd_percent","dted_percent","bed_percent","bed_percent","med_percent","med_percent","mped_percent","mped_percent","address-line1","address-line2","postal-code","mail","mobile","passwordInput","confirmPasswordInput","quli_others"];    
        var select_option = ["txtdistrict","txtmtongue","txtregl","txtccategory","expsalary","postpref","sslc_yrs","sslc_medium","hsc_yrs","hsc_medium","hsc_sub","degree_yrs","degree_medium","degree_sub","pgdegree_yrs","pgdegree_medium","pgdegree_sub","mphil_yrs","mphil_medium","mphil_sub","phd_yrs","phd_medium","phd_sub","dted_yrs","dted_medium","bed_yrs","bed_medium","med_yrs","med_medium","bped_yrs","bped_medium","mped_yrs","mped_medium","tet","board_pr","board_pr","board_clg","board_6","add_district","region"];  
        var feedback = ["subject","feedbck"];
        var reg_email=jQuery("#mail");
        $("#user_dashboard_form").on('submit',function(e){
                e.preventDefault();
                for (var i=0;i<required_popup.length;i++) {
                var input = jQuery('#'+required_popup[i]);
            if ((input.val() == "")) 
                {
                    input.addClass("error_input_field");
                    $('.error_test').css('display','block');  
                } else {
                    input.removeClass("error_input_field");
                    $('.error_test').css('display','none');  
                }
            }    
            if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(reg_email.val())) {
            reg_email.addClass("error_input_field");
            // $('.error_email').css('display','block');
                }
                else {
                    reg_email.removeClass("error_input_field");
                    // $('.error_email').css('display','none');
            }       
             var phoneNo = document.getElementById('mobile');
            if (phoneNo.value == "" || phoneNo.value == null) {
                    $('#mobile').addClass("error_input_field_mobile");
                    $('.error_mobile').css('display','block');
                }
                if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {
                    $('#mobile').addClass("error_input_field_mobile");
                    $('.error_mobile').css('display','block');
                }
                else{
                    $('#mobile').removeClass("error_input_field_mobile");
                    $('.error_mobile').css('display','none');
                }
                if ($("#password").val() != $("#cfpassword").val()) {
                  alert("Passwords do not match.");
              }
            //if any inputs on the page have the class 'error_input_field' the form will not submit
            if (jQuery(":input").hasClass("error_input_field")  ) {
                $('.error_test').css('display','block');
                $('.error_mobile').css('display','none');
                return false;
            } else {
            if(jQuery(":input").hasClass("error_input_field_mobile"))  {
                $('.error_test').css('display','none');
                $('.error_mobile').css('display','block');
                return false;
            }
            else {
                errornotice.hide();
                $('.error_test').css('display','none');
                $('.error_mobile').css('display','none');

                $(this).unbind();
                $(this).submit();
            }
        }
        });
        /*End of Popup validation for company dashboard*/
        /*Seeker Edit Profile Validation*/
        $("#candidate-form").on('submit',function(e){
                e.preventDefault();
                for (var i=0;i<personal_profile.length;i++) {
                var input = jQuery('#'+personal_profile[i]);
            if ((input.val() == "")) 
                {
                    input.addClass("error_input_field");
                    $('.error_test').css('display','block');  
                } else {
                    input.removeClass("error_input_field");
                    $('.error_test').css('display','none');  
                }
            }    
            for (var i=0;i<select_option.length;i++) {
                var input = jQuery('#'+select_option[i]);
            if ((input.val() == "")) 
                {
                    input.addClass("error_input_field");
                    $('.error_test').css('display','block');  
                } else {
                    input.removeClass("error_input_field");
                    $('.error_test').css('display','none');  
                }
            } 
            if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(reg_email.val())) {
            reg_email.addClass("error_input_field");
            // $('.error_email').css('display','block');
                }
                else {
                    reg_email.removeClass("error_input_field");
                    // $('.error_email').css('display','none');
            }       
             var phoneNo = document.getElementById('mobile');
            if (phoneNo.value == "" || phoneNo.value == null) {
                    $('#mobile').addClass("error_input_field_mobile");
                    $('.error_mobile').css('display','block');
                }
                if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {
                    $('#mobile').addClass("error_input_field_mobile");
                    $('.error_mobile').css('display','block');
                }
                else{
                    $('#mobile').removeClass("error_input_field_mobile");
                    $('.error_mobile').css('display','none');
                }
                if ($("#password").val() != $("#cfpassword").val()) {
                  alert("Passwords do not match.");
              }
            //if any inputs on the page have the class 'error_input_field' the form will not submit
            if (jQuery(":input").hasClass("error_input_field")  ) {
                $('.error_test').css('display','block');
                $('.error_mobile').css('display','none');
                return false;
            } else {
            if(jQuery(":input").hasClass("error_input_field_mobile"))  {
                $('.error_test').css('display','none');
                $('.error_mobile').css('display','block');
                return false;
            }
            else {
                errornotice.hide();
                $('.error_test').css('display','none');
                $('.error_mobile').css('display','none');

                $(this).unbind();
                $(this).submit();
            }
        }
        });
        /*End of Seeker Edit Profile Validation*/
        /*seeker feedback*/
        $("#seeker_feedback_form").on('submit',function(e){
                e.preventDefault();
                for (var i=0;i<feedback.length;i++) {
                var input = jQuery('#'+feedback[i]);
            if ((input.val() == "")) 
                {
                    input.addClass("error_input_field");
                    $('.error_test').css('display','block');  
                } else {
                    input.removeClass("error_input_field");
                    $('.error_test').css('display','none');  
                }
            }     
            if($("#feedbck").val().trim().length < 1)
			{
			    alert("Please Enter Your feedback...");
			    return; 
			}     
            //if any inputs on the page have the class 'error_input_field' the form will not submit
            if (jQuery(":input").hasClass("error_input_field")  ) {
                $('.error_test').css('display','block');
                return false;
            }
            else {
                errornotice.hide();
                $('.error_test').css('display','none');
                $(this).unbind();
                $(this).submit();
            }
        });
        /*End*/
        });
/*Ended by thangam*/


	


