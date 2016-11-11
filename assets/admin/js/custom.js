$(document).ready(function(){
	
	$('.edit').on("click", function(){			
		$('.view_on_edit').attr("style", "display:block !important");		
		$('.view_on_pageload').hide();				
		var edit_value= $(this).data("mode");
		if(edit_value=="edit"){
			var value_data= $(this).parents(".editable_table");
			$(this).text('Save');
			value_data.find('.delete').text('Cancel');				
		}
			
	});		
});
