<?php 
    include('include/header.php');
    include('include/menus.php');   
    // echo "<pre>"; print_r($initial_data); echo "</pre>";
    // echo "<pre>"; print_r($organization); echo "</pre>";
?>
<section class="job-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                <h3>Inbox</h3>
            </div>
            <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a> </li>
                        <li><a href="<?php echo base_url(); ?>job_seeker/dashboard">Dashboard</a> </li>
                        <li class="active">Inbox</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="dashboard-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="profile-card">
                        <div class="banner">
                            <img src="images/building.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="user-image">
                            <img src="images/users/profile-avatar.jpg" class="img-responsive img-circle" alt="">
                        </div>
                        <div class="card-body">
                            <h3>Mrs. Emilly Copper</h3>
                            <span class="title">A web Designer</span>
                        </div>
                        <ul class="social-network social-circle onwhite">
                            <li><a href="user-followed-companies.html#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="user-followed-companies.html#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="user-followed-companies.html#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="user-followed-companies.html#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <?php include('include/user_dashboard_sidemenu.php'); ?>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="heading-inner first-heading">
                        <p class="title">Your Inbox</p>
                        <?php 
                            if(!empty($message)) {
                                echo "<input type='hidden' class='seeker_inbox_last_id' value='".$message[0]['candidate_inbox_id']."'>";
                           }
                        ?>
                    </div>
                    <div class="resume-list">
                        <div class="table-responsive">
                            <table class="table table-striped" id="seeker_inbox_data">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th><input type="checkbox" class="seeker_inbox_all_check" /> All</th>
                                        <th> Organization</th>
                                        <th> Job </th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($message)) :
                                        foreach ($message as $msg) :
                                            $meassage_received_date_time = $msg['candidate_inbox_created_date'];
                                        $meassage_received_date = date("d/m/Y h:i a", strtotime($meassage_received_date_time));
                                    ?>
                                    <tr class="" data-name="<?php if($msg['is_viewed'] == 0) echo 'bold_section'; ?>">
                                        <td><input type="checkbox" class="seeker_inbox_check" value="<?php echo $msg['candidate_inbox_id']; ?>" /></td>
                                        <td><span> <?php echo $msg['organization_name']; ?> </span></td>
                                        <td><span> <?php echo $msg['vacancies_job_title']; ?> </span></td>
                                        <td><a class="btn view_inbox_details" data-toggle="modal" data-target="#user_inbox_msg_act"  data-value="<?php echo $msg['candidate_inbox_id']; ?>" data-backdrop="static" data-keyboard="false"> <?php echo $msg['candidate_inbox_message']; ?> </a></td>
                                        <td> <?php echo $meassage_received_date; ?> </td>
                                    </tr>
                                    <?php 
                                    endforeach;
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
	                <!--Popup Message for Inbox message-->
				    <div class="modal fade" id="user_inbox_msg_act" role="dialog">
    				    <div class="modal-dialog">
    					    <!-- Modal content-->
    					    <div class="modal-content">
    					     	<div class="modal-header">
    					            <button type="button" class="close" data-dismiss="modal">&times;</button>
    						        <h4 class="modal-title">Message</h4>
    							</div>
    						    <div class="modal-body">
                                    <div id="seeker_inbox_msg">
                                        <!--Organization Profile-->
                                        <div class="row">
                                            <h5> Organization Profile</h5>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4">Name of the Organization</span>
                                                <span class="col-sm-1"> : </span>
                                                <div class="col-sm-7 org_name inbox_popup_data"></div>
                                            </div>                                          
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Organization Address - 1 </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 org_addr1 inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4">Organization Address - 2 </span>
                                                <span class="col-sm-1"> : </span>
                                                <div class="col-sm-7 org_addr2 inbox_popup_data"></div>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4">Organization Address - 3 </span>
                                                <span class="col-sm-1"> : </span>
                                                <div class="col-sm-7 org_addr3 inbox_popup_data"></div>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4">Organization District </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 org_dis inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Registrant Name  </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 reg_name inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Registrant Designation</span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 reg_desig inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Registrant Mail  </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 reg_mail inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Registrant Mobile </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 reg_mob inbox_popup_data"></span>
                                            </div>
                                        </div> <br> <!---End organization profile-->    
                                        <!--Vacancy Details-->
                                        <div class="row">
                                            <h5>Vacancy Details</h5>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4">Job Title</span>
                                                <span class="col-sm-1"> : </span>
                                                <div class="col-sm-7 vac_title inbox_popup_data"></div>
                                            </div>                                          
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4">Vacancy Available</span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 vac_ava inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Vacancy Start Date </span>
                                                <span class="col-sm-1"> : </span>
                                                <div class="col-sm-7 vac_sdate inbox_popup_data"></div>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Vacancy End Date </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 vac_edate"></span>
                                            </div>
                                        </div> <br> <!---End vacancy details--> 
                                    </div> <!--#pro_inbox_msg-->
                                </div> <!--.modal-body-->
    						</div>
    					</div>	
				    </div>
				    <!--End of Popup Message for Inbox message-->
                </div>
            </div>
        </div>
    </div>
