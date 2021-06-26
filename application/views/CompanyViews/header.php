<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="webtechies.tech">
    <title>Company - NBK Tokens</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('admin-assets/css/vendors.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('admin-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('admin-assets/vendors/css/charts/morris.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('admin-assets/vendors/css/extensions/unslider.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('admin-assets/vendors/css/weather-icons/climacons.min.css');?>">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('admin-assets/css/app.css');?>">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('admin-assets/css/core/menu/menu-types/vertical-multi-level-menu.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('admin-assets/css/core/colors/palette-gradient.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('admin-assets/css/plugins/calendars/clndr.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('admin-assets/fonts/meteocons/style.min.css');?>">
    <!-- END Page Level CSS-->
    
    <link rel="stylesheet" type="text/css" href="<?=base_url('admin-assets/vendors/css/tables/datatable/datatables.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('admin-assets/vendors/css/tables/extensions/responsive.dataTables.min.css');?>">
    
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style.css');?>">
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-mmenu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-mmenu" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-light navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="#"><img class="brand-logo" alt="robust admin logo" src="<?=base_url('img/NBKToken.png');?>">
                <h3 class="brand-text">NBK TOKENS</h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-bordered menu-shadow">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="<?=base_url('Company/dashboard');?>"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a></li>
            </ul>
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="<?=base_url('Company/create_listing');?>"><i class="icon-list"></i><span class="menu-title" data-i18n="nav.dash.main">Create Listing</span></a></li>
            </ul>
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="<?=base_url('Company/listing_status');?>"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.dash.main">Listing Status</span></a></li>
            </ul>
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="<?=base_url('Company/logout');?>"><i class="icon-logout"></i><span class="menu-title" data-i18n="nav.dash.main">Logout</span></a></li>
            </ul>
        </div>
    </div>