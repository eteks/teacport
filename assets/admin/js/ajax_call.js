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

    // Admin Form
    $('.admin_form').on('submit',function(e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        var this_status = $(this).find('.admin_status');
        var this_popup = $(this).parents('.popup').data('popup');
        var this_table_content = $(this).parents('#main-content').find('.table_content_section');
        var this_popup_content = $(this).find('.tab-content');
        var action = $(this).data('mode');
        $.ajax({
            type : "POST",
            url : admin_baseurl+$(this).attr('action'),
            dataType : 'json',
            data : form_data+'&'+csrf_name+'='+csfrData[csrf_name]+'&action='+action ,
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

                    setTimeout(function()
                    {
                        $('[data-popup="' + this_popup + '"]').fadeOut(350);
                        this_table_content.html(res.output);
                        this_popup_content.remove();
                    },5000);
                }
            }
        });
    });

    // Admin Delete
    $('.pop_delete_action').on('click',function(e) {
        $id = $(this).data('id');

        var this_status = $(this).find('.admin_status');
        var action = $(this).data('mode');
        $.ajax({
            type : "POST",
            url : admin_baseurl+$(this).attr('action'),
            dataType : 'json',
            data : form_data+'&'+csrf_name+'='+csfrData[csrf_name]+'&action='+action ,
            success: function(res) {
                if(res.error == 1) {
                   this_status.html(res.status);
                }
                else if(res.error == 2) {
                   this_status.html(res.status);
                   setTimeout(function()
                   {
                        location.reload();
                   },3000);
                }
            }
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
    



}); // End document



// Popup with tab menu
function handleFormWizards() {
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
                        var return_val = 1;
                    }
                    else {
                        var return_val = tabmenu_ci_validation('next');
                    }           
                    if(return_val == 0) {
                        return false;
                    }
                    else {
                        return true;
                    }

                // var total = navigation.find('li').length;
                // var current = index + 1;
                // // set wizard title
                // $('.step-title', $('#popup_wizard_section')).text('Step ' + (index + 1) + ' of ' + total);
                // // set done steps
                // jQuery('li', $('#popup_wizard_section')).removeClass("done");
                // var li_list = navigation.find('li');
                // for (var i = 0; i < index; i++) {
                //     jQuery(li_list[i]).addClass("done");
                // }

                // if (current == 1) {
                //     $('#popup_wizard_section').find('.button-previous').hide();
                // } else {
                //     $('#popup_wizard_section').find('.button-previous').show();
                // }

                // if (current >= total) {
                //     $('#popup_wizard_section').find('.button-next').hide();
                //     $('#popup_wizard_section').find('.button-submit').show();
                // } else {
                //     $('#popup_wizard_section').find('.button-next').show();
                //     $('#popup_wizard_section').find('.button-submit').hide();
                // }
                // App.scrollTo($('.page-title'));
                },
        onTabClick: function(tab, navigation, index) {
                        alert('on tab click disabled');
                        return false;
                    }

    });
}




function tabmenu_ci_validation(value) {
    var this_form = $('.tab_form');
    var this_mode = this_form.data('mode');
    var rid = this_form.find('.hidden_id').val();
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
        var form_data = this_form.find('.tabfield').serialize();
    }
    form_data.append(csrf_name,csfrData[csrf_name]);
    form_data.append('action',this_mode);
    form_data.append('index',this_index);
    form_data.append('rid',rid);

    // alert(form_data);

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
            else if(res.error==2) {
                location.reload();

                // $('.val_error').html();
                // form.html(res.output);
                // $('.db_status').fadeOut(3000);
                // setTimeout(function() { $('.db_status').remove(); }, 5000);
                // default_credentials();
            }
        }
    });
    return return_val;
}
