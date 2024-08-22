<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />    
    <meta name="description" content="" />
    <!-- FAVICONS ICON -->
    <link rel="icon" href="<?php echo base_url(); ?>assets/frontend/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/frontend/images/favicon.png" />
    <!-- PAGE TITLE HERE -->
    <title>Stone & Metal</title>
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.min.css">
    <!-- FONTAWESOME STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/fontawesome/css/font-awesome.min.css" />
    <!-- FONTAWESOME CDN-LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="..." crossorigin="anonymous" />
    <!-- OWL CAROUSEL STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/owl.carousel.min.css">
    <!-- BOOTSTRAP SLECT BOX STYLE SHEET  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap-select.min.css">    
    <!-- MAGNIFIC POPUP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/magnific-popup.min.css">
    <!-- LOADER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/loader.min.css">    
    <!-- MAIN STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/style.css">
        <!-- FLATICON STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/flaticon.min.css"> 
    <!-- IMAGE POPUP -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/lc_lightbox.css" />     
    <!-- THEME COLOR CHANGE STYLE SHEET -->
    <link rel="stylesheet" class="skin" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/skin/skin-4.css">
    <!-- SIDE SWITCHER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/switcher.css">  
     <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/plugins/revolution/revolution/css/settings.css">
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/plugins/revolution/revolution/css/navigation.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Teko:300,400,500,600,700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap" rel="stylesheet"> 
</head>
<body>
    <div class="page-wraper">
        <!-- HEADER START -->
        <header class="site-header header-style-1 mobile-sider-drawer-menu">
            <!-- SITE Search -->
            <!-- <div id="search-toggle-block">
                <div id="search"> 
                    <form role="search" id="searchform" action="/search" method="get" class="radius-xl">
                        <div class="input-group">
                            <input class="form-control" value="" name="q" type="search" placeholder="Type to search"/>
                            <span class="input-group-append"><button type="button" class="search-btn"><i class="fa fa-search"></i></button></span>
                        </div>   
                    </form>
                </div>
            </div>    
            <div class="container header-middle clearfix"  style="background-color:black;">
                <div class="logo-header">
                    <div class="logo-header-inner logo-header-one">
                        <a href="<?php echo base_url(); ?>">
                         <img style="height:50px; width:100px" src ="<?php echo base_url().LOGO_IMG_PATH.$settings[0]['logo']; ?>" alt="Stone & Metal"/>
                        </a>
                    </div>
                </div>
                <div class="header-info ml-4" style="padding-top: 23px;">
                    <ul>
                        <li>
                        <div style="color:white;">
                            <span class="icon-cell"><i class="fas fa-phone-alt" style="font-size: 15px"></i> </span>
                            Mob:&nbsp;<span><a style="color:white;" href=""><?php echo $settings[0]['mobile_number']; ?></a></span>   
                            </div>
                        </li>
                        <li>                       
                        <div style="color:white;" >
                        <span class="icon-cell"><i class="far fa-envelope" style="font-size: 15px"></i> </span>
                        &nbsp;<span><a style="color:white;"  href=""><?php echo $settings[0]['email_address']; ?></a></span>   
 
                    </div>                 
                        </li>
                    </ul>
                </div> 
           </div> -->




            <div class="sticky-header main-bar-wraper  navbar-expand-lg">
                <div class="main-bar">   
                    
                <div class="logo-header-inner logo-header-one">
                        <a href="<?php echo base_url(); ?>">
                         <img style="height:50px; width:100px" src ="<?php echo base_url().LOGO_IMG_PATH.$settings[0]['logo']; ?>" alt="Stone & Metal"/>
                        </a>
                    </div>


                    <div class="container clearfix">                       
    <!-- NAV Toggle Button -->
    <button id="mobile-side-drawer" data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggler collapsed">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar icon-bar-first"></span>
        <span class="icon-bar icon-bar-two"></span>
        <span class="icon-bar icon-bar-three"></span>
    </button>

    <!-- MAIN NAV -->
    <div class="nav-animation header-nav navbar-collapse collapse d-flex justify-content-center">
        <ul class="nav navbar-nav">
            <?php foreach ($menu_array as $menu_val): ?>
                <li>
                    <?php 
                    $menu_link = !empty($menu_val['submenu']) && $menu_val['slug'] != 'applications'
                        ? 'javascript:void(0);' 
                        : base_url($menu_val['slug']); 
                    ?>
                    <a href="<?php echo $menu_link; ?>"><?php echo htmlspecialchars($menu_val['name']); ?></a>
                    <?php if (!empty($menu_val['submenu'])): ?>
                        <ul class="sub-menu">
                            <?php foreach ($menu_val['submenu'] as $submenu): ?>
                                <?php
                                $submenu_link = $menu_val['slug'] == 'applications'
                                    ? base_url('applications/#' . $submenu['slug'])
                                    : base_url('pages/' . $submenu['slug']);
                                ?>
                                <li class="active">
                                    <a href="<?php echo $submenu_link; ?>"><?php echo htmlspecialchars($submenu['name']); ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?> 
        </ul>
    </div>

    <!-- <div>
        <?php echo htmlspecialchars($settings[0]['email_address']); ?> 
        <?php echo htmlspecialchars($settings[0]['mobile_number']); ?>
    </div> -->
</div>
  
                    </div>
                </div>
        </header>