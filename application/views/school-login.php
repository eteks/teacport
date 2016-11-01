<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ScriptsBundle">
    <title>Recruit Teachers</title>
    <link rel="icon" href="<?php echo base_url(); ?>images/tech-fav.ico" type="image/x-icon">

    <!-- BOOTSTRAPE STYLESHEET CSS FILES -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css">

    <!-- JQUERY MENU -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/mega_menu.min.css">

    <!-- ANIMATION -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/ss/animate.min.css">

    <!-- OWl  CAROUSEL-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/owl.style.css">

    <!-- TEMPLATE CORE CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">

    <!-- FOR THIS PAGE ONLY -->
    <link href="<?php echo base_url(); ?>/css/select2.min.css" rel="stylesheet" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/et-line-fonts.css" type="text/css">

    <!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
    <!-- JavaScripts -->
    <script src="js/modernizr.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="page category-page">
        <div id="spinner">
            <div class="spinner-img"> <img alt="Opportunities Preloader" src="images/loader.gif" />
                <h2>Please Wait.....</h2>
            </div>
        </div>
        <section class="login-page-2 parallex full-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="login">
                            <div class="login_title">
                                <!-- <img src="images/logo-footer.png" alt="logo" class="img-responsive center-block"> -->
                                <p style="font-size: 22px; color: #29AAFE;"><strong><i>Recruit Teachers</i></strong></p>
                                <p style="font-size: 22px; color: #fff;"><strong><i>School Login</i></strong></p>
                            </div>
                            <div class="login_fields">
                                <div class="login_fields__user">
                                    <div class="icon">
                                        <i class="icon-profile-male"></i>
                                    </div>
                                    <input placeholder="Username" type="text">
                                </div>
                                <div class="login_fields_password">
                                    <div class="icon">
                                        <i class="icon-lock"></i>
                                    </div>
                                    <input placeholder="Password" type="password">
                                </div>
                                <div class="login_fields_submit">
                                    <a href="<?php echo base_url(); ?>companydashboard/"><button class="btn btn-default" type="submit">Log In</button></a>
                                    <div class="forgot">
                                        <a href="#">Forget password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="social">
                                <div class="loginbox-or">
                                    <div class="or-line"></div>
                                    <div class="or">OR</div>
                                </div>
                                <ul class="social-network social-circle">
                                    <li><a href="login-2.html#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="login-2.html#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="login-2.html#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="login-2.html#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <a href="<?php echo base_url(); ?>login-2.html#" class="scrollup"><i class="fa fa-chevron-up"></i></a>

        <!-- JAVASCRIPT JS  -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery-2.2.3.min.js"></script>

        <!-- BOOTSTRAP CORE JS -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>

        <!-- JQUERY SELECT --> 
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/select2.min.js"></script> 
    
        <!-- MEGA MENU -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/mega_menu.min.js"></script>

        <!-- JQUERY EASING -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/easing.js"></script>

        <!-- JQUERY COUNTERUP -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/counterup.js"></script>

        <!-- JQUERY WAYPOINT -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/waypoints.min.js"></script>

        <!-- JQUERY REVEAL -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/footer-reveal.min.js"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/owl-carousel.js"></script>

        <!-- CORE JS -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/custom.js"></script>

        <script type="text/javascript">
            $(".full-page").height($(window).height());
            $(window).resize(function() {
                $(".full-page").height($(window).height());
            });
        </script>

    </div>
</body>

</html>