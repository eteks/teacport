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

    
// Init new row
function add_new_record() {
    blankrow = '<tr valign="top" class="inputform">';
    for(i=0;i<columns.length;i++) {
        // Create input element as per the definition
        input = createInput(i,'');
        blankrow += '<td class="ajaxReq">'+input+'</td>';
    }
    blankrow += '<td></td><td><a href="javascript:;" class="'+savebutton+'">Save</a></td><td><a href="javascript:;" class="'+removebutton+'">Remove</a></td></tr>';
    // prepand blank row at the end of table
    $("."+table).prepend(blankrow);
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
        input = '<input type='+inputType[i]+' name='+columns[i]+' placeholder="'+placeholder[i]+'" value="'+str+'" >';
    }
    else if(inputType[i] == "textarea"){
        input = '<textarea name='+columns[i]+' placeholder="'+placeholder[i]+'">'+str+'</textarea>';
    }
    else if(inputType[i] == "select"){
        input = '<select name='+columns[i]+'>';
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
        input = '<select data-placeholder="'+placeholder[i]+'" name="'+columns[i]+'" class="chosen span6" multiple="multiple" >';
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
        input += '</select>';
        //console.log(str);        
    }
    return input;
};

ajax = function (params,action,form_id){
    var form = $('#'+form_id);
    var this_table = $('#'+form_id).find('table');
    params['action'] = action;
    params[csrf_name] = csfrData[csrf_name];
    $.ajax({
        type : "POST",
        url : admin_baseurl+form.attr('action'),
        dataType : 'json',
        data : params ,
        success: function(res) {
            if(res.error==1) {
                $('.val_error').html(res.status);
                $('.val_error').slideDown(350);
                $('.val_error').fadeOut(3000);
            }
            else if(res.error==2) {
                $('.val_error').html();
                form.html(res.output);
                $('.db_status').fadeOut(3000);
                setTimeout(function() { $('.db_status').remove(); }, 5000);
                default_credentials();
            }
        }
    });
};

