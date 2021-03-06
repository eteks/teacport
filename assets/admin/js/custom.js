/*
    * Add edit delete rows dynamically using jquery and php
    */

// $( document ).ajaxError(function() {
//     window.location.href = admin_baseurl;
// });

/* Added by siva */
// Set button class names 
var savebutton = "ajaxSave";
var deletebutton = "ajaxDelete";
var editbutton = "ajaxEdit";
var updatebutton = "ajaxUpdate";
var cancelbutton = "cancel";
var removebutton = "new_remove";

// Init variables
var inputs = 'input,select,textarea';
var trcopy;
// var editing=0;

// Init default credentials
function default_credentials() {
    editing = 0;
    tdediting = 0;
    editingtrid = 0;
    editingtdcol = 0;
    ready_save = 0;
}
function customalert(msg){
    var alertBox = $("#alert-dialog-box");
    var overlay = $("#dialog-overlay");
    alertBox.find(".message").text(msg);
    alertBox.find(".ok_btn").unbind().click(function() {
        alertBox.hide();
        overlay.hide();
    });

    var winH = $(window).height();
    var winW = $(window).width();
    var popupH = alertBox.height();
    var popupW = alertBox.width();
    var alertBox_top = ((winH / 2) - (popupH / 2)) + "px";
    var alertBox_left = ((winW / 2) - (popupW / 2)) + "px"; 
    alertBox.css('top',alertBox_top);
    alertBox.css('left',alertBox_left);
    overlay.fadeIn(350);
    alertBox.fadeIn(350);
}
function confirm_alert(msg, yesFn, noFn) {
    var confirmBox = $("#dialog-box");
    var overlay = $("#dialog-overlay");
    confirmBox.find(".message").text(msg);
    confirmBox.find(".yes,.no").unbind().click(function() {
        confirmBox.hide();
        overlay.hide();
    });
    confirmBox.find(".yes").click(yesFn);
    confirmBox.find(".no").click(noFn);

    var winH = $(window).height();
    var winW = $(window).width();
    var popupH = confirmBox.height();
    var popupW = confirmBox.width();
    var confirmBox_top = ((winH / 2) - (popupH / 2)) + "px";
    var confirmBox_left = ((winW / 2) - (popupW / 2)) + "px"; 
    confirmBox.css('top',confirmBox_top);
    confirmBox.css('left',confirmBox_left);
    overlay.fadeIn(350);
    confirmBox.fadeIn(350);
}

// Init new row
function add_new_record(column_length) {
    blankrow = '<tr valign="top" class="inputform">';
    for(i=0;i<columns.length;i++) {
        // Create input element as per the definition
        input = createInput(i,'');
        blankrow += '<td class="ajaxReq">'+input+'</td>';
    }

    if(typeof is_created != "undefined" && is_created=="no") {
        if (column_length == 2) {
            blankrow += '<td><a href="javascript:;" class="'+savebutton+'">Save</a></td><td><a href="javascript:;" class="'+removebutton+'">Remove</a></td></tr>';
        }
        else {
            blankrow += '<td><a href="javascript:;" class="'+savebutton+' edit_del_act">Save</a><a href="javascript:;" class="'+removebutton+' edit_del_act">Remove</a></td></tr>';
        }
    }
    else {
        if (column_length == 2) {
            blankrow += '<td></td><td><a href="javascript:;" class="'+savebutton+'">Save</a></td><td><a href="javascript:;" class="'+removebutton+'">Remove</a></td></tr>';
        }
        else {
            blankrow += '<td></td><td><a href="javascript:;" class="'+savebutton+' edit_del_act">Save</a><a href="javascript:;" class="'+removebutton+' edit_del_act">Remove</a></td></tr>';
        }
    } 
    // prepand blank row - Add new row at top of the table.
    $("."+table).prepend(blankrow);
}

// Init scroller for multiselect
function scroller_multiselect() {
    $('.multi_choice').find('ul').addClass('scroller');
    $('.multi_choice').find('ul').slimScroll({
        height: 'auto'
    });
}

var handleChoosenSelect = function () {
        if (!jQuery().chosen) {
            return;
        }
        $(".chosen").chosen();
        $(".chosen-with-diselect").chosen({
            allow_single_deselect: true
        });
   },
   

