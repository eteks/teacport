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
    



}); // End document





