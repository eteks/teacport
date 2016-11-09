$(document).ready(function(){
	
	$('.edit').on("click", function(){
		// var sample = $('.edit').data("edit");		
		$('.view_on_edit').attr("style", "display:block !important");
		$('.view_on_pageload').hide();		
		
		var edit_value= $(this).data("edit");
		if(edit_value=="edit"){
			var value_data= $(this).parents(".editable_table");
			$(this).text('Save');
			value_data.find('.delete').text('Cancel');
			var cancel_value= $(this).data('cancel');
			$(this).click(".delete", function(){
				$(this).find('input').reset();				
			});			
		}
			
	});	

});
