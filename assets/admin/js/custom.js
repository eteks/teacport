    /*
    * Add edit delete rows dynamically using jquery and php
    * http://www.amitpatil.me/
    *
    * @version
    * 2.0 (4/19/2014)
    * 
    * @copyright
    * Copyright (C) 2014-2015 
    *
    * @Auther
    * Amit Patil
    * Maharashtra (India)
    *
    * @license
    * This file is part of Add edit delete rows dynamically using jquery and php.
    * 
    * Add edit delete rows dynamically using jquery and php is freeware script. you can redistribute it and/or 
    * modify it under the terms of the GNU Lesser General Public License as published by
    * the Free Software Foundation, either version 3 of the License, or
    * (at your option) any later version.
    * 
    * Add edit delete rows dynamically using jquery and php is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU General Public License for more details.
    * 
    * You should have received a copy of the GNU General Public License
    * along with this script.  If not, see <http://www.gnu.org/copyleft/lesser.html>.
    */

// $( document ).ajaxError(function() {
//     window.location.href = admin_baseurl;
// });

// Set button class names 
var savebutton = "ajaxSave";
var deletebutton = "ajaxDelete";
var editbutton = "ajaxEdit";
var updatebutton = "ajaxUpdate";
var cancelbutton = "cancel";

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
    blankrow += '<td></td><td><a href="javascript:;" class="'+savebutton+'">Save</a></td><td><a href="javascript:;" class="new_remove">Remove</a></td></tr>';
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
        input = '<input type='+inputType[i]+' name='+columns[i]+' placeholder="'+placeholder[i]+'" value='+str+' >';
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
            if(str == select_option[i])
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
        input += '<li data-value="1" class="on"><a href="#">Yes</a></li> <li data-value="0"><a href="#">No</a></li>';
        input += '</ul>';
        input += '<input type="hidden" value="" class="verification" name="'+columns[i]+'" />';
    }
    else if(inputType[i] == "multiselect"){
        input = '<select data-placeholder="'+placeholder[i]+'" name="'+columns[i]+'" class="chosen span6" multiple="multiple" >';
        var select_option = eval(columns[i]+'_option');
        var select_value = eval(columns[i]+'_value');

        for(i=0;i<select_option.length;i++){
            //console.log(select_option[i]);
            selected = "";
            // var html = $(str);              
            // var multi_value = html.find('span').data('id');
            // alert(multi_value);
            if(str == select_value[i])
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
    // $(document).on("click","."+deletebutton,function(){
        // var id = $(this).data("id");
        // var form_id = $(this).parents('form').attr('id');
        // var ajax_data = {};
        // ajax_data['rid'] = id;
        // if(id){
            // if(confirm("Do you really want to delete record ?"))
                // ajax(ajax_data,"delete",form_id);
        // }
        // else {
            // alert("Unable to process");
        // }
    // });

    
    // Edit - Old record
    $(document).on("click","."+editbutton,function(){
        var id = $(this).attr("id");
        var update_id = $(this).data("id");

        if(id && editing == 0 && tdediting == 0 && ready_save==0) {
            // hide editing row, for the time being
            // $("."+table+" tbody tr:last-child").fadeOut("fast");
                        
            var html;
            for(i=0;i<columns.length;i++){
                // fetch value inside the TD and place as VALUE in input field
                var val = $(document).find("."+table+" tr[id="+id+"] td[class="+columns[i]+"]").html();
                input = createInput(i,$.trim(val));
                html +='<td>'+input+'</td>';
            }
            if(typeof is_created != "undefined" && is_created=="no") {
                html += '<td><a href="javascript:;" data-id="'+update_id+'" id="'+id+'" class="'+updatebutton+'">Update</a></td><td> <a href="javascript:;" id="'+id+'" class="'+cancelbutton+'">Cancel</a></td>';
            }
            else {
                html += '<td></td><td><a href="javascript:;" data-id="'+update_id+'" id="'+id+'" class="'+updatebutton+'">Update</a></td><td> <a href="javascript:;" id="'+id+'" class="'+cancelbutton+'">Cancel</a></td>';
            }
            
            // Before replacing the TR contents, make a copy so when user clicks on 
            trcopy = $("."+table+" tr[id="+id+"]").html();
            $("."+table+" tr[id="+id+"]").html(html);  
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
        var id = $(this).attr("id");       
        // $("."+table+" tr:last-child").fadeIn('fast');   
        $("."+table+" tr[id="+id+"]").fadeOut(500, function() {
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
                    alert("No data available");
                }
                $('#filter_provider_table').find('tbody').html(filter_tag);
            }
        });
    });  
    
    // $(function() {
    // //----- OPEN
    // $('[data-popup-open]').on('click', function(e)  {
        // var targeted_popup_class = jQuery(this).attr('data-popup-open');
        // $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
//  
        // e.preventDefault();
    // });   
//     
     // $('[data-popup-open-sec]').on('click', function(e)  {
        // var targeted_popup_class = jQuery(this).attr('data-popup-open-sec');
        // $('[data-popup-sec="' + targeted_popup_class + '"]').fadeIn(350);
//  
        // e.preventDefault();
    // }); 
   // });
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
    $('.upload_option').on('click', function()  {
        $(this).prev().click();
    });

    // Upload preview
    $('.image_upload').on('change', function()  {
        
        var file = $(this).val();
        var ext = file.substr((file.lastIndexOf('.') + 1));
        if (ext == "jpg" || ext == "png" || ext == "JPG" || ext == "jpeg") {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {           
                    $('.preview_images').attr('src', e.target.result);
                }
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







    // $(".tabs-menu a").click(function(event) {
        // event.preventDefault();
        // $(this).parent().addClass("current");
        // $(this).parent().siblings().removeClass("current");
        // var tab = $(this).attr("href");
        // $(".tab-content").not(tab).css("display", "none");
        // $(tab).fadeIn();
    // });

});





