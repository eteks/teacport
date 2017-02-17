<?php
    tcpdf();
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $title = "Templated Resume";
    $obj_pdf->SetTitle($title); 
    $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, "");
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $obj_pdf->SetFont('helvetica', '', 9);
    $obj_pdf->setFontSubsetting(false);
    $obj_pdf->AddPage();
    ob_start();
?>
<style>
    .resume-block {
        font-family: helvetica;
        font-size: 12px;
    }
    span.orange {
        color: #f47020;
    } 
    span.bold {
        font-weight: bold;
    }
    span.unbold {
        font-weight: normal;
    }

    h3.resume-sub-title {
        font-weight: bold;
    }
    td.heading,th.heading {
        font-size: 10pt;
        font-weight: normal;
        color: #f47020;
    }
    td.content {
        font-size: 10pt;
        font-weight: normal;
        color: #00a5ef;
    }
    table.profile_table {
        border : 1px solid #ddd;
    }
    tr.odd {
        background-color: #f2f2f2;
    }
</style>
<img src="<?php echo $candidate_details[0]['candidate_image_path']; ?>" height="90" width="90" />
<h2><span class="unbold"> <?php echo $candidate_details[0]['candidate_name']; ?> </span> </h2>
<h4><span class="orange">Candidate ID : </span> <?php echo sprintf("%010d",$candidate_details[0]['candidate_id']); ?></h4>
<hr/> 
<!-- Personal Profile -->
<h3 class="resume-sub-title">Personal Profile</h3>
<table cellpadding="6" cellspacing="3">
    <tr>
        <td width="50%" class="heading"> Candidate Name </td>
        <td width="50%" class="content"> <?php echo $candidate_details[0]['candidate_name']; ?> </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Gender </td>
        <td width="50%" class="content"> <?php echo ucfirst($candidate_details[0]['candidate_gender']); ?> </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Date of Birth </td>
        <td width="50%" class="content"> <?php echo date('d M Y',strtotime($candidate_details[0]['candidate_date_of_birth'])); ?> </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Father's Name </td>
        <td width="50%" class="content"> <?php echo $candidate_details[0]['candidate_father_name']; ?> </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Marital Status </td>
        <td width="50%" class="content"> <?php echo $candidate_details[0]['candidate_marital_status']; ?> </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Native State </td>
        <td width="50%" class="content"> <?php echo ucfirst($candidate_details[0]['state_name']); ?> </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Native District </td>
        <td width="50%" class="content"> <?php echo ucfirst($candidate_details[0]['district_name']); ?> </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Mother Tongue </td>
        <td width="50%" class="content"> <?php echo ucfirst($candidate_details[0]['language_name']); ?> </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Languages Known </td>
        <td width="50%" class="content"> <?php 
            $known_lang = explode(',',$candidate_details[0]['candidate_language_known']);
            $i = 1;
            foreach ($known_languages as $lan_key => $lan_val) {
               if(in_array($lan_val['language_id'],$known_lang)) {
                    echo $lan_val['language_name'];
                    if($i < count($known_lang)) {
                        echo ",";
                    }
                    $i++;
               }
            }
            ?> 
        </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Nationality </td>
        <td width="50%" class="content"> <?php echo ucfirst($candidate_details[0]['candidate_nationality']); ?> </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Religion </td>
        <td width="50%" class="content"> <?php echo ucfirst($candidate_details[0]['candidate_religion']); ?> </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Communal Category </td>
        <td width="50%" class="content"> <?php 
            $community = unserialize(COMMUNAL);
            echo $community[$candidate_details[0]['candidate_community']]; 
            ?>
        </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Physically Challenged </td>
        <td width="50%" class="content"> <?php if($candidate_details[0]['candidate_is_physically_challenged']=="yes") echo "Yes"; else echo "No"; ?> </td>
    </tr>
</table>
<!-- Post Preference -->
<h3 class="resume-sub-title">Post Preference</h3>
<table cellpadding="6" cellspacing="3">
    <tr>
        <td width="50%" class="heading"> Posts applying for </td>
        <td width="50%" class="content"> <?php 
            $pos = explode(',',$candidate_details[0]['candidate_posting_applied_for']);
            $i = 1;
            foreach ($posting_values as $pos_key => $pos_val) {
               if(in_array($pos_val['posting_id'],$pos)) {
                    echo $pos_val['posting_name'];
                    if($i < count($pos)) {
                        echo ",";
                    }
                    $i++;
               }
            }
            ?>
        </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Class Prefrences </td>
        <td width="50%" class="content"> <?php 
            $cls = explode(',',$candidate_details[0]['candidate_willing_class_level_id']);
            $i = 1;
            foreach ($class_values as $cls_key => $cls_val) {
               if(in_array($cls_val['class_level_id'],$cls)) {
                    echo $cls_val['class_level'];
                    if($i < count($cls)) {
                        echo ",";
                    }
                    $i++;
               }
            }
            ?>
        </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Subject preferences </td>
        <td width="50%" class="content"> <?php 
            $sub = explode(',',$candidate_details[0]['candidate_willing_subject_id']);
            $i = 1;
            foreach ($subject_values as $sub_key => $sub_val) {
               if(in_array($sub_val['subject_id'],$sub)) {
                    echo $sub_val['subject_name'];
                    if($i < count($sub)) {
                        echo ",";
                    }
                    $i++;
               }
            }
            ?>
        </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Minimum Salary </td>
        <td width="50%" class="content"> <?php echo $candidate_details[0]['candidate_expecting_start_salary']; ?> </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Maximum Salary </td>
        <td width="50%" class="content"> <?php echo $candidate_details[0]['candidate_expecting_end_salary']; ?> </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Work Type </td>
        <td width="50%" class="content"> <?php echo ucfirst($candidate_details[0]['candidate_type']); ?> </td>
    </tr>
