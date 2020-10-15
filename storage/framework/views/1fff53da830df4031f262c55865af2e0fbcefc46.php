<?php 
$school= App\SmGeneralSettings::find(1);
?> 
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <title> <?php echo e(isset($school->site_title)? $school->site_title: 'Infix Edu | School Management System '); ?> </title>
<link rel="icon" href="<?php echo e(url('/')); ?>/<?php echo e(isset($school->favicon)?$school->favicon:''); ?>" type="image/png"/>

<meta name="description" content="Infix is 100+ unique feature enable school management software system. It can manage all type of school, academy and any educational institution. ">
<meta name="keywords" content="School Management Software, School Management System, School ERP software, school ERP system, Academy management software">
<meta name="ahrefs-site-verification" content="578d1aa1e01051e3ac46df77d602eb6846f676a092e33c9befa5ce2395403bd2">
<meta name="google-site-verification" content="oXBw6wz6Ie5UTDB4h1JRUXHDZE2n-uGO2lm1HVYcA-c" />
<style type="text/css">
.custome-button{ 
    padding: 5px 40px !important;
    border: 1px solid #c738d8 !important;
    border-radius: 20px !important; 
    margin: 0 auto;
    font-size: 16px !important;
    background-image: linear-gradient(to left, #7c32ff 0%, #c738d8 50%, #7c32ff 100%);
    color: white !important;
    background-size: 200% auto;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
    }
    .custome-button:hover{
          background-position: right center;
    }

    .features-list li{
        list-style: none !important;
        padding-left: 0 !important;
        margin: 10px 0;

    }
    .features-list {
        padding: 0;
        margin: 0;
        margin-top: 25px;
    }
    .single_feature_icon{
        display: block;
    }
.features-list li {
    text-align: left;
    padding-left: 25px;
    font-size: 15px;
    line-height: 20px;
    list-style: inside;
}

.price .single_feature_part {
    background-color: #fff;
    border-radius: 5px;
    text-align: center;
    padding: 100px 20px 87px;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    display: flex;
    height: 500px;
    align-items: center;
    justify-content: center;
}
.price{
    background: #e4d9f9;
    background-image:none !important;
}
.info_item {
    position: relative;
    padding-left: 30px;
    margin-bottom: 25px;
}

.info_item i {
    position: absolute;
    left: 0;
    top: 2px;
}

.info_item h6 a {
    color: #415094;
}
 .contact_form label {
    margin-bottom: 1.5rem;
    padding-top: 10px;
}
</style> 
<script type="application/ld+json">
[ {
  "@context" : "http://schema.org",
  "@type" : "SoftwareApplication",
  "name" : "INFIX - Best School Management software system",
  "url" : "http://infixedu.com/",
  "author" : {
    "@type" : "Company",
    "name" : "Spondon IT"
  },
  "datePublished" : "2019-05-28",
  "publisher" : {
    "@type" : "School Management ERP software",
    "name" : "Infix"
  },
  "applicationCategory" : "ERP Software",
  "downloadUrl" : "http://infixedu.com",
  "operatingSystem" : "2019",
  "requirements" : "in a complete",
  "screenshot" : "http://infixedu.com/public/landing/img/dashboard_preview.png",
  "softwareVersion" : "2.0",
  
  "review" : {
    "@type" : "Review",
    "reviewRating" : {
      "@type" : "Rating",
      "ratingValue" : "5",
      "bestRating" : "5",
      "worstRating" : ""
    },
    "reviewBody" : "Query\n                                Account"
  }
} ]
</script>

 
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:site" content="@InfixEdu"/>
        <meta name="twitter:creator" content="@InfixEdu"/>
        <meta name="twitter:url" content="//infix.com/"/>
        <meta name="twitter:title" The Ultimate Education Management System For School, College, Institute & Academy"/>
        <meta name="twitter:description" content="Infix is a well known School management system and its ERP based Software. So try the free demo today!. Cause Infix offers 100+  featured, well-documented and latest academic management software system.. By this multipurpose software system, you can easily manage your school, college, university or any kind of organization educational institute. So we can provide you speedy, Secure and clean coded Flexible academy and school management system at affordable prices!"/>
        <meta property="og:image" content="http://infixedu.com/public/landing/img/dashboard_preview.png"/>


        <!-- Open Graph data -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="//infixedu.com/"/>
        <meta property="og:image" content="//infixedu.com/public/landing/img/dashboard_preview.png"/>
        <meta property="og:title" content="School Management ERP Software & School Management System - Infix"/>

        <meta property="og:description" content="Infix is a well known School management system and its ERP based Software. So try the free demo today!. Cause Infix offers 100+  featured, well-documented and latest academic management software system.. By this multipurpose software system, you can easily manage your school, college, university or any kind of organization educational institute. So we can provide you speedy, Secure and clean coded Flexible academy and school management system at affordable prices!"/>
        <meta property="og:site_name" content="Infix" />

    <link rel="canonical" href="http://infixedu.com" hreflang="en-us" />

    <link rel="icon" href="<?php echo e(asset('public/landing/img/favicon.png')); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/landing/css/bootstrap.min.css')); ?>">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/landing/css/animate.css')); ?>">
    <!-- themify CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/landing/css/themify-icons.css')); ?>">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/landing/css/magnific-popup.css')); ?>">
    <!-- style CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/landing/css/style.css')); ?>">