// Create Input
createInput = function(i,str){
    // alert(str);
    str = typeof str !== 'undefined' ? str : null;
    //alert(str);
    if(inputType[i] == "text"){
        input = '<input type="'+inputType[i]+'" name="'+columns[i]+'" maxlength="'+maxlength[i]+'" class="'+class_selector[i]+'" placeholder="'+placeholder[i]+'" value="'+str+'" >';
    }
    else if(inputType[i] == "textarea"){
        input = '<textarea name='+columns[i]+' class="'+class_selector[i]+'" maxlength="'+maxlength[i]+'" placeholder="'+placeholder[i]+'">'+str+'</textarea>';
    }
    else if(inputType[i] == "label"){
        input = '<label class='+columns[i]+'>'+str+'</label>';
    }
    else if(inputType[i] == "select"){
        input = '<select class="'+class_selector[i]+'" name='+columns[i]+'>';
        var select_option = eval(columns[i]+'_option');
        var select_value = eval(columns[i]+'_value');

        for(i=0;i<select_option.length;i++){
            //console.log(select_option[i]);
            selected = "";
            if(str == select_value[i])
            {
                selected = "selected";
            }
            input += '<option value="'+select_value[i]+'" '+selected+'>'+select_option[i]+'</option>';
        }
        input += '</select>';
        //console.log(str);
    }
    else if(inputType[i] == "on_off"){
        input = '<ul class="on_off_button on_off_button_j">';
        if(str == 1) {
            input += '<li data-value="1" class="on"><a>Yes</a></li> <li data-value="0"><a>No</a></li>';
        }
        else {
            input += '<li data-value="1"><a>Yes</a></li> <li data-value="0" class="on"><a>No</a></li>'; 
        }
        input += '</ul>';
        input += '<input type="hidden" value="'+str+'" class="verification" name="'+columns[i]+'" />';
    }
    else if(inputType[i] == "multiselect"){
        input = '<span class="multi_choice"> <select data-placeholder="'+placeholder[i]+'" name="'+columns[i]+'" class="chosen span6" multiple="multiple" >';
        var select_option = eval(columns[i]+'_option');
        var select_value = eval(columns[i]+'_value');
        var selected_value = new Array();
        selected_value = str.split(',');

        for(i=0;i<select_option.length;i++){
            //console.log(select_option[i]);
            selected = "";
            if($.inArray(select_value[i],selected_value) !== -1 )
            {
                selected = "selected";
            }
            input += '<option value="'+select_value[i]+'" '+selected+'>'+select_option[i]+'</option>';
        }
        input += '</select> </span>';
        //console.log(str);        
    }
    return input;
};

ajax = function (params,action,form_id){
    var form = $('#'+form_id);
    var this_table = $('#'+form_id).find('table');
    params['action'] = action;
    var this_loader =  form.parents('#main-content').find('.loader_holder'); //for loader  
    params[csrf_name] = csfrData[csrf_name];
    $.ajax({
        type : "POST",
        url : admin_baseurl+form.attr('action'),
        dataType : 'json',
        data : params ,
        beforeSend: function(){
       		this_loader.removeClass('hide_loader');
       		$(".loader_overlay").css({"display":"block"});
       		
   		},
        success: function(res) {
            if(res.error==1) {
                $('.val_error').html("<i class='icon-remove-sign'></i>  "+res.status);
                $('.val_error').fadeIn(500);
                $('.val_error').fadeOut(3000);
            }
            else if(res.error==2) {
                $('.val_error').html();
                $('.admin_table').dataTable().fnDestroy(); //Commented for page reload
                form.html(res.output);
                $('.db_status').fadeOut(3000);
                $('.edit_add_overlay').addClass('dn');
                $('table th').removeClass('sort-disabled');
                setTimeout(function() { datatable_initialization(); }, 3000);  //Commented for page reload
                // setTimeout(function() { $('.db_status').remove();location.reload(); }, 3000);
                default_credentials();  
            }
        },
        complete : function(){
			setTimeout(function() { this_loader.addClass('hide_loader'); $(".loader_overlay").css({"display":"none"});}, 3000);  //Commented for page reload
		},
    });
};

