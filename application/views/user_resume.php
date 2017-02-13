<?php
    tcpdf();
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $title = "PDF Report";
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

<div class="block-section box-item-details">
    <div class="resume-block">
        <img alt='' src='../../assets/images/candidate.jpg' class='avatar avatar-150 photo' height='150' width='150' />
        <div class="desc">
            <h2><?php echo $candidate_details[0]['candidate_name']; ?></h2>
            <h4>Candidate ID:</h4>
            <h3><?php echo sprintf("%010d",$candidate_details[0]['candidate_id']); ?></h3>
            <h3 class="resume-sub-title"><span>Personal Profile</span></h3>
            <div class="subchild-wrapper">
                <h4>Candidate Name:
                <strong><?php echo $candidate_details[0]['candidate_name']; ?></strong></h4>
                <h4>Gender:
                <strong><?php echo ucfirst($candidate_details[0]['candidate_gender']); ?></strong></h4>
                <h4>Date of Birth:
                <strong><?php echo date('d M Y',strtotime($candidate_details[0]['candidate_date_of_birth'])); ?></strong></h4>
                <h4>Fater's Name:<strong><?php echo $candidate_details[0]['candidate_father_name']; ?></strong>
                </h4>
                <h4>Marital Status:
                <strong><?php echo $candidate_details[0]['candidate_marital_status']; ?></strong></h4>
                <h4>State:
                <strong><?php echo ucfirst($candidate_details[0]['state_name']); ?></strong></h4>
                <h4>Native District:
                <strong><?php echo ucfirst($candidate_details[0]['district_name']); ?></strong></h4>
                <h4>Mother Tongue:
                <strong><?php echo ucfirst($candidate_details[0]['language_name']); ?></strong></h4>
                <h4>Languages Known:
                <strong>
                <?php 
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
                </strong></h4>
                <h4>Nationality:
                <strong><?php echo ucfirst($candidate_details[0]['candidate_nationality']); ?></strong></h4>
                <h4>Religion:
                <strong><?php echo ucfirst($candidate_details[0]['candidate_religion']); ?></strong></h4>
                <h4>Communal Category:
                <strong><?php 
                $community = unserialize(COMMUNAL);
                echo $community[$candidate_details[0]['candidate_community']]; ?></strong></h4>
                <h4>Physically Challenged ?:
                <strong><?php if($candidate_details[0]['candidate_is_physically_challenged']=="yes") echo "Yes"; else echo "No"; ?></strong></h4>
            </div>
            <h3 class="resume-sub-title"><span> Post Preference </span></h3>
            <div class="subchild-wrapper">
                <h4>Posts applying for
                <strong>
                <?php 
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
                </strong></h4>
                <h4>Class Prefrences
                <strong>
                <?php 
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
                </strong></h4>
                <h4>Subject preferences
                <strong>
                <?php 
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
                </strong></h4>
                <h4>Minimum Salary
                <strong><?php echo $candidate_details[0]['candidate_expecting_start_salary']; ?></strong></h4>
                <h4>Maximum Salary
                <strong><?php echo $candidate_details[0]['candidate_expecting_end_salary']; ?></strong></h4>
            </div>
            <h3 class="resume-sub-title"><span>Educational Profile  </span></h3>
            <div class="subchild-wrapper">
                <h4>Have you passed in Teacher Eligibility Test:
                    <strong><?php if($candidate_details[0]['candidate_tet_exam_status']=="1") echo "Yes"; else echo "No"; ?></strong></h4>
                <h4>Extra Curricular skills :
                    <strong>
                    <?php 
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
                    </strong>
                </h4>
                <div style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>Qualification</th>
                                <th>YOP</th>
                                <th>Medium</th>
                                <th>Department</th>
                                <th>Board</th>
                                <th>Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($candidate_details[0]['education_details'] as $edu_key => $edu_val) :
                            ?>
                            <tr>
                                <td> <?php echo $edu_val['edu_qualification']; ?> </td>
                                <td> <?php echo $edu_val['candidate_education_yop']; ?> </td>
                                <td> <?php echo $edu_val['edu_medium']; ?> </td>
                                <td> <?php echo (!empty($edu_val['edu_department']) ? $edu_val['edu_department']:'-'); ?> </td>
                                <td> <?php echo $edu_val['edu_board']; ?> </td>
                                <td> <?php echo $edu_val['candidate_education_percentage']; ?> </td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <h3 class="resume-sub-title"><span> Professional Profile  </span></h3>
            <div class="subchild-wrapper Professional_profile_act">
                <h4>Fresher Candidate:
                <strong><?php if($candidate_details[0]['candidate_is_fresher']=="1") echo "Yes"; else echo "No"; ?></strong></h4>
                <?php
                if($candidate_details[0]['candidate_is_fresher']==0 && !empty($candidate_details[0]['experience_details'])) :
                ?>
                <div style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>Class Level</th>
                                <th>Subject</th>
                                <th>Board</th>
                                <th>No.of Years</th>
                            </tr>
                        </thead> 
                        <tbody>
                        <?php
                        foreach ($candidate_details[0]['experience_details'] as $exp_key => $exp_val) :
                        ?>
                            <tr>
                                <td> <?php echo $exp_val['exp_class']; ?> </td>
                                <td> <?php echo $exp_val['exp_subject']; ?> </td>
                                <td> <?php echo $exp_val['exp_board']; ?> </td>
                                <td> <?php echo $exp_val['candidate_experience_year']; ?> </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </table>
                </div>
                <?php
                endif;
                ?>
            </div>
            <h3 class="resume-sub-title"><span>Communication Information  </span></h3>
            <div class="subchild-wrapper">
                <h4> Email ID :
                <strong><?php echo $candidate_details[0]['candidate_email']; ?></strong></h4>
                <h4> Mobile No. :
                <strong><?php echo $candidate_details[0]['candidate_mobile_no']; ?></strong></h4>
            </div>
        </div>
    </div>
