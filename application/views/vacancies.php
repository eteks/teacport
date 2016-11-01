<?php include('templates/header.php') ?>
    <div class="clearfix"></div>
    <div class="search">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                    <div class="input-group">
                        <div class="input-group-btn search-panel">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span id="search_concept">Filter By</span> <span class="caret"></span> </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="index.html#">By Subjects</a></li>
                                <li><a href="index.html#">By Area</a></li>
                                <li><a href="index.html#">By City </a></li>
                                <li><a href="index.html#">By Salary </a></li>
                                <li><a href="index.html#">By Schools</a></li>
                            </ul>
                        </div>
                        <input type="hidden" name="search_param" value="all" id="search_param">
                        <input type="text" class="form-control search-field" name="x" placeholder="Search term...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
                        </span> </div>
                </div>
            </div>
        </div>
    </div>
    <section class="main-section parallex">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-12 col-md-offset-1 col-xs-12 nopadding">
                    <div class="search-form-contaner">
                        <h1 class="search-main-title">Job Searching Portal for all Teachers</h1>
                        <form class="form-inline">
                            <div class="col-md-4 col-sm-4 col-xs-12 nopadding">
                                <div class="form-group">
                                    
                                    <input type="text" class="form-control" name="keyword" placeholder="Search Keyword" value="">
                                    <i class="icon-magnifying-glass"></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
                                <div class="form-group">
                                    <select class="select-category form-control">
                                        <option label="Select Option"></option>
                                        <option value="0">Subjects</option>
                                        <option value="1">Physical Education</option>
                                        <option value="2">Administration</option>
                                        <option value="3">Schools</option>
                                        <option value="4">Salary</option>
                                        <option value="7">Others</option>
                                     </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
                                <div class="form-group">
                                    <select class="select-location form-control">
                                        <option value="">&nbsp;</option>
                                        <option value="0">TamilNadu</option>
                                        <option value="1">Pudhuchery</option>
                                        <option value="2">Karaikal</option>
                                        <option value="3">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                <div class="form-group form-action">
                                    <button type="button" class="btn btn-default btn-search-submit">Search <i class="fa fa-angle-right"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--jobs-list-->
    <section class="cat-tabs cat-tab-index-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="cat-title">Browse Jobs</div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading"> 
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li> <a href="index.html#tab1" data-toggle="tab"><i class="icofont icon-ribbon"></i><span class="hidden-xs hidden-sm">By All</span></a> </li>
                                    <li> <a href="index.html#tab2" data-toggle="tab"><i class="icofont icon-layers"></i><span class="hidden-xs hidden-sm">By Subjects</span></a> </li>
                                    <li class="active"> <a href="index.html#tab3" data-toggle="tab"><i class="icofont icon-global"></i><span class="hidden-xs hidden-sm">By City</span></a> </li>
                                    <li> <a href="index.html#tab4" data-toggle="tab"><i class="icofont icon-linegraph"></i><span class="hidden-xs hidden-sm">By Salary</span></a> </li>
                                    <li> <a href="index.html#tab5" data-toggle="tab"><i class="icofont icon-briefcase"></i><span class="hidden-xs hidden-sm">By Schools</span></a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane tab-pane animated fadeInUp" id="tab1" >
                                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/1.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Botany Teacher</div>
                                                    </a> <a href="index.html#"><span class="comp-name">conversi higher sec school</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> Chengalpattu </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-full-time-color"> <i class="fa fa-clock-o"></i> Full time </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <a href="<?php echo base_url(); ?>singlejob/"><button class="btn btn-primary btn-custom">Apply Now</button></a>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/1.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title">Wanted Zoology Teachers</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Edu-Ma International Public School</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6 ">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> Chennai </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-part-time-color"> <i class="fa fa-clock-o"></i> Part Time </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/1.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Looking for Physical Education Instructor</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Tiripuraneni Vidyala</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> Villupuram </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-remote-color"> <i class="fa fa-clock-o"></i> Remote </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/1.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title">Wanted Tamil Pullavar</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Aurobindo Vidyala Matric school</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> Puducherry </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-intern-color"> <i class="fa fa-clock-o"></i> Internship </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane animated fadeInDown" id="tab2">
                                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/1.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Looking for Drawing & Music Teachers</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Beb &amp; Ben International Public school</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> Cuddalore </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-remote-color"> <i class="fa fa-clock-o"></i> Remote </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <a href="<?php echo base_url(); ?>singlejob/"><button class="btn btn-primary btn-custom">Apply Now</button></a>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/5.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Wanted Assistant Principal</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Kendralaya Public School</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i>Anna Nagar, Chennai</div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-full-time-color"> <i class="fa fa-clock-o"></i> Full time </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/3.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Senior Lab Assiatant for Chemistry</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Radhakrishnan Memorial School</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> Tiruchengode </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-intern-color"> <i class="fa fa-clock-o"></i> Internship </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/4.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title">Wanted Hindi & french Teachers</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Aurobindo Vidhyalaya Kindergarden</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> pudhuchery </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-part-time-color"> <i class="fa fa-clock-o"></i> Part Time </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active animated fadeInLeft" id="tab3">
                                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/1.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Looking for Drawing & Music Teachers</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Beb &amp; Ben International Public school</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> Cuddalore </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-remote-color"> <i class="fa fa-clock-o"></i> Remote </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <a href="<?php echo base_url(); ?>singlejob/"><button class="btn btn-primary btn-custom">Apply Now</button></a>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/5.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Wanted Assistant Principal</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Kendralaya Public School</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i>Anna Nagar, Chennai</div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-full-time-color"> <i class="fa fa-clock-o"></i> Full time </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/3.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Senior Lab Assiatant for Chemistry</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Radhakrishnan Memorial School</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> Tiruchengode </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-intern-color"> <i class="fa fa-clock-o"></i> Internship </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/4.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title">Wanted Hindi & french Teachers</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Aurobindo Vidhyalaya Kindergarden</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> pudhuchery </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-part-time-color"> <i class="fa fa-clock-o"></i> Part Time </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane animated fadeInRight" id="tab4">
                                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                    	<div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/4.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title">Wanted Hindi & french Teachers</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Aurobindo Vidhyalaya Kindergarden</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> pudhuchery </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-part-time-color"> <i class="fa fa-clock-o"></i> Part Time </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <a href="<?php echo base_url(); ?>singlejob/"><button class="btn btn-primary btn-custom">Apply Now</button></a>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/1.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Looking for Drawing & Music Teachers</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Beb &amp; Ben International Public school</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> Cuddalore </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-remote-color"> <i class="fa fa-clock-o"></i> Remote </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/5.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Wanted Assistant Principal</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Kendralaya Public School</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i>Anna Nagar, Chennai</div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-full-time-color"> <i class="fa fa-clock-o"></i> Full time </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/3.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Senior Lab Assiatant for Chemistry</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Radhakrishnan Memorial School</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> Tiruchengode </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-intern-color"> <i class="fa fa-clock-o"></i> Internship </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane animated fadeInUp" id="tab5">
                                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                    	<div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/3.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Senior Lab Assiatant for Chemistry</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Radhakrishnan Memorial School</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> Tiruchengode </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-intern-color"> <i class="fa fa-clock-o"></i> Internship </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <a href="<?php echo base_url(); ?>singlejob/"> <button class="btn btn-primary btn-custom">Apply Now</button></a>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/1.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Looking for Drawing & Music Teachers</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Beb &amp; Ben International Public school</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> Cuddalore </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-remote-color"> <i class="fa fa-clock-o"></i> Remote </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/5.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Wanted Assistant Principal</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Kendralaya Public School</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i>Anna Nagar, Chennai</div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-full-time-color"> <i class="fa fa-clock-o"></i> Full time </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/4.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title">Wanted Hindi & french Teachers</div>
                                                    </a> <a href="index.html#"><span class="comp-name">Aurobindo Vidhyalaya Kindergarden</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> pudhuchery </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-part-time-color"> <i class="fa fa-clock-o"></i> Part Time </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding  hidden-xs hidden-sm">
                                                <div class="comp-logo"> <img src="images/company/1.png" class="img-responsive" alt="scriptsbundle"> </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="job-title-box"> <a href="index.html#">
                                                    <div class="job-title"> Technical Network Director</div>
                                                    </a> <a href="index.html#"><span class="comp-name">conversi Pvt. Ltd. Australia</span></a> </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-location"> <i class="fa fa-location-arrow"></i> Melbourne </div>
                                            </div>
                                            <!-- <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="job-type jt-part-time-color"> <i class="fa fa-clock-o"></i> Part Time </div>
                                            </div> -->
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button class="btn btn-primary btn-custom">Apply Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!---#tab-5-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include('templates/footer-normal.php') ?>    