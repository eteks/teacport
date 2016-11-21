//Job Provider and Job seeker Dashboard Popup
	 $(window).load(function()
	{
		$('#dashboard_popup_act').modal({ backdrop: 'static',keyboard: false })
	    $('#dashboard_popup_act').modal('show');
	}); 

//Image Thumbnail Preview for company dashboard
	 $(function() {
	    $(".uploadimage_act").on("change", function()
	    {
	    	var thisvalue = $(this);
	        var files = !!this.files ? this.files : [];
	        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
	
	        if (/^image/.test( files[0].type)){ // only image file
	            var reader = new FileReader(); // instance of the FileReader
	            reader.readAsDataURL(files[0]); // read the local file
	
	            reader.onloadend = function(){ // set image data as background of div
	                thisvalue.next().css("background-image", "url("+this.result+")");
	            }
	        }
	    });
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
 
	
});  //end document 