</div><!-- end box item details -->
                    <style type="text/css">

                    /* 2 Typography
                    ----------------------------------------------------------------------------- */
                    h1,
                    h2,
                    h3,
                    h4,
                    h5,
                    h6 {
                        font-family: 'Montserrat', Helvetica, Arial, sans-serif;
                        font-weight: 400;
                        color: #3d454c;
                        line-height: 1.3;
                    }
                    strong {
                        position: absolute;
                        left: 400px;
                        text-align: left;
                        color: #00a5ef;
                        font-size: 18px;
                        font-weight: bold;
                        text-align: justify-all;
                    }
                    h4,th{
                        color: #f47020 !important; 
                    }
                    td{color: #00a5ef;}
                    /* 5.e resume
                    ----------------------------------------------------------------------------- */
                    .resume-block {
                        position: relative;
                        padding-left: 100px;
                    }
                    @media (max-width: 768px) {
                        .resume-block {
                            padding-left: 70px;
                        }
                    }
                    .resume-block .img-profile {
                        position: absolute;
                        left: 0;
                        z-index: 2;
                        top: 0;
                    }
                    @media (max-width: 768px) {
                        .resume-block .img-profile img {
                            width: 50px;
                        }
                    }
                    .resume-block .resume-sub-title {
                        position: relative;
                        left: -30px;
                        margin-top: 20px;
                    }
                    @media (max-width: 768px) {
                        .resume-block .resume-sub-title {
                            left: -15px;
                        }
                    }
                    .resume-block .resume-sub-title span {
                        border: 1px solid #e1e1e1;
                        padding: 15px 30px;
                        -webkit-border-radius: 3px !important;
                        -moz-border-radius: 3px !important;
                        -ms-border-radius: 3px !important;
                        -o-border-radius: 3px !important;
                        border-radius: 3px !important;
                        position: relative;
                        display: inline-block;
                    }
                    @media (max-width: 768px) {
                        .resume-block .resume-sub-title span {
                            padding: 15px 15px;
                        }
                    }
                    .resume-block .resume-sub-title span:before {
                        content: "";
                        left: -30px;
                        top: 50%;
                        height: 1px;
                        background: #e1e1e1;
                        width: 30px;
                        position: absolute;
                    }
                    @media (max-width: 768px) {

                    }
                    .resume-block:before {
                        content: "";
                        position: absolute;
                        left: 40px;
                        width: 1px;
                        border-left: 1px solid #e1e1e1;
                        height: 100%;
                        top: 0;
                    }
                    @media (max-width: 768px) {
                        .resume-block:before {
                            left: 25px;
                        }
                    }
                    .resume-block:after {
                        content: "";
                        position: absolute;
                        left: 30px;
                        width: 20px;
                        height: 20px;
                        border: 1px solid #e1e1e1;
                        bottom: -20px;
                        -webkit-border-radius: 50% !important;
                        -moz-border-radius: 50% !important;
                        -ms-border-radius: 50% !important;
                        -o-border-radius: 50% !important;
                        border-radius: 50% !important;
                    }
                    .subchild-wrapper {
                        border: 1px solid #E1E1E1;
                        padding: 0 30px;
                        margin-top: 20px;
                        margin-bottom: 40px;
                        position: relative;
                        border-radius: 3px;
                    }

                    .subchild-wrapper:after {
                        content: "";
                        position: absolute;
                        background: #E1E1E1;
                        height: 1px;
                        width: 60px;
                        top: 50px;
                        left: -60px;
                    }
                    table {
                        border-collapse: collapse;
                        border-spacing: 0;
                        width: 100%;
                        border: 1px solid #ddd;
                    }
                    th, td {
                        border: none;
                        text-align: left;
                        padding: 8px;
                    }

                    tr:nth-child(even){background-color: #f2f2f2}
                    .resume-block .img-profile img {
                        -webkit-border-radius: 3px !important;
                        -moz-border-radius: 3px !important;
                        -ms-border-radius: 3px !important;
                        -o-border-radius: 3px !important;
                        border-radius: 3px !important;
                        width: 80px;
                    }
                    .Professional_profile_act{height: 230px;}
                    </style>

<?php
        $content = ob_get_contents();
    ob_end_clean();
    $obj_pdf->writeHTML($content, true, false, true, false, '');
    $obj_pdf->Output('output.pdf', 'I');
?>