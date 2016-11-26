$(document).ready(function(){
    $('.admin_login_form').on('submit',function(e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        var this_status = $(this).find('.admin_status');
        $.ajax({
            type : "POST",
            url : admin_baseurl+$(this).attr('action'),
            data : form_data+'&'+csrf_name+'='+csfrData[csrf_name] ,
            success: function(res) {
                if(res != 'login_success') {
                   this_status.html(res);
                $('.admin_status').html(res.status);
                $('.admin_status').slideDown(350);
                $('.admin_status').fadeOut(3000);
                }
                else {
                   window.location.href = admin_baseurl+"dashboard";
                }
            }
        });
    });

    // // Admin Form
    // $('.admin_form').on('submit',function(e) {
    //     e.preventDefault();
    //     var form_data = $(this).serialize();
    //     var this_status = $(this).find('.admin_status');
    //     var action = $(this).data('mode');
    //     $.ajax({
    //         type : "POST",
    //         url : admin_baseurl+$(this).attr('action'),
    //         dataType : 'json',
    //         data : form_data+'&'+csrf_name+'='+csfrData[csrf_name]+'&action='+action ,
    //         success: function(res) {
    //             if(res.error == 1) {
    //                this_status.html(res.status);
    //             }
    //             else if(res.error == 2) {
    //                this_status.html(res.status);
    //                setTimeout(function()
    //                {
    //                     location.reload();
    //                },3000);
    //             }
    //         }
    //     });
    // });

    /* Popup module ajax start */

    // Admin Form
    $('.admin_form').on('submit',function(e) {
        e.preventDefault();
        var form_data = new FormData(this);
        var this_status = $(this).find('.admin_status');
        var this_popup = $(this).parents('.popup').data('popup');
        var this_table_content = $(this).parents('#main-content').find('.table_content_section');
        var this_popup_content = $(this).find('.tab-content');
        var action = $(this).data('mode');
        form_data.append(csrf_name,csfrData[csrf_name]);
        form_data.append('action',action);
        $.ajax({
            type : "POST",
            url : admin_baseurl+$(this).attr('action'),
            dataType : 'json',
            data : form_data,
                 contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,
            success: function(res) {
                if(res.error == 1) {
                    this_status.html(res.status);
                    this_status.fadeIn(1000);
                    this_status.fadeOut(3000);
                }
                else if(res.error == 2) {
                    this_status.html(res.status);
                    this_status.fadeIn(1000);
                    this_status.fadeOut(3000);
                    $('.admin_table').dataTable().fnDestroy();  
                    setTimeout(function()
                    {
                        $('[data-popup="' + this_popup + '"]').fadeOut(350);
                        this_table_content.html(res.output);
                        datatable_initialization();
                        this_popup_content.remove();
                    },5000);
                }
            }
        });
    });

    // Admin Delete
    $(document).on('click','.pop_delete_action',function() {
        var id = $(this).data('id');
        var this_status = $(this).parents('form').find('.admin_status');
        var action_path = $(this).parents('form').attr('action');
        var this_table_content = $(this).parents('#main-content').find('.table_content_section');
        var form_data = {};
        form_data['rid'] = id;
        form_data[csrf_name] = csfrData[csrf_name];
        form_data['action'] = "delete";
        doConfirm("Are you sure want to delete?", function yes() {
            $.ajax({
                type : "POST",
                url : admin_baseurl+action_path,
                dataType : 'json',
                data : form_data,
                success: function(res) {
                    if(res.error == 2) {
                        $('.admin_table').dataTable().fnDestroy();
                        this_table_content.html(res.output);
                        this_status.html(res.status);
                        this_status.fadeIn(1000);
                        this_status.fadeOut(2000);
                        setTimeout(function() { datatable_initialization(); }, 3000); 

                    }
                }
            });
            }, function no() {
                // do nothing
            });
    });

    // Edit and Full view option
    $(document).on('click','.popup_fields',function(e) {
    	// handleFormWizards();
        var action_data ={};
        var this_ajax_section = $(this).parents('#main-content').find('.pop_details_section');
        var targeted_popup_class = $(this).attr('data-popup-open');
        action_data['action'] = $(this).data('mode');
        action_data['value'] = $(this).data('id');
        action_data[csrf_name] = csfrData[csrf_name];        
        $.ajax({
            type : "POST",
            url : admin_baseurl+$(this).data('href'),
            data : action_data,
            success: function(res) {
                if(res) {
                    this_ajax_section.html(res);
                    handleFormWizards();
                    $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
                    handleChoosenSelect();
                    // e.preventDefault();
                }
            }
        });
    }); 

    // Tab menu submission
    $(document).on('submit','.tab_form',function(e) {
        e.preventDefault();
        var formdata = new FormData(this);
        tabmenu_ci_validation('end',formdata);
    });

    /* Popup module ajax end */ 


}); // End document