$(document).ready(function(){
    
    default_credentials();

    $('#dialog-overlay').on('click',function() {
        $('#dialog-box').fadeOut(350);
        $('#dialog-overlay').fadeOut(350);
    });
    
   
    /*Added by thangam*/
     $('.sub_scroll_section').slimScroll({
        height: 'auto'
    });

     $('.extended').slimScroll({
         height: 'auto'
    });
    $('.dropdown_toggle_act').on('click',function() {
        $('.extended').show();
        $('.caret-up').show();
        $('.top_layer').show();
    });
    $('#container').on('click',function() {
        $('.extended').hide();
        $('.caret-up').hide();
        $('.top_layer').hide();
    });
    $('.top_layer').on('click',function() {
        $('.caret-up').hide();
    });
    $('.job_full_view').on('click',function() {
        $('.caret-up').hide();
        $('.extended').hide();
        $('.caret-up').hide();
        $('.top_layer').hide();
    });
    var window_width = $(".navbar-inner").width();    
    var window_height = $(".navbar-inner").height();
    $('.top_layer').width(window_width);
    $('.top_layer').height(window_height);
    $('.top_layer, .message_close').on('click',function() {
            $('.extended').hide();
            $('.top_layer').hide();
        });
    $("#subs_max_val").focusout(function(){
    
    
    if(parseFloat($("#subs_min_val").val()) > parseFloat($("#subs_max_val").val()))
    {
        $(".subs_min_max_error").css("display","block").css("color","red");
}
    else {
        $(".subs_min_max_error").css("display","none");      
    }
    
});
/*Ended by thangam*/

/* slim scroll */

var window_height= $(window).height();
var header_height= $('#header').height();
var footer_height= $('#footer').height(); 
var content_height = parseInt(window_height - (header_height + footer_height));
// alert(content_height);  
	$('.sub_sidebar_section').css('max-height', parseInt(content_height-10));
	$('.sub_pre_section').css('max-height', parseInt(content_height-10));
	$('.sub_sidebar_section').slimScroll({
	    height: 'auto'
	});
	$('.sub_pre_section').slimScroll({
	    height: 'auto'
	});
	$('.sub_section_scroll').slimScroll({
	    height: 'auto'
	});
	// $('.sub_pre_section').slimScroll({
	//     height: 'auto'
	    
	// });
	// $('.sub_sidebar_section').slimScroll({
	//     height: 'auto'
	// });
    $('.sub_site_visites_cont').slimScroll({
        height: 'auto',
       	width: 'auto'
    });

    if($('.has-sub').length > 0) {
        $('.has-sub').each(function(){
            if($(this).hasClass('open')) {
                $(this).find('div').slideDown();
            }
        });
    }

    // Add - New record
    $(document).on('click','.add_new',function() {
        // disable_datatable(0);
        if($(this).parents("#main-content").find('table').find('.edit_section').length > 0 && $(this).parents("#main-content").find('table').find('.delete_section').length > 0) {
           var column_length = 2;    
        }
        else {
            var column_length = 1;    
        }
        var this_overlay = $(this).parents("#main-content").find('.edit_add_overlay');
        var this_table = $(this).parents("#main-content").find('table').find('th');
        this_overlay.removeClass('dn');
        this_table.addClass('sort-disabled');
        if(editing==0 && ready_save==0) {        	      	 
            add_new_record(column_length);            
            handleChoosenSelect();
            scroller_multiselect();
            ready_save=1;
        }
    });

    // Save - New record
    $(document).on("click","."+savebutton,function(){
        var validation = 1;
        var form_id = $(this).parents('form').attr('id');

        var ajax_data = {};
        $("."+table).find(inputs).each(function() {
            // check if input element is blank ??
            // if($.trim( this.value ) == ""){
            //     $(this).addClass("error");
            //     validation = 0;
            // }else{
            //     $(this).removeClass("error");
            //     $(this).addClass("success");
            // }
            var value = $(this).val();
            if($.isArray(value)) {
                value = value.toString();
            }
            ajax_data[$(this).attr('name')] = value;
        });

        // var array = $inputs.map(function(){
        //     //console.log(this.value);
        //     //console.log(this);
        //     return this.value;
        // }).get();
        if(!$('input, select').hasClass('error')) {
            // var serialized = $inputs.serialize();
            if(validation == 1){
                ajax(ajax_data,"save",form_id);
            }
            else {
                alert("Unable to process");
            }
        }
    });

    // Remove - New record
    $(document).on('click','.new_remove',function() {
        // disable_datatable(1);
        var this_overlay = $(this).parents("#main-content").find('.edit_add_overlay');
        var this_table = $(this).parents("table").find('th');
        this_overlay.addClass('dn');
        this_table.removeClass('sort-disabled');
        if(editing==0 && ready_save==1) {
            $(this).parents('tr').fadeOut(600);
            ready_save=0;
        }
    });

    // Delete - Old record
    $(document).on("click","."+deletebutton,function(){
        var id = $(this).data("id");
        var form_id = $(this).parents('form').attr('id');
        var ajax_data = {};
        ajax_data['rid'] = id;
        if(id){
            confirm_alert("Are you sure want to delete?", function yes() {
                ajax(ajax_data,"delete",form_id);
            }, function no() {
                // do nothing
            });
        }
        else {
            alert("Unable to process");
        }
    });

    // Delete - Old record
    // $(document).on("click",".uidelete",function(){
    //     doConfirm("Are you sure want to delete?", function yes() {
            
    //     }, function no() {
    //             // do nothing
    //         });
    // });


    // Edit - Old record
    $(document).on("click","."+editbutton,function(){
        var update_id = $(this).data("id");
        var this_row = $(this).parents("tr").attr('id');
        var this_overlay = $(this).parents("#main-content").find('.edit_add_overlay');
        var this_table = $(this).parents("table").find('th');
        if($(this).parents("table").find('.edit_section').length > 0 && $(this).parents("table").find('.delete_section').length > 0) {
           var column_length = 2;    
        }
        else {
            var column_length = 1;    
        }
        this_overlay.removeClass('dn');
        this_table.addClass('sort-disabled');
        // disable_datatable(0);
        if(update_id && editing == 0 && tdediting == 0 && ready_save==0) {
            // hide editing row, for the time being
            // $("."+table+" tbody tr:last-child").fadeOut("fast");
                        
            var html;
            for(i=0;i<columns.length;i++){
                // fetch value inside the TD and place as VALUE in input field
                if(inputType[i]=='text' || inputType[i]=='textarea' || inputType[i]=='label') {
                    var val = $(document).find("."+table+" #"+this_row+" ."+columns[i]+"").html();
                }
                else {
                   //It will fetch the value for select field from hidden input field passed in html 
                   var val = $(document).find("."+table+" #"+this_row+" ."+columns[i]+" input").val(); 
                }
                input = createInput(i,$.trim(val));
                html +='<td>'+input+'</td>';
            }

            if(typeof is_created != "undefined" && is_created=="no") {
                if (column_length == 2) {
                    html += '<td><a href="javascript:;" data-id="'+update_id+'" class="'+updatebutton+'">Update</a></td><td> <a href="javascript:;" class="'+cancelbutton+'">Cancel</a></td>';   
                }
                else {
                    html += '<td><a href="javascript:;" data-id="'+update_id+'" class="'+updatebutton+' edit_del_act">Update</a> <a href="javascript:;" class="'+cancelbutton+' edit_del_act">Cancel</a></td>';   
                }
            }
            else {
                if (column_length == 2) {
                    html += '<td></td><td><a href="javascript:;" data-id="'+update_id+'" class="'+updatebutton+'">Update</a></td><td> <a href="javascript:;" class="'+cancelbutton+'">Cancel</a></td>';
                }
                else {
                    html += '<td></td><td><a href="javascript:;" data-id="'+update_id+'" class="'+updatebutton+' edit_del_act">Update</a> <a href="javascript:;" class="'+cancelbutton+' edit_del_act">Cancel</a></td>';
                }
            }
            
            // Before replacing the TR contents, make a copy so when user clicks on 
            trcopy = $("."+table+" #"+this_row+" ").html();
            $("."+table+" #"+this_row+" ").html(html);  
             // $("."+table+" tr[id="+id+"]").fadeOut(500, function() {
             // $(this).html(html).fadeIn(500);
             // }); 
            handleChoosenSelect();
            scroller_multiselect();
            // set editing flag
            editing = 1;
            ready_save= 1;
        }

    });   


    // Cancel - Old record
    $(document).on("click","."+cancelbutton,function(){
        // disable_datatable(1);
        var this_overlay = $(this).parents("#main-content").find('.edit_add_overlay');
        var this_table = $(this).parents("table").find('th');
        this_overlay.addClass('dn');
        this_table.removeClass('sort-disabled');
        var this_row = $(this).parents("tr").attr('id');         
        // $("."+table+" tr:last-child").fadeIn('fast');   
        $("."+table+" #"+this_row+"").fadeOut(500, function() {
              $(this).html(trcopy).fadeIn(500);
             });  
        editing = 0;
        ready_save = 0;
    });
    
    // Update - Old record
    $(document).on("click","."+updatebutton,function(){
        id = $(this).attr("id");
        var update_id = $(this).data("id");
        var form_id = $(this).parents('form').attr('id');
        var ajax_data = {};
        $("."+table).find(inputs).each(function() {
            // check if input element is blank ??
            // if($.trim( this.value ) == ""){
            //     $(this).addClass("error");
            //     validation = 0;
            // }else{
            //     $(this).removeClass("error");
            //     $(this).addClass("success");
            // }
            var value = $(this).val();
            if($.isArray(value)) {
                value = value.toString();
            }
            ajax_data[$(this).attr('name')] = value;
        });
        ajax_data['rid'] = update_id;
        ajax(ajax_data,"update",form_id);
        return;
        // clear editing flag
        editing = 0;
        ready_save = 0;
    });

    /* Ended by siva */

    $(document).on("change",".filter_vacancy",function(){
        selected_value = $(this).find('option:selected').val();
        $.ajax({
            type : "POST",
            url : admin_baseurl+'dashboard_filter_vacancy',
            dataType : 'json',
            data : 'filter_option='+ selected_value+'&'+csrf_name+'='+ csfrData[csrf_name],
            success: function(res) {
                json_count = Object.keys(res).length;
                filter_tag = '';
                if(res!=0){   
                    $.each(res, function(i){
                        if(json_count > 1 && typeof res[i].name_data != 'undefined')
                            filter_tag += "<tr><td>"+res[i].name_data+"</td><td>"+res[i].count_data+"</td>";
                        $('#filter_vacancy_table').find('.vacancy_header').text(res[i].label_name);
                    });  
                }   
                $('#filter_vacancy_table').dataTable().fnDestroy();
                $('#filter_vacancy_table').find('tbody').html(filter_tag);
                setTimeout(function() { datatable_initialization(id="#filter_vacancy_table"); }, 100);
            }
        });
    });
    $(document).on("change",".filter_provider",function(){
        selected_value = $(this).find('option:selected').val();
        $.ajax({
            type : "POST",
            url : admin_baseurl+'dashboard_filter_provider',
            dataType : 'json',
            data : 'filter_option='+ selected_value+'&'+csrf_name+'='+ csfrData[csrf_name],
            success: function(res) {
                json_count = Object.keys(res).length;
                filter_tag = '';
                if(res!=0){  
                    $.each(res, function(i){
                        if(json_count > 1 && typeof res[i].name_data != 'undefined')
                            filter_tag += "<tr><td>"+res[i].name_data+"</td><td>"+res[i].count_data+"</td>";
                        $('#filter_provider_table').find('.vacancy_header').text(res[i].label_name);
                    });          
                }   
                $('#filter_provider_table').dataTable().fnDestroy();
                $('#filter_provider_table').find('tbody').html(filter_tag);
                setTimeout(function() { datatable_initialization(id="#filter_provider_table"); }, 100);
            }
        });
    });  
    
    //----- CLOSE
    $('[data-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
 
        e.preventDefault();
    });
    $('.popup_close_act').on('click', function(e)  {
        window.location.reload()
    });

    // popup for subscription and ads
    $('.add_option,.edit_option').on('click', function(e)  {
        var targeted_popup_class = $(this).data('open');
        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
        //newly added by kalai
        $('.admin_form').attr("data-mode",$(this).data('action'));
        if($(this).data('action') == "save"){
            $('.admin_form').find(':input').val('');
        }
        e.preventDefault();
    });
    
    $('.close_trig').on('click', function(e)  {
        var targeted_popup_class = $(this).data('open');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
        e.preventDefault();
    });

    // Upload click instead of using file input
    $(document).on('click','.upload_option', function()  {
        $(this).next().click();
    });

    // Upload preview
    $(document).on('change','.hidden_upload',function()  {
        var file = $(this).val();
        var img_view = $(this).next();
        var ext = file.substr((file.lastIndexOf('.') + 1));
        if (ext == "jpg" || ext == "png" || ext == "JPG" || ext == "jpeg") {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {           
                   img_view.attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        }
        else {
            alert("Invalid file only files with extension. Jpeg,. Jpg or. Png are accepted.");
            return false;
        }
    });

    // On off button
    $(document).on("click",".on_off_button_j li",function(){
        $(this).parents('.on_off_button').find('li').removeClass("on");
        $(this).addClass("on");
        $(this).parent().siblings('.verification').val($(this).data('value'));
    });

    // Marital status
    $(document).on("click",".radio_status",function(){
        $(this).siblings('.hidden_status').val($(this).val());
    });

    // // Multi Select status
    // $(document).on("click",".radio_status",function(){
    //     $(this).siblings('.hidden_status').val($(this).val());
    // });

    // Known languages
    $(document).on("click",".known_languages",function(){
        var value = [];
        $('.known_languages').each(function() {
            if($(this).is(':checked')) {
              value.push($(this).val());
            }
        });
        $(this).siblings('.hidden_known_lang').val(value);
    });

    // Extra Curricular Values
    $(document).on("click",".extra_curricular_values",function(){
        var value = [];
        $('.extra_curricular_values').each(function() {
            if($(this).is(':checked')) {
              value.push($(this).val());
            }
        });
        $(this).siblings('.hidden_extra_curricular').val(value);
    });

    
    
//  // error popup alert box  
//     function error_popup(message){
// 	$('.error_popup_msg .success-alert span').text(message);
// 	$('.popup_fade').show();
// 	$('.error_popup_msg').show();
// 	document.body.style.overflow = 'hidden';
// }
    
// // error popup message center alignment
// var height=$('.error_popup_msg').height();
// var width=$('.error_popup_msg').width();
// $('.error_popup_msg').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
    
// // close error popup when click ok button or popupfade
// 	$(document).on('click','.alert_btn_popup,.cancel_btn',function(){
// 	  	$('.error_popup_msg').hide();
// 	  	$('.popup_fade').hide();
// 	  	document.body.style.overflow = 'auto';
// 	});

//     $(".admin_module_form").submit(function(e){
//     e.preventDefault();
//     });
    
   	$("ul, .site_visit_btn").on("click", function () {
           var disabled = $(this).attr("disabled");
           if (disabled === 'disabled') {
            return false;
           }
           });
       
 // //Forgot password
 //   $('#forget-password').on("click", function(){
 //   	   $("#admin_login_form").hide();
 //   	   $("#forgotform").show();
 //   });    
      
    // Get all the menus from admin and store it in below array to save in db to assign admin rights for each module via ajax
    // ********* Start line of the code **********
    // var module_array = new Array();
    // $('.main_module_data').each(function(){
    //     var $this = $(this);
    //     main_module_data = $this.text().toLowerCase();
    //     module_array[main_module_data] = [];
    //     $this.parents('.has-sub').find(".module_details").each(function(){
    //         module_array[main_module_data].push({"sub_module":$(this).find('.sub_module_data').text().toLowerCase(),"module_access":$(this).find('.sub_module_access').text().toLowerCase()});
    //     });
    //     push_data = {[main_module_data]:module_array[main_module_data]}; //[main_module_data] is key and module_array[main_module_data] is array value
    //     module_array.push(push_data);
    // });
    // var module_params = {};
    // module_params[csrf_name] = csfrData[csrf_name];
    // module_params['module_data'] = JSON.stringify(module_array);
    // $.ajax({
    //     type : "POST",
    //     url : admin_baseurl+"admin_modules",
    //     data : module_params,
    // });
    // ********** End of the code ***********

    //Store the access privileges of each admin user group into database via ajax
    // ********* Start line of the code **********
    $(document).delegate('.privilege_form','submit',function(e){   
        $this = $(this);
        $full_module = []; 
        $this.find('.module_data').each(function(){ 
            $inner_this = $(this);
            module_id = $inner_this.find('.module_id').val();
            $inner_this.find('.module_inner_data').each(function(){
                group_id = $(this).find('.group_id').val();
                access_operation = $.map($(this).find(".access_operation option:selected"), function(elem){
                    return $(elem).text().toLowerCase();
                });
                if($.makeArray(access_operation).length != 0)
                    $full_module.push({'access_module_id':module_id,'access_group_id':group_id,'access_permission':access_operation.join(',')});
            });
        }); 
        // alert(JSON.stringify($full_module));
        var module_params = {};
        module_params[csrf_name] = csfrData[csrf_name];
        module_params['module_data'] = JSON.stringify($full_module);
        $.ajax({
            type : "POST",
            url : admin_baseurl+"privileges",
            data : module_params,
            success: function(res) {
                $res = JSON.parse(res);
                if($res == "success"){
                    $("html, body,.sub_pre_section").animate({ scrollTop: 0 }, "slow");
                    $('.privilege_status').html("<i class='icon-ok-sign'></i>  Updated Successfully").show().fadeOut(3000);

                }
            }
        });
    });   
    // ********** End of the code ***********
        
    /* Popup pagination with arrow start */

    // Next button click
    $(document).on('click','.popup_pag_next',function() {
        target = $('div.subscription_organization_section div.viewed').index();
        // target === lastElem ? target = 0 : target = target+1;
        target === lastElem ? target = lastElem : target = target+1;
        sliderResponse(target);
    });

    // Previous button click
    $(document).on('click','.popup_pag_prev',function() {
        target = $('div.subscription_organization_section div.viewed').index();
        lastElem = sections.length-1;
        // target === 0 ? target = lastElem : target = target-1;
        target === 0 ? target = 0 : target = target-1;

        sliderResponse(target);
    });

    // Previous button click - Upgrade
    $(document).on('click','.upgrade_pag_prev',function() {
        var this_holder = $(this).parents('.upgrade_holder').children('.upgrade_section_profile');
        var this_holder_len = this_holder.length;
        var index_Val;
        this_holder.each(function() {
            if($(this).is(':visible')) {
                index_Val = $(this).index();
                if(index_Val > 1) {
                    index_Val = index_Val - 1;
                }
            }
        });
        if(index_Val != 0 ) {
            this_holder.eq(index_Val).fadeOut(1000);
            this_holder.eq(index_Val-1).fadeIn(3000);
        }
    });
    $('#timezone_act').timezones(); //code for timezone module in admin side
    // Next button click - Upgrade
    $(document).on('click','.upgrade_pag_next',function() {
        var this_holder = $(this).parents('.upgrade_holder').children('.upgrade_section_profile');
        var this_holder_len = this_holder.length;
        var index_Val;
        this_holder.each(function() {
            if($(this).is(':visible')) {
                index_Val = $(this).index();
                if(index_Val > 1) {
                    index_Val = index_Val - 1;
                }
            }
        });
        if(this_holder_len != index_Val+1 ) {
            this_holder.eq(index_Val).fadeOut(1000);
            this_holder.eq(index_Val+1).fadeIn(3000);
        }
    });
    // Previous button click - Renewal
    $(document).on('click','.renew_pag_prev',function() {
        var this_holder = $(this).parents('.renewal_holder').children('.renewal_section_profile');
        var this_holder_len = this_holder.length;
        var index_Val;
        this_holder.each(function() {
            if($(this).is(':visible')) {
                index_Val = $(this).index();
                if(index_Val > 1) {
                    index_Val = index_Val - 1;
                }
            }
        });
        if(index_Val != 0 ) {
            this_holder.eq(index_Val).fadeOut(1000);
            this_holder.eq(index_Val-1).fadeIn(3000);
        }
    });
    // Next button click - Renewal
    $(document).on('click','.renew_pag_next',function() {
        var this_holder = $(this).parents('.renewal_holder').children('.renewal_section_profile');
        var this_holder_len = this_holder.length;
        var index_Val;
        this_holder.each(function() {
            if($(this).is(':visible')) {
                index_Val = $(this).index();
                if(index_Val > 1) {
                    index_Val = index_Val - 1;
                }
            }
        });
        if(this_holder_len != index_Val+1 ) {
            this_holder.eq(index_Val).fadeOut(1000);
            this_holder.eq(index_Val+1).fadeIn(3000);
        }
    });
    /*use “…” for overflowed block of multi-lines in admin side added by thangam*/
   
   //   $('.pa').on('click', function(e){
   //      $("#not_count").html("0");
   //      // $('#not_count').hide();
   // });




    /* Popup pagination with arrow end */

    //check only entered value is numeric
    $(document).delegate('.numeric_act','keypress',function(e){
     //if the letter is not digit then display error 
     if (e.which != 8 && e.which != 45 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        return false;
     }
    });
    

    //check only entered value is decimal
    $(document).delegate('.decimal_act','keypress',function(e){
     //if the letter is not digit then display error 
     if ((e.which != 46 || $(this).val().indexOf('.') != -1) && (e.which < 48 || e.which > 57) && e.which != 8) {
        //display error message
        return false;
     }
    });

    /* Accept Only Numbers */
    $(document).on("keypress",".numeric_value",function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    /* Accept Only Characters with space */
    $(document).on("keypress",".alpha_value",function (e) {
        if (e.which != 8 && e.which != 32 && e.which != 0 && (e.which < 65 || e.which > 90) && (e.which < 97 || e.which > 122)) {
            return false;
        }
    });

   
    /* Akila Added */
    //Job Provider Image popup for posted Ads 
    $('.magnify-ad img').click(function () {
	    var $img = $(this);
	    $('#divLargerImage').html($img.clone().height(250).width(250)).add($('#divOverlay')).fadeIn();
	});

    $('#divLargerImage').add($('#divOverlay')).click(function () {
	    $('#divLargerImage').add($('#divOverlay')).fadeOut(function () {
	        $('#divLargerImage').empty();
	    });
	}); 
    
    //To change Job provider ad verified status 
    $(document).delegate('.ad_verify_act li','click',function(e){
        select_value = $(this).data('value');
        $('[name=ads_status]').find("[value=" + select_value + "]").attr('selected', 'selected');
    });
    
    $("#upload_logo").change(function () {
        readURL(this);
        $('#imagepreview_templogo').show();
    });

    $("#upload_logo").click(function () {
        
        $('#imagepreview_templogo').attr('src','');
    });


    $('#imagepreview_templogo').click(function(){

        $('#upload_logo').replaceWith($('#upload_logo').clone(true));
        $('#imagepreview_templogo').hide();
        $('.temp_remove_act').hide();

    });
    $('.temp_remove_act').click(function(e)
       {
            $('#imagepreview_templogo').hide();
            $('.temp_remove_act').hide();
           $('#imagepreview_templogo').attr("src","");
       });

    /* Accept Only Numbers - Added by Akila */
    $(document).on("keypress",".numeric_value",function (e) {
        if (e.which != 8 && e.which != 0 && e.which != 45 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    //Clone field for Customize plan settings - Added by Akila
    var maxField = 3;
    var addButton = $('.add_button');
    var saveButton = $('.save_button');
    var wrapper = $('.field_wrapper');
    var x = 1;
    var y = 2;
    //Initial field counter is 1
    $(addButton,saveButton).click(function() { //Once add button s clicked
    var error = 0;
    if(parseFloat($("#subs_min_val").val()) > parseFloat($("#subs_max_val").val()))
            return false;
	    //validate empty fields
	    $(this).parents('.plan_creation').find('.customize_plan').each(function(){
	    if($(this).val() == '')
	        {        
	            error = 1;    
	            $(this).addClass('attribute_error');           
	        }
	        else{
	            $(this).removeClass('attribute_error');
	        }
	    });
	    //validate select box
	    if(error==0){
	        var equal_check_array = [];
	        $(this).parents('.plan_creation').find('.select_plan').each(function(){
	            if($('option:selected',this).val() != ''){
	                equal_check_array.push($('option:selected',this).val());
	            }
	        });
	        var hasDups = !equal_check_array.every(function(v,i) {
	            return equal_check_array.indexOf(v) == i;
	        });
	    }
	    if(hasDups){
	        error=1;
	        $(this).parents('form').find('.admin_status').text("Please select other option to customize limits. ").fadeIn();
	    }
	    if(error==0){
	        $(this).parents('form').find('.admin_status').text("").fadeOut();  
	        var cloned_content = $('.field_wrapper:last').clone();
	        if (x < maxField) {//Check maximum number of input fields
	            x++;
	            $(cloned_content).insertAfter('.field_wrapper:last').find('input').val("");
	            $(cloned_content).find('.remove_button').show();
	            $(cloned_content).find('label').text('');
	            $(cloned_content).find('.counter').html(x);
	        }
	    }
	});
	$(document).on('click','.remove_button',function() {//Once remove button is clicked
	    $(this).parents('.field_wrapper').remove();
	    x--;
	});
	//Ended by Akila 
	
	//GracePeriod- Added by Akila
	$(document).on('click','.apply_grace_period', function(){
		if($(this).is(":checked")) {
			$('.show_grace_period').removeClass('hide_all');
		}
		else {	
			$('.show_grace_period').addClass('hide_all');
		}
	});
	
	
}); // End document

/* Popup pagination with arrow start */
var sections;
var lastElem;
var mask;
var sections_width;

// Popup pre-requesties
function popup_pagination() {
    // var sections = $(document).find ('div.subscription_organization_section subscription_organization_inner_section');
    sections = $('div.subscription_organization_section .subscription_organization_inner_section');
    lastElem = sections.length-1;
    mask = $('.subscription_organization_section');
    sections_width = sections.width();  
    mask.css('width', sections_width*(lastElem+1) +'px');
    sections.first().addClass('viewed');
    $('.profile_plan_section').each(function() {
       // $(this).find('.upgrade_section_profile').first().addClass('visible_upgrade'); 
       // $(this).find('.renewal_section_profile').first().addClass('visible_renewal'); 
        $('div.upgrade_holder_content',this).wrapAll('<div class="span3 upgrade_holder"></div>');
        $('div.renewal_holder_content',this).wrapAll('<div class="span3 renewal_holder"></div>');
    });
}

function date_picker() {
    $('.admin_date_picker').Zebra_DatePicker({
        format: 'd/m/Y',
        view: 'years'
    });    
}
// Animation effect - slider
function sliderResponse(target) {
    mask.stop(true,false).animate({'left':'-'+ sections_width*target +'px'},1000);
    sections.removeClass('viewed').eq(target).addClass('viewed');
}
/*Admin side Template logo upload functionalities added by thangam*/
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagepreview_templogo').prop('src', e.target.result).show();
            $('.temp_remove_act').show();
        };
        reader.readAsDataURL(input.files[0]);
    }
}

	


		
		