</section>
        
         <div class="brand-logo-area clients-bg">
            <div class="clients-list light-blue">
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_2.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_3.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_4.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_2.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_3.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_4.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
            </div>
        </div>

<?php include('include/footermenu.php'); ?>
<?php include('include/footer.php'); ?>          



<script type="text/javascript">

jQuery.fn.dataTable.Api.register('row.addByPos()', function(data, index) {     
    var currentPage = this.page();
    //insert the row 
    this.row.add(data);
    //move added row to desired index
    var rowCount = this.data().length-1,
        insertedRow = this.row(rowCount).data(),
        tempRow;
    for (var i=rowCount;i>=index;i--) {
        tempRow = this.row(i-1).data();
        this.row(i).data(tempRow);
        this.row(i-1).data(insertedRow);
    }     
    //refresh the current page
    this.page(currentPage).draw(false);
}); 


var seeker_inbox_message;
$(document).ready(function(){
    
    seeker_inbox_message = $('#seeker_inbox_data').DataTable( {
        // "order": [],
        "aaSorting": [],
        "ordering": false,
        // "aaSortingFixed": [[0,'asc']],
        "lengthMenu" :  [
                            [5, 25, 50, -1], 
                            [5, 25, 50, "All"]
                        ],
        "pageLength" : 5,
        "language" : {
                        "lengthMenu": "_MENU_ records per page", // Remove show entries text from entries dropdown like "sLengthMenu": "_MENU_ records per page"
                        "zeroRecords": "Nothing found - sorry", // empty table message
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries", // Entries message
                        "infoEmpty": "No records available", // No results message
                        "infoFiltered": "(filtered from _MAX_ total records)", // After filtering, message
                        "search":         "Search:", // Search message
                        "paginate": {  // Change pagination text
                           "previous": "Prev", // Change previous pagination text
                           "next": "Next" // Change next pagination text
                        }
                    },
//                     "columns": [
// { "data": "col1" },
// { "data": "col2" },
// { "data": "col3" },
// { "data": "col4" },
// { "data": "col5" }
// ]

        // "pagingType": "full_numbers"
    });



    seeker_inbox_ajax_message('<?php echo base_url(); ?>','<?php echo $candidate_data['candidate_id'] ?>','<?php echo $this->security->get_csrf_hash(); ?>');
    
    $('.view_inbox_details').on('click',function(){
        var inbox = $(this).attr('data-value');
        var url = '<?php echo base_url(); ?>';
        var csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
        $.ajax({
           type: "POST",
           url: url+"seeker/inbox/fulldata",
           data:{ inbox_id : inbox, csrf_token : csrf},
           cache: false,
           async: false,
           success: function(data) {
                var c = $.parseJSON(data);
                $('#seeker_inbox_msg .org_name').text(c.inbox_data.organization_name);
                $('#seeker_inbox_msg .org_addr1').text(c.inbox_data.organization_address_1);
                $('#seeker_inbox_msg .org_addr2').text(c.inbox_data.organization_address_2);
                $('#seeker_inbox_msg .org_addr3').text(c.inbox_data.organization_address_3);
                $('#seeker_inbox_msg .org_dis').text(c.inbox_data.organization_district_id);
                $('#seeker_inbox_msg .reg_name').text(c.inbox_data.registrant_name);
                $('#seeker_inbox_msg .reg_desig').text(c.inbox_data.registrant_designation);
                $('#seeker_inbox_msg .reg_mail').text(c.inbox_data.registrant_email_id);
                $('#seeker_inbox_msg .reg_mob').text(c.inbox_data.registrant_mobile_no); 
           }
       });
    });
});
function mysql_time_to_javascript_time(mysqltime){
    var datetimesplit = mysqltime.split(" ");
    var datesplit = datetimesplit[0].split('-');
    var timesplit = datetimesplit[1].split(':');
    var hour;
    var meridian;
    if(parseInt(timesplit[0]) > 12)
    {
        hour = parseInt(timesplit[0])-12;
        meridian = 'pm';
    }
    else
    {
        hour = parseInt(timesplit[0]);
        meridian = 'pm';
    }
    return datesplit[2]+'/'+datesplit[1]+'/'+datesplit[0]+' '+hour+':'+timesplit[1]+' '+meridian
}
// function mysql_date_format_to_javascript_format(date){
//     var datesplit = date.split('-');
//     return datesplit[2]+'/'+datesplit[1]+'/'+datesplit[0]
// }
    function seeker_inbox_ajax_message(url,id,csrf){
        var lastmessageid = $('.seeker_inbox_last_id').length > 0 ? parseInt($(document).find('.seeker_inbox_last_id').val()):0;
        var message = $.ajax({
            type: "POST",
            url: url+"seeker/inbox/message",
            data : { cand_id : id , csrf_token : csrf,lastid: lastmessageid},
            dataType: 'json',
            async: false
        }).complete(function(){
            setTimeout(function(){seeker_inbox_ajax_message(url,id,csrf);}, 10000);
        }).responseText;
        var json_data = $.parseJSON(message);
        var retrivedatacount = json_data.length;
        if(retrivedatacount > 0){
            var new_row;
            $.each(json_data, function(i){
            // var inbox_id_increase = parseInt(lastmessageid)+1;
            var converted_time = mysql_time_to_javascript_time(json_data[i].candidate_inbox_created_date);


            // First method

            // if(json_data[i].is_viewed == 0) {
            //     new_row = $('<tr data-name="bold_section"></tr>');
            // }
            // else {
            //     new_row = $('<tr></tr>');
            // }
            // new_row.append('<td><input type="checkbox" class="seeker_inbox_check" value="'+json_data[i].candidate_inbox_id+'" /></td>')
            // .append('<td> <span> '+json_data[i].organization_name+' </span> </td>')
            // .append('<td> <span> '+json_data[i].vacancies_job_title+' </span></td>')
            // .append('<td><a class="btn" data-toggle="modal" data-target="#user_inbox_msg_act"  data-backdrop="static" data-keyboard="false"> '+json_data[i].candidate_inbox_message+' </a></td>')
            // .append('<td>2014-05-09</td>');
            // seeker_inbox_message.row.add(new_row);
            // $('#seeker_inbox_data tbody').prepend(new_row);
            
            // second method

            seeker_inbox_message.row.addByPos(['<input type="checkbox" class="seeker_inbox_check" value="'+json_data[i].candidate_inbox_id+'" >','<span>'+json_data[i].organization_name+'</span>','<span>'+json_data[i].vacancies_job_title+'</span>','<a class="btn" data-toggle="modal" data-target="#user_inbox_msg_act"  data-backdrop="static" data-value=""'+json_data[i].candidate_inbox_id+'"" data-keyboard="false"> '+json_data[i].candidate_inbox_message+' </a>',converted_time],1);

                // seeker_inbox_message.row.addByPos(['<input type="checkbox" class="provider_inbox_id" data-msg-id ="'+inbox_id_increase+'">',json_data[i].candidate_name,'<a class="btn" data-toggle="modal" data-target="#applicant_msg_act" data-backdrop="static" data-keyboard="false">Hi, I wish to apply for '+json_data[i].vacancies_job_title+'</a>',converted_time],1);

          
            //  row = seeker_inbox_message.row(1);
            // row.data(v).draw();
             // <tr class="" data-name="<?php 
             // if($msg['is_viewed'] == 0) echo 'bold_section'; ?>">
             //                            " /></td>
             //                            <td><span> <?php
              // echo $msg['organization_name']; ?> </span></td>
             //                            <td><span> <?php 
             // echo $msg['vacancies_job_title']; ?> </span></td>
             //                            <td><a class="btn" data-toggle="modal" data-target="#user_inbox_msg_act"  data-backdrop="static" data-keyboard="false"> <?php 
             // echo $msg['candidate_inbox_message']; ?> </a></td>
             //                            <td> <?php 
             // echo $meassage_received_date; ?> </td>
             //                        </tr>
                // row += $('<tr> <td><input type="checkbox" class="seeker_inbox_check" value="'+json_data[i].candidate_inbox_id+'" </td> <td><span> '+json_data[i].organization_name+' </span></td><td><a class="btn" data-toggle="modal" data-target="#user_inbox_msg_act"  data-backdrop="static" data-keyboard="false"> '+json_data[i].candidate_inbox_message+' </a></td><td>12-10-17</td> </tr>');
                // var table1 =         seeker_inbox_message.row.add( {
//         "col1":       "Tiger Nixon",
//         "col2":     "$3,120",
//         "col3": "2011/04/25",
//         "col4":     "Edinburgh",
//         "col5":       "5421"
//     } ).draw();


            });   
            seeker_inbox_message.draw();        

            // seeker_inbox_message.row.add(row);
            // $('#seeker_inbox_data tbody').prepend(row);
    
// var table1 =         seeker_inbox_message.row.add( {
//         "col1":       "Tiger Nixon",
//         "col2":     "$3,120",
//         "col3": "2011/04/25",
//         "col4":     "Edinburgh",
//         "col5":       "5421"
//     } ).draw();
//             // index = table1.column(1).data().indexOf(v.id);
//             table1.row(1);
    

            // $(document).find('.seeker_inbox_last_id').val(lastmessageid+retrivedatacount);
        }
        




    }
</script>