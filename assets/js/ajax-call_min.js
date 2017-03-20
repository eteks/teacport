$(document).ready(function(){$(document).on("keypress",".numeric_value",function(a){if(8!=a.which&&0!=a.which&&(a.which<48||a.which>57))return!1}),$(document).on("keypress",".alpha_value",function(a){if(8!=a.which&&32!=a.which&&0!=a.which&&(a.which<65||a.which>90)&&(a.which<97||a.which>122))return!1}),$(document).on("keypress",".numeric_dot",function(a){if(8!=a.which&&46!=a.which&&0!=a.which&&(a.which<48||a.which>57))return!1}),$(document).on("keyup",".form_inputs",function(){var a=$.trim($(this).val()),b=parseInt($(this).data("minlength"));a.length<b&&0!=a.length?$(this).addClass("form-field-error"):$(this).removeClass("form-field-error")}),$(document).on("keyup",".numeric_dot",function(){var a=new RegExp("^([0-9]+(.[0-9]+)?)*$");a.test($(this).val())?$(this).removeClass("form-field-error"):$(this).addClass("form-field-error")}),$(document).on("change",".state_select",function(){var a=$(this).val(),b=$.trim($("option:selected",this).text()),c=$(this).parents(".state_section").siblings(".district_section").find("select"),d='<option value="">Select District </option>';""!=a?$.ajax({type:"POST",url:baseurl+"state",data:{value:a,csrf_token:csrf_token_value},success:function(a){if(a){var e=JSON.parse(a);0!=e.length?$.each(e,function(a){d+='<option value="'+e[a].district_id+'">'+e[a].district_name+"</option>"}):alert("No District added for "+b),c.html(d)}}}):c.html(d)}),$(document).on("click",".qua_level",function(){var a=$(this).val(),b=$(this).parents(".level_section").siblings(".qualification_section").find("select"),c='<option value="">Select Qualification </option>';""!=a?$.ajax({type:"POST",url:baseurl+"provider/joblevel",data:{value:a,csrf_token:csrf_token_value},success:function(a){if(a){var d=JSON.parse(a);0!=d.length?$.each(d,function(a){c+='<option value="'+d[a].educational_qualification_id+'">'+d[a].educational_qualification+"</option>"}):alert("No qualification added for selected joblevel"),b.html(c)}}}):b.html(c)}),$(document).on("change",".select_qualification",function(){var a=$(this).val(),b=$(this).parents(".qualification_section").siblings(".department_section").find("select"),c=$.trim($("option:selected",this).text()).toLowerCase(),d='<option value="">Select Department </option>',e=0;"sslc"!=c&&"hsc"!=c||(e=1,b.html("<option value='0'> None </option>")),""!=a&&0==e?$.ajax({type:"POST",url:baseurl+"provider/qualification",data:{value:a,csrf_token:csrf_token_value},success:function(e){if(e){var f=JSON.parse(e);0!=f.length?$.each(f,function(a){d+='<option value="'+f[a].departments_id+'">'+f[a].departments_name+"</option>"}):""!=a&&alert("No department added for "+c),b.html(d)}}}):0==e&&b.html(d)}),$(document).on("change",".class_level_select",function(){var a=$(this).val(),b=$.trim($("option:selected",this).text()),c=$(this).parents(".class_level_section").siblings(".university_section").find("select"),d='<option value="">Select University </option>';""!=a?$.ajax({type:"POST",url:baseurl+"provider/class_level",data:{value:a,csrf_token:csrf_token_value},success:function(a){if(a){var e=JSON.parse(a);0!=e.length?$.each(e,function(a){d+='<option value="'+e[a].education_board_id+'">'+e[a].university_board_name+"</option>"}):alert("No university added for "+b),c.html(d)}}}):c.html(d)}),$(document).on("change",".qualification_select",function(){var a=$.trim($(this).val()),b=$(this).parents(".qualification_section").siblings(".department_section").find("select"),c='<option value="">Select Department </option>';""!=a?$.ajax({type:"POST",url:baseurl+"provider/qualification",data:{value:a,csrf_token:csrf_token_value},success:function(d){if(d){var e=JSON.parse(d);0!=e.length?$.each(e,function(a){c+='<option value="'+e[a].departments_id+'">'+e[a].departments_name+"</option>"}):""!=a&&alert("No department added for selected qualification"),b.html(c)}}}):b.html(c)}),$(document).on("change",".select_institution_event",function(){var a=$.trim($(this).val()),b=$(this).parents(".institution_section").siblings(".qualification_section").find("select"),c=$(this).parents(".institution_section").siblings(".posting_section").find("select"),d=$("option:selected",b).val(),e=$("option:selected",c).val(),f='<option value="">Select Qualification </option>',g='<option value="">Select Posting </option>';$.ajax({type:"POST",url:baseurl+"qualification_posting",data:{value:a,csrf_token:csrf_token_value},success:function(a){if(a){var h=JSON.parse(a),i=h.qualification,j=h.posting;if(0!=i.length){$.each(i,function(a){if(i[a].educational_qualification_id==d)var b="selected";f+='<option value="'+i[a].educational_qualification_id+'" '+b+">"+i[a].educational_qualification+"</option>"})}if(0!=j.length){$.each(j,function(a){if(j[a].posting_id==e)var b="selected";g+='<option value="'+j[a].posting_id+'" '+b+">"+j[a].posting_name+"</option>"})}b.html(f),c.html(g)}}})}),$(document).on("change",".ins_cand_select",function(){var a=$(this).val(),b=$(this).parents(".ins_cand_section").siblings(".ins_posting_section").find("select"),c=$(this).parents(".ins_cand_section").siblings(".ins_subject_section").find("select");$(this).parents(".ins_cand_section").siblings(".ins_posting_section").find(".others_txt_field").val("").removeClass("form-field-error").hide(),$(this).parents(".ins_cand_section").siblings(".ins_subject_section").find(".others_txt_field").val("").removeClass("form-field-error").hide();var d=$(this).parents(".ins_cand_section").siblings(".ins_class_section").find(".ins_class_check"),e=b.val(),f=c.val(),g=[];d.find(".form_checkbox").each(function(){$(this).is(":checked")&&g.push($(this).val())});var h='<option value=""> Select </option>',i='<option value=""> Select </option>',j="";""!=$.trim(a)?(a=a.join(","),$.ajax({type:"POST",url:baseurl+"seeker/candidate_profile_institution",data:{value:a,csrf_token:csrf_token_value},success:function(a){if(""!=a){var k=JSON.parse(a),l=k.posting,m=k.subject,n=k.class;if(0!=l.length){var o="";$.each(l,function(a){o="",jQuery.inArray(l[a].posting_id,e)!=-1&&(o="selected"),h+='<option value="'+l[a].posting_id+'" '+o+">"+l[a].posting_name+"</option>"})}if(0!=m.length){var o="";$.each(m,function(a){o="",jQuery.inArray(m[a].subject_id,f)!=-1&&(o="selected"),i+='<option value="'+m[a].subject_id+'" '+o+">"+m[a].subject_name+"</option>"})}if(0!=n.length){var o="";$.each(n,function(a){o="",jQuery.inArray(n[a].class_level_id,g)!=-1&&(o="checked"),j+='<label><input class="ace form_checkbox" name="cand_class[]" type="checkbox" value="'+n[a].class_level_id+'" '+o+'> <span class="lbl"> '+n[a].class_level+" </span></label>"})}h+='<option value="others" > Others </option>',i+='<option value="others" > Others </option>',b.html(h),c.html(i),d.html(j)}else b.html(h),c.html(i),d.html(j)}})):(b.html(h),c.html(i),d.html(j))});$(".opt_fresh").on("click",function(){$(this).find("input").is(":checked")?($(this).siblings(".professional_profile").slideUp(),$(this).siblings(".professional_profile").attr("data-type","fresh")):($(this).siblings(".professional_profile").slideDown(),$(this).siblings(".professional_profile").attr("data-type","exp"))}),$(document).on("submit",".seeker_edit_form",function(a){a.preventDefault();var b="",c=$(this).find(".val_status"),d="",e=$(this);$(".form_inputs").removeClass("form-field-error"),$(this).find(".form_inputs").each(function(){if(!$(this).hasClass("not-required")){var a=$(this).prop("tagName").toLowerCase(),c=$.trim($(this).val());""==c?(b=1,d="Please Provide Valid Information!",$(this).addClass("form-field-error"),"select"==a&&$(this).siblings("span").find(".select2-selection").addClass("form-field-error")):($(this).removeClass("form-field-error"),"select"==a&&$(this).siblings("span").find(".select2-selection").removeClass("form-field-error"))}});var f=[];$(".form_radio").each(function(){var a=$(this).attr("name");$.inArray(a,f)==-1&&f.push(a)}),$.each(f,function(a,c){0==$('input[name="'+c+'"]:checked').length?(b=1,d="Please Provide Valid Information!",$('input[name="'+c+'"]').first().addClass("form-field-error"),$('input[name="'+c+'"]').first().parents(".form-group").find("label").addClass("form-label-error")):($('input[name="'+c+'"]').first().removeClass("form-field-error"),$('input[name="'+c+'"]').first().parents(".form-group").find("label").removeClass("form-label-error"))});var g=[];if($(".form_checkbox").each(function(){var a=$(this).attr("name");$.inArray(a,g)==-1&&g.push(a)}),$.each(g,function(a,c){0==$('input[name="'+c+'"]:checked').length?(b=1,d="Please Provide Valid Information!",$('input[name="'+c+'"]').first().addClass("form-field-error"),$('input[name="'+c+'"]').first().parents(".form-group").find("label").first().addClass("form-label-error")):($('input[name="'+c+'"]').first().removeClass("form-field-error"),$('input[name="'+c+'"]').first().parents(".form-group").find("label").first().removeClass("form-label-error"))}),$("#fresher_option").is(":checked")?$(".form_exp_inputs").removeClass("form-field-error"):$(this).find(".form_exp_inputs").each(function(){""==$(this).val()?(b=1,d="Please Provide Valid Information!",$(this).addClass("form-field-error")):$(this).removeClass("form-field-error")}),""==b&&$(this).find(".form_inputs").each(function(){var a=$.trim($(this).val()),c=parseInt($(this).data("minlength")),e=parseInt($(this).attr("maxlength")),f=$(this).data("name");return a.length<c&&""!=a.length?(b=1,d=f+" must containes atleast "+c+" characters",$(this).addClass("form-field-error"),!1):a.length>e?(b=1,d=f+" must containes maximum "+e+" characters",$(this).addClass("form-field-error"),!1):void $(this).removeClass("form-field-error")}),""==b){var h=parseInt($("#min_amount").val()),i=parseInt($("#max_amount").val());h>i?(b=1,d="Please Enter Maximum Amount!",$("#max_amount").addClass("form-field-error")):$("#max_amount").removeClass("form-field-error")}if(""==b&&$(".numeric_dot").each(function(){var a=$(this).val().split("."),c=new RegExp("^([0-9]+(.[0-9]+)?)*$");a[0].length>2||a[0].length<2||!c.test($(this).val())?(b=1,d="Please Provide Valid Information!",$(this).addClass("form-field-error")):$(this).removeClass("form-field-error")}),""==b&&$(".numeric_dot_exp").each(function(){if("exp"==$(this).parents(".professional_profile ").data("type")){var a=$(this).val().split("."),c=new RegExp("^([0-9]+(.[0-9]+)?)*$");a[0].length>2||a[0].length<1||!c.test($(this).val())?(b=1,d="Please Provide Valid Information!",$(this).addClass("form-field-error")):$(this).removeClass("form-field-error")}}),$("input,select").hasClass("form-field-error")){""==d&&(d="Please Provide Valid Information!"),c.removeClass("val_success"),c.addClass("val_error"),$("html,body").animate({scrollTop:$(this).offset().top},500),c.html('<i class="fa fa-times" aria-hidden="true"></i> '+d+" ").fadeIn(350);var j=$(this).find(".form-field-error").first().parents(".panel-default");$(".panel-heading").removeClass("tab-collapsed"),$(".panel-collapse").removeClass("in"),$(".panel-collapse").attr("aria-expanded","false"),j.children(".panel-heading").addClass("tab-collapsed"),j.children(".panel-collapse").addClass("in"),j.children(".panel-collapse").attr("aria-expanded","true")}else{b=0,c.html("").fadeOut(350);var k=$(this).parents(".edit_section_seeker").find(".edit_loader"),l=new FormData(this);l.append("csrf_token",csrf_token_value),$.ajax({type:"POST",url:baseurl+"seeker/seeker_edit_form",data:l,contentType:!1,processData:!1,beforeSend:function(){k.removeClass("loader-dn")},success:function(a){"success"==a?(c.removeClass("val_error"),c.addClass("val_success"),$("html,body").animate({scrollTop:e.offset().top},500),c.html('<i class="fa fa-check" aria-hidden="true"></i> Updated Successfully').fadeIn(350),setTimeout(function(){location.reload()},3e3)):(c.removeClass("val_success"),c.addClass("val_error"),$("html,body").animate({scrollTop:e.offset().top},500),c.html('<i class="fa fa-times" aria-hidden="true"></i> '+a).fadeIn(350))},complete:function(){k.addClass("loader-dn")},error:function(){k.addClass("loader-dn"),$("html, body").animate({scrollTop:0},1e3),c.html('<i class="fa fa-times" aria-hidden="true"></i> Not Updated due to Connection Problem. Try again.').fadeIn(350)}})}})});