//Job Provider and Job seeker Dashboard Popup
	 $(window).load(function()
	{
	    $('#dashboard_popup_act').modal('show');
	}); 

//Image Thumbnail Preview
	 $(function() {
	    $("#uploadfile_act").on("change", function()
	    {
	        var files = !!this.files ? this.files : [];
	        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
	
	        if (/^image/.test( files[0].type)){ // only image file
	            var reader = new FileReader(); // instance of the FileReader
	            reader.readAsDataURL(files[0]); // read the local file
	
	            reader.onloadend = function(){ // set image data as background of div
	                $("#imagepreview_act").css("background-image", "url("+this.result+")");
	            }
	        }
	    });
	});

$(document).ready(function() {
	
	// DATE-PICKER
    $('input.datepicker').Zebra_DatePicker();
      $('.pickdate_act').Zebra_DatePicker();
 
	
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


