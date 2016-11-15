// $(document).ready(function() {

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


// }); // End document