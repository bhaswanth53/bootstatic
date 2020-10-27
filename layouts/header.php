<!DOCTYPE html>
<html>
    <head>
        <title>BootStatic - A Static Blog Generator</title>
    
        <meta charset="UTF-8">
        <meta name="description" content="Clean and responsive administration panel">
        <meta name="keywords" content="Admin,Panel,HTML,CSS,XML,JavaScript">
        <meta name="author" content="Mystic Mongers">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <link rel="stylesheet" type="text/css" href="./assets/css/uikit.min.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/themes/light.css">

        <link href="//fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
        <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    </head>
    <body data-theme="light">
        <div id="overlay">
            <div class="load">
                <hr/><hr/><hr/><hr/>
            </div>
        </div>
        <aside id="left-bar" class="uk-light left-col nicescroll">
            <div class="bar-wrap uk-padding-remove"> 
                <button class="uk-offcanvas-close uk-hidden@m" type="button" id="left-bar-close" uk-close></button>
                <div class="logo-wrapper">
                    <!-- <img src="./assets/images/logo.png"> -->
                    <p class="logo-text"><strong>BootStatic</strong></p>
                </div>
                <ul class="uk-nav-default uk-nav-parent-icon" uk-nav> 
                    <li><a href="index.php" class="<?php if($page == "dashboard") echo "active"; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="templates.php" class="<?php if($page == "templates") echo "active"; ?>"><i class="fa fa-file-code-o"></i>Templates</a></li>
                    <li><a href="blogs.php" class="<?php if($page == "blogs") echo "active"; ?>"><i class="fa fa-rss"></i>Blogs</a></li>
                </ul> 
            </div>
        </aside>
        <div class="right-col" id="right-bar">
            <!-- <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar"> -->
                <nav class="uk-navbar-container" uk-navbar>
                    <div class="uk-navbar-left">
                        <ul class="uk-navbar-nav">
                            <li class="uk-hidden@m"><a href="javascript:void(0);" id="left-bar-open"><span uk-icon="menu"></span></a></li>
                            <li class="uk-visible@m"><a href="javascript:void(0);" id="leftbar-toggle"><span uk-icon="menu"></span></a></li>
                            <!-- <li class="uk-hidden@m"><a href="javascript:void(0);" id="right" uk-toggle="target: #left-bar; animation: uk-animation-slide-left"><span uk-icon="menu"></span></a></li> -->
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </nav>
            <!-- </div> -->