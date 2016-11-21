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

    // Edit and Full view option
    $(document).on('click','.popup_fields',function(e) {
    	// handleFormWizards();
    	$('.date-picker').datepicker();
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
        if (!jQuery().bootstrapWizard) {
            return;
        }
        $('.date-picker').datepicker();
        $('#popup_wizard_section').bootstrapWizard({
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            onTabClick: function (tab, navigation, index) {
                 error_popup('on tab click disabled');
                return false;
            },
            onNext: function (tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#popup_wizard_section')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#popup_wizard_section')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#popup_wizard_section').find('.button-previous').hide();
                } else {
                    $('#popup_wizard_section').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#popup_wizard_section').find('.button-next').hide();
                    $('#popup_wizard_section').find('.button-submit').show();
                } else {
                    $('#popup_wizard_section').find('.button-next').show();
                    $('#popup_wizard_section').find('.button-submit').hide();
                }
                App.scrollTo($('.page-title'));
            },
            onPrevious: function (tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#popup_wizard_section')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#popup_wizard_section')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                };

                if (current == 1) {
                    $('#popup_wizard_section').find('.button-previous').hide();
                } else {
                    $('#popup_wizard_section').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#popup_wizard_section').find('.button-next').hide();
                    $('#popup_wizard_section').find('.button-submit').show();
                } else {
                    $('#popup_wizard_section').find('.button-next').show();
                    $('#popup_wizard_section').find('.button-submit').hide();
                }            

                App.scrollTo($('.page-title'));
            },
            onTabShow: function (tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                var $percent = (current / total) * 100;
                $('#popup_wizard_section').find('.bar').css({
                    width: $percent + '%'
                });
            }
        });
        $('#popup_wizard_section').find('.button-previous').hide();
        $('#popup_wizard_section .button-submit').click(function () {
             error_popup('Finished!');
        }).hide();
    };
    
    $(".admin_module_form").submit(function(e){
    e.preventDefault();
    });

     
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