</head>

<body>
        <!--::header part start::-->
    <section class="main_menu" id="sticky_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?php echo e(url('/')); ?>"> 
                            <img src="<?php echo e(asset($school->logo)); ?>" alt="logo" style="height: 80px"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse main-menu-item justify-content-center"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?php echo e(url('/login')); ?>" target="_blank" >Demo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="#modulus">Modules</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="#Components">Features</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="#Support">Support</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="#Price">Price</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="#Contact">Contact</a>
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link" href="<?php echo e(url('/login')); ?>" target="_blank" >LOGIN</a> 
                                </li> 
                                
                            </ul>
                        </div>
                    <a class="btn_1 d-none d-lg-block" target="_blank" href="<?php echo e(url('parentregistration/registration')); ?>" style="margin-right: 10px">Student Signup</a>
                        <a class="btn_1 d-none d-lg-block pl-10" target="_blank" href="<?php echo e(url('institution-register-new')); ?>"> School Signup</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Header part end-->
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>The Ultimate Education Management System for School, Institute & Academy </h1>
                            <p>Managing various administrative tasks in one place is now quite easy and time
                                savior with this INFIX and Give your valued time to your institute that will
                                increase next generation productivity for our society.</p>
                            <a id="play-video_1" class="btn_1 popup-youtube" href="#"> <i class="ti-control-play"></i> 
                                Video Overview</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->



    <!-- feature_part start-->
    <section class="feature_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-8">
                    <div class="section_tittle text-center">
                        <h5>Amazing Features</h5>
                        <h2>Some Features that make
                            Us Proud</h2>
                        <p>Looking forward to something different & unique! Here we are with few that never expected in
                            others. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-layout-grid3"></i></span>
                            <h4>Tons of Features</h4>
                            <p>INFIX has all in one place. You’ll find everything what you are looking into education
                                management system software. </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-layout-media-overlay"></i></span>
                            <h4>User Friendly Interface</h4>
                            <p>We care! User will never bothered in our real eye catchy user friendly UI & UX  Interface design.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-layers"></i></span>
                            <h4>Proper Documentation</h4>
                            <p>You know! Smart Idea always comes to well planners. And Our INFIX is Smart for its Well
                                Documentation.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-headphone-alt"></i></span>
                            <h4>Powerful Support</h4>
                            <p>Explore in new support world! It’s now faster & quicker. You’ll
                                find us on Support Ticket, Email, Skype, WhatsApp.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature_part part start-->

    <!-- learning part start-->
    <section class="video_section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 col-lg-7">
                    <div class="video_section_img">
 
                        <img src="<?php echo e(asset('public/landing/img/vodeo_bg.png')); ?>" alt="">
                        <div class="intro_video_icon">
                            <a id="play-video_1" class="video-play-button popup-youtube"
                                href="https://www.youtube.com/watch?v=DhZ6p_tYnpk"> 
                                <span class="ti-control-play"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5">
                    <div class="video_section_text">
                        <h2>Take A look Our INFIX Overview in Video</h2>
 
                        <img src="<?php echo e(asset('public/landing/img/Line.png')); ?>" alt=""> 
                        <p>What’s query you have in mind? How it works? Have look a Look in our videos you’ll crystal
                            clear about it.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- learning part end-->

    <!-- feature_part start-->
    <section class="all_feature" id="modulus">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-8">
                    <div class="section_tittle text-center">
                        <h5>Complete Package</h5>
                        <h2>Every Single Module You Want That Are Available</h2>
                        <p>Curiosity is future of new discover. Explore all our single modules that will blow your mind!
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="dashboard_img">
 
                        <img src="<?php echo e(asset('public/landing/img/dashboard_preview.png')); ?>" alt=""> 
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-medall"></i></span>
                            <h4>Admin Module</h4>
                            <p>Managing other accounts,
                                Manage Teacher, Student, Guardian etc
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-id-badge"></i></span>
                            <h4>Student Info </h4>
                            <p>Student Admission,
                                Student List,
                                Student Attendance, Promote, Reports, etc.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-briefcase"></i></span>
                            <h4>Teacher</h4>
                            <p>Uploading Content,
                                Material,
                                Assignment,
                                Syllabus
                                Downloads and many more.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-server"></i></span>
                            <h4>Fees Collection</h4>
                            <p>Fees Master
                                Collect Fees
                                Due fees searches
                                Discount and many more
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-wallet"></i></span>
                            <h4>Accounts</h4>
                            <p>Profit, Income, Expense
                                Search Query
                                Account List
                                Payment Methods etc.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-user"></i></span>
                            <h4>Human Resource</h4>
                            <p>Staff (Directory, Attendance, Reports)
                                Payroll
                                Designation
                                Department and more
                                .</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-archive"></i></span>
                            <h4>Examination</h4>
                            <p>Exam routine, Date & time
                                Schedule notice.
                                Seat plan
                                Mark sheet & Report etc.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-write "></i></span>
                            <h4>Academics</h4>
                            <p>Class Routine
                                Subjective assign
                                Teacher assign
                                Manage Subject etc.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-headphone-alt"></i></span>
                            <h4>Communication</h4>
                            <p>Notice Manage (Holiday, Events etc)
                                Massaging
                                Emailing
                                Reports and More
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-receipt"></i></span>
                            <h4>Library</h4>
                            <p>Book adding, removing,
                                Card issuing
                                Member listing & manage
                                Book category/list
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-package"></i></span>
                            <h4>Inventory</h4>
                            <p>Inventory Item (Listing, Storing, Categories)
                                Supply
                                Item Sell, Issuing etc
                                Item receiving etc.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-truck"></i></span>
                            <h4>Transport</h4>
                            <p>Roads,
                                Vehicles listing,
                                Schedule/routine, student transport
                                Reports etc.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-home"></i></span>
                            <h4>Dormitory</h4>
                            <p>Dormitory finding
                                Categories & Listing
                                Rooms monitoring
                                Reports etc.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature coming_soon">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-panel"></i></span>
                            <h4>Front CMS</h4>
                            <p>Out team working for this. Hopefully it will include our next update version. </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-pie-chart"></i></span>
                            <h4>Reports</h4>
                            <p>
                                Class reports,
                                student’s reports,
                                Progress card,
                                Attendant reports and many more.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-settings"></i></span>
                            <h4>System Settings</h4>
                            <p>General Settings,
                                Email, Permission Setup
                                Backup Restore,
                                System Update and more.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature_part part end-->

    <!-- our_speciality start-->
    <section class="our_speciality section_padding" id="Components">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-8">
                    <div class="section_tittle text-center">
                        <h5>AMazing Features</h5>
                        <h2>More Features Has INFIX</h2>
                        <p>it's vast! Infix has more additional feature that will expect in a complete solution.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-4 col-xl-2">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-dashboard"></i></span>
                            <p>Optimized <br>
                                Performance</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-reload"></i></span>
                            <p>One Click <br>
                                Update System</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
                    <div class="single_feature coming_soon1">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-loop"></i></span>
                            <p>Supports <br>
                                RESTful APIs</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-split-v-alt"></i></span>
                            <p>Clean <br>
                                Code Quality</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-wand"></i></span>
                            <p>Installation <br>
                                Wizard</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
 
                    <div class="single_feature"> 
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-home"></i></span>
                            <p>Multi <br>
                                Lingual</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-desktop"></i></span>
                            <p>Fully <br>
                                Responsive</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-align-right"></i></span>
                            <p>Supports <br>
                                Right-to-Left</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-paint-bucket"></i></span>
                            <p>Themes & Colors <br>
                                Styling Options</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-email"></i></span>
                            <p>Email Notification <br>
                                with Templates</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-bell"></i></span>
                            <p>Supports SMS <br>
                                Notification</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
 
                    <div class="single_feature"> 
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-write"></i></span>
                            <p>Printable <br>
                                Reports</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-plug"></i></span>
                            <p>Inbuilt <br>
                                Backup Tool</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-filter"></i></span>
                            <p>IP Filter <br>
                                & Block</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-clipboard"></i></span>
                            <p>Activity <br>
                                & Email Log</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xl-2">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-write"></i></span>
 
                            <p>Export <br> 
                                Reports</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our_speciality part end-->


    <!-- our_speciality start-->
    <section class="contact_us section_padding " id="Support">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-md-8">
                    <div class="section_tittle text-center">
                        <h5>Application Support</h5>
                        <h2>INFIX Support Centre</h2>
                        <p>Need faster help? Ask your queries here. You’ll get instant help from us.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 col-sm-6">
                    <a class="support-link" href="mailto:support@pixelcoder.net"> 
                        <div class="single_feature">
                            <div class="single_feature_part">
                                <span class="single_feature_icon"><i class="ti-receipt"></i></span>
     
                                <p class="custome-button d-inline-block">Submit a Ticket </p>
     
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="ti-headphone-alt"></i></span>
                            <p class="custome-button d-inline-block">Live Chat</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a class="support-link" target="_blank" href="<?php echo e(url('/docs')); ?>">
                        <div class="single_feature">
                            <div class="single_feature_part">
                                <span class="single_feature_icon"><i class="ti-write"></i></span>
                                <p class="custome-button d-inline-block"> Documentation</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- our_speciality part end-->


    <!-- our_speciality start-->
    <section class="contact_us  padding_top price section_padding" id="Price">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-md-8">
                    <div class="section_tittle text-center">
                        <h2>INFIX Package Prices</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 col-sm-6">
                    <a class="support-link" href="#"> 
                        <div class="single_feature">
                            <div class="single_feature_part">
                                <div class="fixed_height">
                                    <span class="single_feature_icon"><i class="ti-receipt"></i></span> 
                                    <p class="custome-button">Monthly $50 </p>
                                    <ul class="features-list">  
                                        <li>Scalability.</li>
                                        <li>Interoperability</li>
                                        <li>Identity management</li> 
                                    </ul> 
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part">
                                <div class="fixed_height">
                                    <span class="single_feature_icon"><i class="ti-receipt"></i></span>
                                    <p class="custome-button">Quarterly $100</p></span>
                                    <ul class="features-list">
                                            <li>Scalability.</li>
                                            <li>Interoperability</li>
                                            <li>Identity management</li>
                                            <li>Redundancy</li>
                                            <li>Configurability</li> 
                                        </ul>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a class="support-link" target="_blank" href="#">
                        <div class="single_feature">
                            <div class="single_feature_part">

                                <div class="fixed_height">
                                    <span class="single_feature_icon"><i class="ti-receipt"></i></span>
                                    <p class="custome-button"> Quarterly $150</p>
                                    <ul class="features-list">
                                            <li>Scalability.</li>
                                            <li>Interoperability</li>
                                            <li>Identity management</li>
                                            <li>Redundancy</li>
                                            <li>Configurability</li>
                                            <li>Ease of use.</li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- our_speciality part end-->




    <!-- our_speciality start-->
    <section class=" section_padding " id="Contact">
       
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-md-8">
                    <div class="section_tittle text-center">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
               
                <div class="col-lg-6">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="ti-home"></i>
                            <h6><?php echo e(@$contact_info->address); ?></h6>
                            <p><?php echo e(@$contact_info->address_text); ?></p>
                        </div>
                        <div class="info_item">
                            <i class="ti-headphone-alt"></i>
                            <h6><a href="#"><?php echo e(@$contact_info->phone); ?></a></h6>
                            <p><?php echo e(@$contact_info->phone_text); ?></p>
                        </div>
                        <div class="info_item">
                            <i class="ti-envelope"></i>
                            <h6><a href="#"><?php echo e(@$contact_info->email); ?></a></h6>
                            <p><?php echo e(@$contact_info->email_text); ?></p>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-6"> 

                    <?php if(session()->has('message-success')): ?>
                        <div class="text-success pb-3">
                            <?php echo e(session()->get('message-success')); ?>

                        </div>
                    <?php elseif(session()->has('message-danger')): ?>
                        <div class="text-danger pb-3">
                            <?php echo e(session()->get('message-danger')); ?>

                        </div>
                    <?php endif; ?>
                    
                    <form action="<?php echo e(url('send-message')); ?>" class="row contact_form mt-50" method="post" id="contactForm" novalidate="novalidate">
                        <?php echo csrf_field(); ?>
                        <div class="col-lg-12">
                            <div class="input-effect">
                                <input class="primary-input form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" type="text" id="" name="name">
                                <span class="focus-border"></span>
                                <label>Enter your name <span>*</span>
                                <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>

                            </div>
                            <div class="input-effect mt-20">
                                <input class="primary-input form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" type="email" id="" name="email">
                                <span class="focus-border"></span>
                                <label>Enter your email <span>*</span>
                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="input-effect mt-20">
                                <input class="primary-input form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>" type="text" id="" name="subject">
                                <span class="focus-border"></span>
                                <label>Enter Subject <span>*</span>
                                <?php if($errors->has('subject')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('subject')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="input-effect mt-20">
                                <textarea class="primary-input form-control" name="message" cols="0" rows="4"></textarea>
                                <span class="focus-border textarea"></span>
                                <label>Enter Message <span>*</span>
                                <?php if($errors->has('message')): ?>
                                    <span class="text-danger" role="alert">
                                        <strong><?php echo e($errors->first('message')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12 mt-30">
                            <button type="submit" value="submit" class="custome-button">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
    <!-- footer part star-->
    <footer class="footer_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="footer_area_text">
 
                        <img src="<?php echo e(asset('public/landing/img/logo.png')); ?>" alt=""> 
                        <h2>So Finally You Are Here! Now, All You Know About Our Features.</h2>
                        <p>We Believe! It won’t a wrong decision in Purchasing our INFIX for your Institute.</p>
                        <!-- <a href="http://salespanel.infixedu.com/" class="footer_btn"> <i class="ti-shopping-cart-full"></i> -->
                        <a href="<?php echo e(url('institution-register-new')); ?>" class="footer_btn"> <i class="ti-shopping-cart-full"></i>
                            <h3>Registration</h3>
                            <p>The Ultimate Education ERP</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="copyright_text">
                        <p> <img src="<?php echo e(asset('public/landing/img/copyright.svg')); ?>" alt="#"> 2019 infix - Ultimate Education ERP. All Rights
                            Reserved to <a href="#">Codetheme </a> .</p>
                    </div>
                </div>
            </div>
        </div>
    </footer> 

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="<?php echo e(asset('public/landing/js/jquery-1.12.1.min.js')); ?>"></script>
    <!-- popper js -->
    <script src="<?php echo e(asset('public/landing/js/popper.min.js')); ?>"></script>
    <!-- bootstrap js -->
    <script src="<?php echo e(asset('public/landing/js/bootstrap.min.js')); ?>"></script>
    <!-- easing js -->
    <script src="<?php echo e(asset('public/landing/js/jquery.magnific-popup.js')); ?>"></script>
    <!--  -->
    <script src="<?php echo e(asset('public/landing/js/jquery.easing.min.js')); ?>"></script>
    <!-- custom js -->
    <script src="<?php echo e(asset('public/landing/js/custom.js')); ?>"></script>
   

</body>

</html>
<?php /**PATH /Applications/MAMP/htdocs/101.infixedu.v5/Modules/Saas/Resources/views/auth/saas_landing.blade.php ENDPATH**/ ?>