// Popup with tab menu
function handleFormWizards() {
	$('.date-picker').datepicker();
    $('#rootwizard').bootstrapWizard({
        onTabShow: function(tab, navigation, index) {
                        var $total = navigation.find('li').length;
                        var $current = index+1;
                        var $percent = ($current/$total) * 100;
                        $('#rootwizard').find('.bar').css({width:$percent+'%'});
                        // If it's the last tab then hide the last button and show the finish instead
                        if($current >= $total) {
                            $('#rootwizard').find('.pager .next').hide();
                            if($('#rootwizard').find('#popup_mode').val() != 'view')  {
                                $('#rootwizard').find('.pager .finish').show();
                                $('#rootwizard').find('.pager .finish').removeClass('disabled');
                            }
                        } 
                        else {
                            $('#rootwizard').find('.pager .next').show();
                            $('#rootwizard').find('.pager .finish').hide();
                        }
                        $('#rootwizard').parents('form').data('index',$current);
                    },
        onNext: function (tab, navigation, index) {
                    var this_form = $('#rootwizard').parents('form');  
                    if($('#rootwizard').find('#popup_mode').val() == 'view')  {
                    	jQuery('li', $('#popup_wizard_section')).removeClass("done");
		                var li_list = navigation.find('li');
		                for (var i = 0; i < index; i++) {
		                    jQuery(li_list[i]).addClass("done");
		                } 
                        var return_val = 1;
                    }
                    else {
                        var return_val = tabmenu_ci_validation('next','popup');
                         jQuery('li', $('#popup_wizard_section')).removeClass("done");
		                var li_list = navigation.find('li');
		                for (var i = 0; i < index; i++) {
		                    jQuery(li_list[i]).addClass("done");
		                }                        
                    }  

                    if(return_val == 0) {
                        return false;
                    }
                    else {
                        return true;
                    }
                },
            onPrevious: function (tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#rootwizard')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#rootwizard')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }
            },
        onTabClick: function(tab, navigation, index) {
                        error_popup('on tab click disabled');
                        return false;
                    }

    });
}

function tabmenu_ci_validation(value,data) {
    var this_form = $('.tab_form');
    var this_mode = this_form.data('mode');
    var rid = this_form.find('.hidden_id').val();
    var this_popup = this_form.parents('.popup').data('popup');
    var this_table_content = this_form.parents('#main-content').find('.table_content_section');
    var this_popup_content = this_form.find('.tab-content');
    if(value == 'next') {
        var this_index = this_form.data('index');
        var form_data = new FormData();
        this_form.find('.tabfield'+this_index).each(function() {
            if($(this).attr('type') == 'file') {
                form_data.append($(this).attr('name'),$(this)[0].files[0]); 
            }
            else {
                form_data.append($(this).attr('name'),$(this).val());
            }
        });
    }
    else {
        var this_index = "end";  
        var form_data = data;
    }
    form_data.append(csrf_name,csfrData[csrf_name]);
    form_data.append('action',this_mode);
    form_data.append('index',this_index);
    form_data.append('rid',rid);

    var return_val = "" ;
    $.ajax({
        async: false,
        type : "POST",
        url : admin_baseurl+this_form.attr('action'),
        dataType : 'json',
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false, 
        data : form_data,
        success: function(res) {
            if(res.error==1 && res.status!='valid') {
                $('.val_error').html(res.status);
                $('.val_error').slideDown(350);
                $('.val_error').fadeOut(3000);
                return_val = 0;
            }
            else if(res.error==1 && res.status=='valid') {
                return_val = 1;
            }
            else if(res.error == 2) {
                $('.val_error').html(res.status);
                $('.val_error').slideDown(350);
                $('.val_error').fadeOut(3000);
                $('.admin_table').dataTable().fnDestroy(); 
                setTimeout(function()
                    {
                        $('[data-popup="' + this_popup + '"]').fadeOut(350);
                        this_table_content.html(res.output);
                        datatable_initialization();
                        this_popup_content.remove();
                    },5000);
            }
        }
    });
    return return_val;
}














function error_popup(message){
	$('.error_popup_msg .success-alert span').text(message);
	$('.popup_fade').show();
	$('.error_popup_msg').show();
	document.body.style.overflow = 'hidden';
}
    
// error popup message center alignment
var height=$('.error_popup_msg').height();
var width=$('.error_popup_msg').width();
$('.error_popup_msg').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
    
// close error popup when click ok button or popupfade
	$(document).on('click','.alert_btn_popup,.cancel_btn',function(){
	  	$('.error_popup_msg').hide();
	  	$('.popup_fade').hide();
	  	document.body.style.overflow = 'auto';
	});
    $(".admin_module_form").submit(function(e){
    e.preventDefault();
  });
  
 //Login page
   $('#forget-password').on("click", function(){
   	   $("#admin_login_form").hide();
   	   $("#forgotform").show();
   });
   
   $('#cancel').on("click", function(){
   	   $("#forgotform").hide();
   	   $("#admin_login_form").show();
   });