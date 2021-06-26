<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Form Actions - Robust - Responsive Bootstrap 4 Admin Dashboard Template for Web Application</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/vendors.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/app.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END Custom CSS-->
    
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- fixed-top-->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <header>
      <ul class="nav__links">
        <logo class="Logo"><a href="index.html"><img style="width: 300px;" src="img/NBKToken.png" alt=""></a></logo>
          <li><a href="indexMain.html">invest</a></li>
          <li><a href="#">Information</a></li>
          <li><a href="Republic.html">Raise Capital</a></li>

      </ul>
      <nav>
          <a class="cta" href="index.html"><button class="sign">SIGN IN</button></a>
      </nav>
  </header>
        <div class="content-body"><!-- Form actions layout section start -->
<section id="form-action-layouts">
	<div class="row match-height">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title" id="from-actions-top-left">Project Info</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
	                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                        <li><a data-action="close"><i class="ft-x"></i></a></li>
	                    </ul>
	                </div>
	            </div>
	            <div class="card-content collpase show">
	                <div class="card-body">
						<div class="card-text">
							<div class="alert alert-icon-right alert-info alert-dismissible mb-2" role="alert">
								<span class="alert-icon"><i class="fa fa-info"></i></span>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
								<strong>Form Actions On Top Left.</strong>
							</div>
							<p>To add form actions on top of the form add a div with <code>.form-actions</code> class to begin the form. Add <code>.top</code> class to add border below form actions.</p>
						</div>
	                    <form class="form">
	                    	<div class="form-actions top">
	                            <button type="button" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Cancel
	                            </button>
	                            <button type="submit" class="btn btn-primary">
	                                <i class="fa fa-check-square-o"></i> Save
	                            </button>
	                        </div>

	                    	<div class="form-body">
	                    		<h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
	                    		<div class="row">
	                    			<div class="form-group col-md-12 mb-2">
			                            <label for="projectinput1">First Name</label>
			                            <input type="text" id="projectinput1" class="form-control" placeholder="First Name" name="fname">
			                        </div>
			                        <div class="form-group col-md-6 mb-2">
			                            <label for="projectinput2">Last Name</label>
			                            <input type="text" id="projectinput2" class="form-control" placeholder="Last Name" name="lname">
			                        </div>
	                    		</div>
	                    		<div class="row">
			                        <div class="form-group col-md-6 mb-2">
			                            <label for="projectinput3">E-mail</label>
			                            <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email">
			                        </div>
			                        <div class="form-group col-md-6 mb-2">
			                            <label for="projectinput4">Contact Number</label>
			                            <input type="text" id="projectinput4" class="form-control" placeholder="Phone" name="phone">
			                        </div>
								</div>

								<h4 class="form-section"><i class="ft-clipboard"></i> Requirements</h4>

								<div class="row">
			                        <div class="form-group col-12 mb-2">
										<label for="projectinput5">Company</label>
			                            <input type="text" id="projectinput5" class="form-control" placeholder="Company Name" name="company">
			                        </div>
			                    </div>

								<div class="row">
			                        <div class="form-group col-md-6 mb-2">
			                        	<label for="projectinput6">Interested in</label>
			                            <select id="projectinput6" name="interested" class="form-control">
			                                <option value="none" selected="" disabled="">Interested in</option>
			                                <option value="design">design</option>
			                                <option value="development">development</option>
			                                <option value="illustration">illustration</option>
			                                <option value="branding">branding</option>
			                                <option value="video">video</option>
			                            </select>
			                        </div>

			                        <div class="form-group col-md-6 mb-2">
			                        	<label for="projectinput7">Budget</label>
			                            <select id="projectinput7" name="budget" class="form-control">
			                                <option value="0" selected="" disabled="">Budget</option>
			                                <option value="less than 5000$">less than 5000$</option>
			                                <option value="5000$ - 10000$">5000$ - 10000$</option>
			                                <option value="10000$ - 20000$">10000$ - 20000$</option>
			                                <option value="more than 20000$">more than 20000$</option>
			                            </select>
			                        </div>
			                    </div>

								<div class="row">
									<div class="form-group col-12 mb-2">
										<label>Select File</label>
										<label id="projectinput8" class="file center-block">
											<input type="file" id="file">
											<span class="file-custom"></span>
										</label>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 mb-2">
										<label for="projectinput9">About Project</label>
										<textarea id="projectinput9" rows="5" class="form-control" name="comment" placeholder="About Project"></textarea>
									</div>
								</div>
							</div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>

	 
</section>
<!-- // Form actions layout section end -->
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
</html>