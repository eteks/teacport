<?php include('include/header.php'); ?>
 <?php include('include/menus.php'); ?>    

	<section class="job-breadcrumb">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                    <h3>Terms and Conditions</h3>
                </div> -->
                <div class="col-md-12 col-sm-12 co-xs-12 text-left">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>">Home</a>
                            </li>
                            <li class="active">Latest News</li>
                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>	
	</section>
    <!--Latest News Content-->
    <section class="update_news_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="Heading-title black small-heading">
                                <h3>Latest News</h3>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <!--News Title-->
                            <blockquote> <?php
                            if(!empty($content)) :
                               echo $content['latest_news_title'];
                            else :
                                echo "<p> No content found for this news. </p>";
                            endif;
                            ?>
                            </blockquote>
                            <!--News Content-->
                            <p>
                            <?php
                            if(!empty($content)) :
                               echo $content['latest_news_content_or_link'];
                            else :
                                echo "";
                            endif;
                            ?>
                            </p>
                        </div>    
                    </div>
                </div>
            </div>
    </section>                


<?php include('include/footermenu.php'); ?>
<?php include('include/footer.php'); ?>     
<?php include('include/footercustom.php'); ?>    