<?require_once('header.php');?>
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
                <li class=" nav-item"><a href="index.html"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a></li>
            </ul>
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="<?=base_url('Company/create_listing');?>"><i class="icon-list"></i><span class="menu-title" data-i18n="nav.dash.main">Create Listing</span></a></li>
            </ul>
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="index.html"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.dash.main">Listing Status</span></a></li>
            </ul>
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="index.html"><i class="icon-logout"></i><span class="menu-title" data-i18n="nav.dash.main">Logout</span></a></li>
            </ul>
        </div>
    </div>
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Sales stats -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <div class="pb-1">
                                <div class="clearfix mb-1">
                                    <i class="icon-star font-large-1 blue-grey float-left mt-1"></i>
                                    <span class="font-large-2 text-bold-300 info float-right">5,879</span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Revenue</span>
                                    <span class="info float-right"><i class="ft-arrow-up info"></i> 16.89%</span>
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <div class="pb-1">
                                <div class="clearfix mb-1">
                                    <i class="icon-user font-large-1 blue-grey float-left mt-1"></i>
                                    <span class="font-large-2 text-bold-300 danger float-right">423</span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Net Worth</span>
                                    <span class="danger float-right"><i class="ft-arrow-up danger"></i> 5.14%</span>
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <div class="pb-1">
                                <div class="clearfix mb-1">
                                    <i class="icon-shuffle font-large-1 blue-grey float-left mt-1"></i>
                                    <span class="font-large-2 text-bold-300 success float-right">61%</span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Growth</span>
                                    <span class="success float-right"><i class="ft-arrow-down success"></i> 2.24%</span>
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12">
                            <div class="pb-1">
                                <div class="clearfix mb-1">
                                    <i class="icon-wallet font-large-1 blue-grey float-left mt-1"></i>
                                    <span class="font-large-2 text-bold-300 warning float-right">$6,87M</span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Profit</span>
                                    <span class="warning float-right"><i class="ft-arrow-up warning"></i> 43.84%</span>
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Sales stats -->

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


<?require_once('footer.php');?>