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
                        <li><a href="<?php echo base_url(); ?>seeker/dashboard">Dashboard</a> </li>
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
                        	<?php if(!empty($message)) {?>
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
                                        foreach ($message as $msg) :
                                            $meassage_received_date_time = $msg['candidate_inbox_created_date'];
                                        $meassage_received_date = date("d/m/Y h:i a", strtotime($meassage_received_date_time));
                                    ?>
                                    <tr class="" data-name="<?php if($msg['is_viewed'] == 0) echo 'bold_section'; ?>">
                                        <td><input type="checkbox" class="seeker_inbox_check" value="<?php echo $msg['candidate_inbox_id']; ?>" /></td>
                                        <td><span> <?php echo $msg['organization_name']; ?> </span></td>
                                        <td><span> <?php echo isset($msg['vacancies_job_title'])?$msg['vacancies_job_title']:'Not mention'; ?> </span></td>
                                        <td><a class="btn view_inbox_details" data-toggle="modal" data-target="#user_inbox_msg_act"  data-value="<?php echo $msg['candidate_inbox_id']; ?>" data-backdrop="static" data-keyboard="false"> <?php echo $msg['candidate_inbox_message']; ?> </a></td>
                                        <td> <?php echo $meassage_received_date; ?> </td>
                                    </tr>
                                    <?php 
                                    	endforeach;
                                    ?>
                                </tbody>
                            </table>
                            <?php } else { ?>
	                        	<h2> No message received ! </h2>
                            <?php } ?>
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
                                                <span class="col-sm-4"> Organization Address </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 org_addr inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4">Organization District </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 org_dis inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Contace person  </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 reg_name inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Contace person Designation</span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 reg_desig inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Contace Mail  </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 reg_mail inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Contace Number </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 reg_mob inbox_popup_data"></span>
                                            </div>
                                        </div> <br> <!---End organization profile-->    
                                        <!--Vacancy Details-->
                                        <div class="row candidate_vacancy_inbox_data">
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
                                                <span class="col-sm-7 vac_edate inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Minimum Salary </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 vac_min_sal date inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Maximum Salary </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 vac_max_sal inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Experience </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 vac_exp inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Interview Start Date </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 vac_int_sdate inbox_popup_data"></span>
                                            </div>
                                            <div class="display_provider_details col-md-12">
                                                <span class="col-sm-4"> Interview End Date </span>
                                                <span class="col-sm-1"> : </span>
                                                <span class="col-sm-7 vac_int_edate inbox_popup_data"></span>
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
<?php
if(!empty($provider_values)) :
?>
<div class="brand-logo-area clients-bg">
    <div class="clients-list">
        <?php
        foreach ($provider_values as $val) :
        if(!empty($val['organization_logo'])) :
        ?>
        <div class="client-logo">
            <a href="#"><img src="<?php echo $val['organization_logo']; ?>" class="img-responsive" alt="Organization Logo" title="<?php echo $val['organization_name']; ?>" /></a>
        </div>
        <?php
        endif;
        endforeach;
        ?>
    </div>
</div>
<?php
endif;
?>
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
       	"aaSorting": [],
		"ordering": false,
    	"pagingType": "full_numbers"
    });
    seeker_inbox_ajax_message('<?php echo base_url(); ?>','<?php echo $candidate_data['candidate_id'] ?>','<?php echo $this->security->get_csrf_hash(); ?>');
    $('.view_inbox_details').on('click',function(){
        var inbox = $(this).attr('data-value');
        $(this).parents('tr').attr('data-name','unbold_section');
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
                // Organization details
                $('#seeker_inbox_msg .org_name').text(c.inbox_data.organization_name);
                $('#seeker_inbox_msg .org_addr').html(c.inbox_data.organization_address_1 + '<br/> ' + c.inbox_data.organization_address_2 + '<br/> ' + c.inbox_data.organization_address_3);
                $('#seeker_inbox_msg .org_dis').text(c.inbox_data.district_name);
                $('#seeker_inbox_msg .reg_name').text(c.inbox_data.registrant_name);
                $('#seeker_inbox_msg .reg_desig').text(c.inbox_data.registrant_designation);
                $('#seeker_inbox_msg .reg_mail').text(c.inbox_data.registrant_email_id);
                $('#seeker_inbox_msg .reg_mob').text(c.inbox_data.registrant_mobile_no); 
                // Vacancy details
                if(c.inbox_data.vacancies_job_title){
	                $('#seeker_inbox_msg .vac_title').text(c.inbox_data.vacancies_job_title);
	                $('#seeker_inbox_msg .vac_ava').html(c.inbox_data.vacancies_available);
	                $('#seeker_inbox_msg .vac_sdate').text(mysql_date_format_to_javascript_format(c.inbox_data.vacancies_open_date));
	                $('#seeker_inbox_msg .vac_edate').text(mysql_date_format_to_javascript_format(c.inbox_data.vacancies_close_date));
	                $('#seeker_inbox_msg .vac_min_sal').text(c.inbox_data.vacancies_start_salary);
	                $('#seeker_inbox_msg .vac_max_sal').text(c.inbox_data.vacancies_end_salary);
	                $('#seeker_inbox_msg .vac_exp').text(c.inbox_data.vacancies_experience); 
	                $('#seeker_inbox_msg .vac_int_sdate').text(mysql_date_format_to_javascript_format(c.inbox_data.vacancies_interview_start_date));
	                $('#seeker_inbox_msg .vac_int_edate').text(mysql_date_format_to_javascript_format(c.inbox_data.vacancies_end_date));
                }
                else{
                	$('.candidate_vacancy_inbox_data').hide();
                }
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
function mysql_date_format_to_javascript_format(date){
    var datesplit = date.split('-');
    return datesplit[2]+'/'+datesplit[1]+'/'+datesplit[0]
}
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
        var last_id = parseInt(json_data[0].candidate_inbox_id);
        $.each(json_data, function(i){
        	var converted_time = mysql_time_to_javascript_time(json_data[i].candidate_inbox_created_date);
        	if(json_data[i].vacancies_job_title){
        		var vacancies_name = json_data[i].vacancies_job_title;
        	}
        	else{
        		var vacancies_name = 'Not mention'; 
        	}
        	seeker_inbox_message.row.addByPos(['<input type="checkbox" class="seeker_inbox_check" value="'+json_data[i].candidate_inbox_id+'" >','<span>'+json_data[i].organization_name+'</span>','<span>'+vacancies_name+'</span>','<a class="btn" data-toggle="modal" data-target="#user_inbox_msg_act"  data-backdrop="static" data-value=""'+json_data[i].candidate_inbox_id+'"" data-keyboard="false"> '+json_data[i].candidate_inbox_message+' </a>',converted_time],1);
        });   
        seeker_inbox_message.draw();    
        $(document).find('.seeker_inbox_last_id').val(lastmessageid+retrivedatacount);    
    }
}
</script>