$(document).ready(function(){
    default_credentials();

    if($('.has-sub').length > 0) {
        $('.has-sub').each(function(){
            if($(this).hasClass('open')) {
                $(this).find('ul').slideDown();
            }
        });
    }

    // Add - New record
    $(document).on('click','.add_new',function() {
        if(editing==0 && ready_save==0) {        	      	 
            add_new_record();            
            handleChoosenSelect();
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
        if(editing==0 && ready_save==1) {
            $(this).parents('tr').remove();
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
            if(confirm("Do you really want to delete record ?"))
                ajax(ajax_data,"delete",form_id);
        }
        else {
            alert("Unable to process");
        }
    });

    // Edit - Old record
    $(document).on("click","."+editbutton,function(){
        var update_id = $(this).data("id");
        var this_row = $(this).parents("tr").attr('id');

        if(update_id && editing == 0 && tdediting == 0 && ready_save==0) {
            // hide editing row, for the time being
            // $("."+table+" tbody tr:last-child").fadeOut("fast");
                        
            var html;
            for(i=0;i<columns.length;i++){
                // fetch value inside the TD and place as VALUE in input field
                if(inputType[i]=='text') {
                    var val = $(document).find("."+table+" #"+this_row+" ."+columns[i]+"").html();
                }
                else {
                   var val = $(document).find("."+table+" #"+this_row+" ."+columns[i]+" input").val(); 
                }
                input = createInput(i,$.trim(val));
                html +='<td>'+input+'</td>';
            }
            if(typeof is_created != "undefined" && is_created=="no") {
                html += '<td><a href="javascript:;" data-id="'+update_id+'" class="'+updatebutton+'">Update</a></td><td> <a href="javascript:;" class="'+cancelbutton+'">Cancel</a></td>';
            }
            else {
                html += '<td></td><td><a href="javascript:;" data-id="'+update_id+'" class="'+updatebutton+'">Update</a></td><td> <a href="javascript:;" class="'+cancelbutton+'">Cancel</a></td>';
            }
            
            // Before replacing the TR contents, make a copy so when user clicks on 
            trcopy = $("."+table+" #"+this_row+" ").html();
            $("."+table+" #"+this_row+" ").html(html);  
             // $("."+table+" tr[id="+id+"]").fadeOut(500, function() {
             // $(this).html(html).fadeIn(500);
             // }); 
            handleChoosenSelect();
            // set editing flag
            editing = 1;
            ready_save= 1;
        }

    });   


    // Cancel - Old record
    $(document).on("click","."+cancelbutton,function(){
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
                filter_tag = '';
                if(res!=0){ 
                  $.each(res, function(i){
                    filter_tag += "<tr><td>"+res[i].name_data+"</td><td>"+res[i].count_data+"</td>";
                    $('#filter_vacancy_table').find('.vacancy_header').text(res[i].label_name);
                  });  
                }   
                $('#filter_vacancy_table').find('tbody').html(filter_tag);
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
                filter_tag = '';
                if(res!=0){ 
                  $.each(res, function(i){
                    filter_tag += "<tr><td>"+res[i].name_data+"</td><td>"+res[i].count_data+"</td>";
                    $('#filter_provider_table').find('.vacancy_header').text(res[i].label_name);
                  });  
                }   
                else{
                    // alert("No data available");
                }
                $('#filter_provider_table').find('tbody').html(filter_tag);
            }
        });
    });  
    
    $(function() {
    //----- OPEN
    $('[data-popup-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-open');
        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
 
        e.preventDefault();
    });   
    
     $('[data-popup-open-sec]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-open-sec');
        $('[data-popup-sec="' + targeted_popup_class + '"]').fadeIn(350);
 
        e.preventDefault();
    }); 
   });
   
    $(function() {
  
    //----- CLOSE
    $('[data-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
 
        e.preventDefault();
    });
    
    $('[data-popup-close-sec]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close-sec');
        $('[data-popup-sec="' + targeted_popup_class + '"]').fadeOut(350);
 
        e.preventDefault();
    });
});
    

    // popup for subscription and ads
    $('.add_option,.edit_option').on('click', function(e)  {
        var targeted_popup_class = $(this).data('open');
        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
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

    // Tab menu sumission
    $(document).on('click','#rootwizard .finish',function() {
        var test = tabmenu_ci_validation('end');
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
    
 //Forgot password
   $('#forget-password').on("click", function(){
   	   $("#admin_login_form").hide();
   	   $("#forgotform").show();
   });
   
   function deletePost(id) {
    var db_id = id.replace("post_", "");
    // Run Ajax request here to delete post from database
    document.body.removeChild(document.getElementById(id));
}

function CustomConfirm() {
    this.show = function (dialog, op, id) {
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogOverlay = document.getElementById('dialog-overlay');
        var dialogBox = document.getElementById('dialog-box');

        dialogOverlay.style.display = "block";
        dialogOverlay.style.height = winH + "px";
        dialogBox.style.left = ((winW / 2) - (550 / 2)) + "px";
        dialogBox.style.top = "200px";
        dialogBox.style.display = "block";

        document.getElementById('dialog-box-head').innerHTML = "Are you want to Delete?";
        // document.getElementById('dialog-box-body').innerHTML = dialog;
        document.getElementById('dialog-box-foot').innerHTML =
            '<button onclick="Confirm.yes(\'' + op + '\',\'' + id + '\')">Yes</button> <button onclick="Confirm.no()">No</button>';
    };
    this.no = function () {
        this.hide();
    };
    this.yes = function (op, id) {
        if (op == "delete_post") {
            deletePost(id);
        }
        this.hide();
    };
    this.hide = function () {
        document.getElementById('dialog-box').style.display = "none";
        document.getElementById('dialog-overlay').style.display = "none";
    };
}
var Confirm = new CustomConfirm();   
    
    // Get all the menus from admin and store it in below array to save in db to assign admin rights for each module via ajax
    // ********* Start line of the code **********
    var module_array = new Array();
    $('.main_module_data').each(function(){
        var $this = $(this);
        main_module_data = $this.text().toLowerCase();
        module_array[main_module_data] = [];
        $this.parents('.has-sub').find(".module_details").each(function(){
            module_array[main_module_data].push({"sub_module":$(this).find('.sub_module_data').text().toLowerCase(),"module_access":$(this).find('.sub_module_access').text().toLowerCase()});
        });
        push_data = {[main_module_data]:module_array[main_module_data]}; //[main_module_data] is key and module_array[main_module_data] is array value
        module_array.push(push_data);
    });
    var module_params = {};
    module_params[csrf_name] = csfrData[csrf_name];
    module_params['module_data'] = JSON.stringify(module_array);
    $.ajax({
        type : "POST",
        url : admin_baseurl+"admin_modules",
        data : module_params,
    });
    // ********** End of the code ***********

    //Store the access privileges of each admin user into database via ajax
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
        });
    });   
    // ********** End of the code ***********

});





