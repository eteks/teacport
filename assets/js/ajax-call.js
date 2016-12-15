$(document).ready(function() {

// 	/*  -- Registration and Login section Start -- */

// // var array = ["aasdsa","dasdfasd","daSDAD","DASDSAD","DDSADA","DSADSB"];
// // array = array.filter(function(value) {
// //     return value.indexOf('D') < 0;
// // });
// // var test=0;
// // $.each(array , function(i, val) { 
// //   test += parseInt(array[i].length); 
// // });

// // alert(test);

/*Added by thangam*/
// 	// Registeration
// 	$('#provider_register_form').on('submit',function(e) {
// 		e.preventDefault();
//         var form_data =  $(this).serializeArray();
//         var this_status = $(this).find('.registration_status');
//         jQuery.ajax({
//         type: "POST",
//         url: baseurl+$(this).attr('action'),
//         data: form_data,
//             success: function(res) {
//                 if (res)
//                 {   
//                     if(res=="success") {
//                       window.location.href = baseurl;
//                     }
//                     else {
//                         this_status.html(res);
//                         this_status.slideDown();
//                     }   
//                 }
//             }
//         });
// 	});    
//     $('#seeker_register_form').on('submit',function(e) {
//         e.preventDefault();
//         var form_data =  $(this).serializeArray();
//         var this_status = $(this).find('.registration_status');
//         jQuery.ajax({
//         type: "POST",
//         url: baseurl+$(this).attr('action'),
//         data: form_data,
//             success: function(res) {
//                 if (res)
//                 {   
//                     if(res=="success") {
//                       window.location.href = baseurl;
//                     }
//                     else {
//                         this_status.html(res);
//                         this_status.slideDown();
//                     }   
//                 }
//             }
//         });
//     });   
//     $('#provider_login_form').on('submit',function(e) {
//         e.preventDefault();
//         var form_data =  $(this).serializeArray();
//         var this_status = $(this).find('.registration_status');
//         jQuery.ajax({
//         type: "POST",
//         url: baseurl+$(this).attr('action'),
//         data: form_data,
//             success: function(res) {
//                 if (res)
//                 {   
//                     if(res=="success") {
//                       window.location.href = baseurl;
//                     }
//                     else {
//                         this_status.html(res);
//                         this_status.slideDown();
//                     }   
//                 }
//             }
//         });
//     });
//     $('#seeker_login_form').on('submit',function(e) {
//         e.preventDefault();
//         var form_data =  $(this).serializeArray();
//         var this_status = $(this).find('.registration_status');
//         jQuery.ajax({
//         type: "POST",
//         url: baseurl+$(this).attr('action'),
//         data: form_data,
//             success: function(res) {
//                 if (res)
//                 {   
//                     if(res=="success") {
//                       window.location.href = baseurl;
//                     }
//                     else {
//                         this_status.html(res);
//                         this_status.slideDown();
//                     }   
//                 }
//             }
//         });
//     });
/*Ended by thangam*/

//     // Forgetten password
//     // $('#forgetten_password').on('submit',function(e) {
//     //     e.preventDefault();
//     //     var form_data =  $(this).serializeArray();
//     //     var this_status = $(this).find('.registration_status');
//     //     jQuery.ajax({
//     //     type: "POST",
//     //     url: baseurl+$(this).attr('action'),
//     //     data: form_data,
//     //         success: function(res) {
//     //             if (res)
//     //             {   
//     //                 this_status.html(res);
//     //                 this_status.slideDown();
//     //             }
//     //         }
//     //     });
//     // });


$(document).on('submit','.seeker_edit_form',function(e) {
	e.preventDefault();
	var form_data = new FormData(this);
	form_data.append('csrf_token',csrf_token_value);
	
	$.ajax({
		type : "POST",
		url : baseurl+"seeker/seeker_edit_form",
		data : form_data,
		contentType: false,
		processData:false,
		success : function(res) {
			if(res == 'success') {
				location.reload();
			}
			else {
				$('.form_error_ajax').text(res);
				
			}
		}

	});




});




}); // End document