</table>
<!-- Education Profile -->
<h3 class="resume-sub-title">Educational Profile</h3>
<table cellpadding="6" cellspacing="3">
    <tr>
        <td width="50%" class="heading"> Have you passed in Teacher Eligibility Test </td>
        <td width="50%" class="content"> <?php if($candidate_details[0]['candidate_tet_exam_status']=="1") echo "Yes"; else echo "No"; ?> </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Extra Curricular skills </td>
        <td width="50%" class="content"> <?php 
            $ext = explode(',',$candidate_details[0]['candidate_extra_curricular_id']);
            $i = 1;
            foreach ($extra_curricular_values as $ext_key => $ext_val) {
               if(in_array($ext_val['extra_curricular_id'],$ext)) {
                    echo $ext_val['extra_curricular'];
                    if($i < count($ext)) {
                        echo ",";
                    }
                    $i++;
               }
            }
            ?>
        </td>
    </tr>
</table>
<table class="profile_table" cellpadding="6">
    <tr>
        <th class="heading"> Qualification </th>
        <th class="heading"> YOP </th>
        <th class="heading"> Medium </th>
        <th class="heading"> Department </th>
        <th class="heading"> Board </th>
        <th class="heading"> Percentage </th>
    </tr>
    <?php
    $i = 1;
    foreach ($candidate_details[0]['education_details'] as $edu_key => $edu_val) :
    if($i % 2 == 0) {
        $class = "even";
    }
    else {
        $class = "odd";
    }
    ?>
    <tr class="<?php echo $class; ?>">
        <td class="content"> <?php echo $edu_val['edu_qualification']; ?> </td>
        <td class="content"> <?php echo $edu_val['candidate_education_yop']; ?> </td>
        <td class="content"> <?php echo $edu_val['edu_medium']; ?> </td>
        <td class="content"> <?php echo (!empty($edu_val['edu_department']) ? $edu_val['edu_department']:'-'); ?> </td>
        <td class="content"> <?php echo $edu_val['edu_board']; ?> </td>
        <td class="content"> <?php echo $edu_val['candidate_education_percentage']; ?> </td>
    </tr>
    <?php
    $i++;
    endforeach;
    ?>
</table>   
<!-- Professional Profile  -->
<h3 class="resume-sub-title">Professional Profile</h3>
<table cellpadding="6" cellspacing="3">
    <tr>
        <td width="50%" class="heading"> Fresh Candidate </td>
        <td width="50%" class="content"> <?php if($candidate_details[0]['candidate_is_fresher']=="1") echo "Yes"; else echo "No"; ?> </td>
    </tr>
</table>
<?php
if($candidate_details[0]['candidate_is_fresher']==0 && !empty($candidate_details[0]['experience_details'])) :
?>
<table class="profile_table" cellpadding="6">
    <tr>
        <th class="heading"> Class Level </th>
        <th class="heading"> Subject </th>
        <th class="heading"> Board </th>
        <th class="heading"> No.of Years </th>
    </tr>
    <?php
    $i = 1;
    foreach ($candidate_details[0]['experience_details'] as $exp_key => $exp_val) :
    if($i % 2 == 0) {
        $class = "even";
    }
    else {
        $class = "odd";
    }
    ?>
    <tr class="<?php echo $class; ?>">
        <td class="content"> <?php echo $exp_val['exp_class']; ?> </td>
        <td class="content"> <?php echo $exp_val['exp_subject']; ?> </td>
        <td class="content"> <?php echo $exp_val['exp_board']; ?> </td>
        <td class="content"> <?php echo $exp_val['candidate_experience_year']; ?> </td>
    </tr>
    <?php
    $i++;
    endforeach;
    ?>
</table>
<?php
endif;
?>
<!-- Communication Profile -->
<h3 class="resume-sub-title">Communication Information</h3>
<table cellpadding="6" cellspacing="3">
    <tr>
        <td width="50%" class="heading"> Email ID </td>
        <td width="50%" class="content"> <?php echo $candidate_details[0]['candidate_email']; ?> </td>
    </tr>
    <tr>
        <td width="50%" class="heading"> Mobile No </td>
        <td width="50%" class="content"> <?php echo $candidate_details[0]['candidate_mobile_no']; ?> </td>
    </tr>
</table>
<?php
    $content = ob_get_contents();
    ob_end_clean();
    $obj_pdf->writeHTML($content, true, false, true, false, '');
    $obj_pdf->Output('temp_resume.pdf', 'D'); // Download
    // $obj_pdf->Output('temp_resume.pdf', 'I'); // View
?>