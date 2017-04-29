$(document).ready(function(){$(document).on("change",".image_upload_holder",function(){var a=$(this).val(),b=$(this).parents(".image-preview").siblings().find(".image_upload_profile"),c=$(this).parents(".image-preview").find(".image-preview-filename"),d=$(this).parents("form").find(".val_status"),e=$(this).parents("form"),f=$(this).parents(".image-preview").find(".image-preview-clear"),g=a.substr(a.lastIndexOf(".")+1);if("jpg"!=g&&"png"!=g&&"jpeg"!=g||"undefined"==g)return d.removeClass("val_success"),d.addClass("val_error"),$("html,body").animate({scrollTop:e.offset().top},500),d.html('<i class="fa fa-times" aria-hidden="true"></i> Invalid file only files with extension. jpg or png or jpeg are accepted.').fadeIn(350),!1;var h=$(this)[0].files[0].size;if(!(h<2097152))return d.removeClass("val_success"),d.addClass("val_error"),$("html,body").animate({scrollTop:e.offset().top},500),d.html('<i class="fa fa-times" aria-hidden="true"></i> File size must contain less than 2MB.').fadeIn(350),!1;var i=new FileReader;i.readAsDataURL(this.files[0]),i.onload=function(g){var h=new Image;h.src=g.target.result,h.onload=function(){var g=this.height,i=this.width;return g>768||i>1024?(d.removeClass("val_success"),d.addClass("val_error"),$("html,body").animate({scrollTop:e.offset().top},500),d.html('<i class="fa fa-times" aria-hidden="true"></i> Height and Width must not exceed 768px and 1024px.').fadeIn(350),!1):(d.removeClass("val_error"),d.addClass("val_success"),f.show(),$("html,body").animate({scrollTop:e.offset().top},500),d.html('<i class="fa fa-check" aria-hidden="true"></i> File added successfully.').fadeIn(350),b.attr("src",h.src),c.val(a),!0)}}}),$(document).on("change",".image_upload_holder_ads",function(){var a=$(this).val(),b=$(this).parents(".image-preview").siblings().find(".image_upload_profile"),c=$(this).parents(".image-preview").find(".image-preview-filename"),d=$(this).parents("form").find(".val_status"),e=$(this).parents("form"),f=$(this).parents(".image-preview").find(".image-preview-clear"),g=a.substr(a.lastIndexOf(".")+1);if("jpg"!=g&&"png"!=g&&"jpeg"!=g||"undefined"==g)return d.removeClass("val_success"),d.addClass("val_error"),$("html,body").animate({scrollTop:e.offset().top},500),d.html('<i class="fa fa-times" aria-hidden="true"></i> Invalid file only files with extension. jpg or png or jpeg are accepted.').fadeIn(350),!1;var h=$(this)[0].files[0].size;if(!(h<2097152))return d.removeClass("val_success"),d.addClass("val_error"),$("html,body").animate({scrollTop:e.offset().top},500),d.html('<i class="fa fa-times" aria-hidden="true"></i> File size must contain less than 2MB.').fadeIn(350),!1;var i=new FileReader;i.readAsDataURL(this.files[0]),i.onload=function(g){var h=new Image;h.src=g.target.result,h.onload=function(){var g=this.height,i=this.width;return g>768||i>1024||g<300||i<800?(d.removeClass("val_success"),d.addClass("val_error"),$("html,body").animate({scrollTop:e.offset().top},500),d.html('<i class="fa fa-times" aria-hidden="true"></i> Height and Width must not exceed 768px and 1024px and atleast have minimum 300px and 800px.').fadeIn(350),!1):(d.removeClass("val_error"),d.addClass("val_success"),f.show(),$("html,body").animate({scrollTop:e.offset().top},500),d.html('<i class="fa fa-check" aria-hidden="true"></i> File added successfully.').fadeIn(350),b.attr("src",h.src),c.val(a),!0)}}}),$(document).on("change",".file_upload_holder",function(){var a=$(this).val(),b=$(this).parents(".image-preview").find(".image-preview-filename"),c=$(this).parents("form").find(".val_status"),d=$(this).parents("form"),e=$(this).parents(".image-preview").find(".image-preview-clear"),f=a.substr(a.lastIndexOf(".")+1);if("pdf"!=f&&"doc"!=f&&"docx"!=f||"undefined"==f)return c.removeClass("val_success"),c.addClass("val_error"),$("html,body").animate({scrollTop:d.offset().top},500),c.html('<i class="fa fa-times" aria-hidden="true"></i> Invalid file only files with extension. pdf or doc or docx are accepted.').fadeIn(350),!1;var g=$(this)[0].files[0].size;return g<1048576?(c.removeClass("val_error"),c.addClass("val_success"),e.show(),$("html,body").animate({scrollTop:d.offset().top},500),c.html('<i class="fa fa-check" aria-hidden="true"></i> File added successfully.').fadeIn(350),b.val(a),!0):(c.removeClass("val_success"),c.addClass("val_error"),$("html,body").animate({scrollTop:d.offset().top},500),c.html('<i class="fa fa-times" aria-hidden="true"></i> File size must contain less than 1MB.').fadeIn(350),!1)}),$(document).on("click",".image-preview-clear",function(){var a=$(this).parents("form").find(".val_status"),b=$(this).parents(".image-preview").siblings().find(".image_upload_profile");$(this).hide(),$(this).parents(".image-preview").find(".image-preview-filename").val(""),$(this).parents(".image-preview").find(".image_upload_holder").val(""),b.attr("src",b.data("href")),a.removeClass("val_error"),a.addClass("val_success"),$("html,body").animate({scrollTop:$(this).parents("form").offset().top},500),a.html('<i class="fa fa-check" aria-hidden="true"></i> File Removed successfully.').fadeIn(350)}),$(document).on("submit",".seeker_form,.contact_form,.provider_form",function(a){var b="",c=$(this).find(".val_status"),d="";if($(".error").css("display","none"),$(".form_inputs").removeClass("form-field-error"),$(this).find(".form_inputs").each(function(){if(!$(this).hasClass("not-required")){var a=$(this).prop("tagName").toLowerCase(),c=$.trim($(this).val());""==c?(b=1,d="Please Provide Valid Information!",$(this).addClass("form-field-error"),"select"==a&&$(this).siblings("span").find(".select2-selection").addClass("form-field-error")):($(this).removeClass("form-field-error"),"select"==a&&$(this).siblings("span").find(".select2-selection").removeClass("form-field-error"))}}),""==b&&$(this).find(".form_inputs").each(function(){var a=$.trim($(this).val()),c=parseInt($(this).data("minlength")),e=parseInt($(this).attr("maxlength")),f=$(this).data("name");return a.length<c&&""!=a.length?(b=1,d=f+" must containes atleast "+c+" characters",$(this).addClass("form-field-error"),!1):a.length>e?(b=1,d=f+" must containes maximum "+e+" characters",$(this).addClass("form-field-error"),!1):void $(this).removeClass("form-field-error")}),""==b){var e=$(this).find(".email_value");!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(e.val())&&e.length>0?(b=1,d="Enter Valid Email Address!",e.addClass("form-field-error")):e.removeClass("form-field-error")}if(""==b&&$("#new_pass").is(":visible")&&$("#confirm_pass").is(":visible")&&($("#new_pass").val()!=$("#confirm_pass").val()?(b=1,d="Confirm password didnot match with new password",$("#confirm_pass").addClass("form-field-error")):$("#confirm_pass").removeClass("form-field-error")),""==b&&$(this).find(".form_dec").each(function(){$(this).is(":checked")?($(this).removeClass("form-field-error"),$(this).parents("p").removeClass("form-label-error")):(b=1,d="Please Accept Declaration!",$(this).addClass("form-field-error"),$(this).parents("p").addClass("form-label-error"))}),""==b&&$("#minimum_salary_vacancy").length>0&&$("#maximum_salary_vacancy").length>0){var f=parseInt($("#minimum_salary_vacancy").val()),g=parseInt($("#maximum_salary_vacancy").val());f>g&&0==amount_error?(b=1,d="Please Enter Maximum Amount!",$("#maximum_salary_vacancy").addClass("form-field-error")):$("#maximum_salary_vacancy").removeClass("form-field-error")}return $("input,select,textarea").hasClass("form-field-error")?(""==d&&(d="Please Provide Valid Information!"),c.removeClass("val_success"),c.addClass("val_error"),$("html,body").animate({scrollTop:$(this).offset().top},500),c.html('<i class="fa fa-times" aria-hidden="true"></i> '+d+" ").fadeIn(350),!1):(b=0,c.html("").fadeOut("fast"),!0)}),$(document).on("submit",".seeker_popup_form,.provider_popup_form",function(a){var b="",c=$(this).find(".val_status"),d="";return $(".error").css("display","none"),$(".form_inputs").removeClass("form-field-error"),$(this).find(".form_inputs").each(function(){if($(this).is(":visible")&&!$(this).hasClass("not-required")){var a=$(this).prop("tagName").toLowerCase(),c=$.trim($(this).val());""==c?(b=1,d="Please Provide Valid Information!",$(this).addClass("form-field-error"),"select"==a&&$(this).siblings("span").find(".select2-selection").addClass("form-field-error")):($(this).removeClass("form-field-error"),"select"==a&&$(this).siblings("span").find(".select2-selection").removeClass("form-field-error"))}}),""==b&&$(this).find(".form_inputs").each(function(){if($(this).is(":visible")){var a=$.trim($(this).val()),c=parseInt($(this).data("minlength")),e=parseInt($(this).attr("maxlength")),f=$(this).data("name");if(a.length<c&&""!=a.length)return b=1,d=f+" must containes atleast "+c+" characters",$(this).addClass("form-field-error"),!1;if(a.length>e)return b=1,d=f+" must containes maximum "+e+" characters",$(this).addClass("form-field-error"),!1;$(this).removeClass("form-field-error")}}),""==b&&$("#new_pass").is(":visible")&&$("#confirm_pass").is(":visible")&&($("#new_pass").val()!=$("#confirm_pass").val()?(b=1,d="Confirm password didnot match with new password",$("#confirm_pass").addClass("form-field-error")):$("#confirm_pass").removeClass("form-field-error")),$("input,select").hasClass("form-field-error")?(""==d&&(d="Please Provide Valid Information!"),c.removeClass("val_success"),c.addClass("val_error"),$("#dashboard_popup_act").animate({scrollTop:$(this).offset().top},500),c.html('<i class="fa fa-times" aria-hidden="true"></i> '+d+" ").fadeIn(350),!1):(b=0,c.html("").fadeOut(350),!0)}),$(document).on("submit",".reg_login_form",function(a){var b="",c=$(this).find(".val_status"),d="";if($(".error").css("display","none"),$(this).find(".form_inputs").each(function(){var a=$(this).prop("tagName").toLowerCase(),c=$.trim($(this).val());""==c?(b=1,d="Please Provide Valid Information!",$(this).addClass("form-field-error"),"select"==a&&$(this).siblings("span").find(".select2-selection").addClass("form-field-error")):($(this).removeClass("form-field-error"),"select"==a&&$(this).siblings("span").find(".select2-selection").removeClass("form-field-error"))}),""==b){var e=$(this).find(".email_value");!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(e.val())&&e.length>0?(b=1,d="Enter Valid Email Address!",e.addClass("form-field-error")):e.removeClass("form-field-error")}if(""==b){var f=$(this).find(".email_mobile_value");/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(f.val())&&f.length>0?f.removeClass("form-field-error"):/^([0-9-+]{10})+$/.test(f.val())&&f.length>0?f.removeClass("form-field-error"):f.length>0&&(b=1,d="Enter Valid Email Id or Mobile Number!",f.addClass("form-field-error"))}return""==b&&$(this).find(".form_inputs").each(function(){var a=$.trim($(this).val()),c=parseInt($(this).data("minlength")),e=parseInt($(this).attr("maxlength")),f=$(this).data("name");return a.length<c?(b=1,d=f+" must containes atleast "+c+" characters",$(this).addClass("form-field-error"),!1):a.length>e?(b=1,d=f+" must containes maximum "+e+" characters",$(this).addClass("form-field-error"),!1):void $(this).removeClass("form-field-error")}),""==b&&$(this).find(".form_dec").each(function(){$(this).is(":checked")?($(this).removeClass("form-field-error"),$(this).parents("label").removeClass("form-label-error")):(b=1,d="Please Accept Declaration!",$(this).addClass("form-field-error"),$(this).parents("label").addClass("form-label-error"))}),$(this).find("input,select").hasClass("form-field-error")?(""==d&&(d="Please Provide Valid Information!"),c.removeClass("val_success"),c.addClass("val_error"),$("html,body").animate({scrollTop:$(this).offset().top},500),c.html('<i class="fa fa-times" aria-hidden="true"></i> '+d+" ").fadeIn(350),!1):(b=0,c.fadeOut("fast").html(""),!0)})});