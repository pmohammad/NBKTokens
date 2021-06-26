<? require_once('header.php');?>

<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Create Listing</h3>
          </div>
        </div>
        <div class="content-body"><!-- Form actions layout section start -->
        <section id="form-action-layouts">
	<div class="row match-height">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title" id="from-actions-top-left">Listing For Funding</h4>
	            </div>
	            <div class="card-content collpase show">
	                <div class="card-body">
	                    
	                    <?if($this->session->flashdata('error')){?>
                <script>
                    var message = "<?=$this->session->flashdata('error');?>";
                    alert(message);
                </script>
            <?}if($this->session->flashdata('message')){?>
                <script>
                    var message = "<?=$this->session->flashdata('message');?>";
                    alert(message);
                </script>
            <?}?>
	                    <form class="form" method="POST" action="<?=base_url('Company/add_list');?>"  enctype="multipart/form-data">
	                    	<div class="form-body">
	                    		<h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
	                    		<div class="row">
	                    			<div class="form-group col-md-6 mb-2">
			                            <label for="projectinput1">First Name</label>
			                            <input type="text" id="projectinput1" class="form-control" placeholder="First Name" name="fname" required >
			                        </div>
			                        <div class="form-group col-md-6 mb-2">
			                            <label for="projectinput4">Contact Number</label>
			                            <input type="text" id="projectinput4" class="form-control" placeholder="Phone" name="phone" required >
			                        </div>
	                    		</div>
	                    		<div class="row">
			                        <div class="form-group col-md-6 mb-2">
			                            <label for="projectinput3">E-mail</label>
			                            <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email" required >
			                        </div>
			                        <div class="form-group col-md-6 mb-2">
			                            <label for="projectinput4">Civil Id Number</label>
			                            <input type="text" id="civilno" class="form-control" placeholder="Civil Id Number" name="civilno" required >
			                        </div>
								</div>

								<h4 class="form-section"><i class="ft-clipboard"></i> Requirements</h4>
			                    
			                    <div class="row">
			                        <div class="form-group col-md-6 mb-2">
			                        	<label for="projectinput5">Expected Funding Amount</label>
			                            <input type="text" id="projectinput5" class="form-control" placeholder="Expected Funding Amount" name="fund_amt" required >
			                        </div>

			                        <div class="form-group col-md-6 mb-2">
			                        	<label for="projectinput5">Company Current Valuation</label>
			                            <input type="text" id="projectinput5" class="form-control" placeholder="Company Current Valuation" name="com_val" required >
			                        </div>
			                    </div>
			                    
			                   <div class="row">
			                        <div class="form-group col-md-6 mb-2">
			                        	<label for="projectinput5">Bid Amount</label>
			                            <input type="text" id="projectinput5" class="form-control" placeholder="Bid Amount" name="bid_amt" required >
			                        </div>

			                        <div class="form-group col-md-6 mb-2">
			                        	<label for="projectinput5">Minimum shares to Purchase</label>
			                            <input type="text" id="projectinput5" class="form-control" placeholder="Minimum shares to Purchase" name="min_share" required >
			                        </div>
			                    </div>
			                    
			                    <div class="row">
			                        <div class="form-group col-md-6 mb-2">
			                        	<label for="projectinput5">Maximum shares to Purchase</label>
			                            <input type="text" id="projectinput5" class="form-control" placeholder="Maximum shares to Purchase" name="max_share" required >
			                        </div>

			                        <div class="form-group col-md-6 mb-2">
			                        	<label for="projectinput5">Bidding Start Date</label>
			                            <input type="date" id="projectinput5" class="form-control" name="bid_date" required >
			                        </div>
			                    </div>
			                    
			                    <div class="row">
			                        <div class="form-group col-md-6 mb-2">
			                        	<label for="projectinput5">Bidding End Date</label>
			                            <input type="date" id="projectinput5" class="form-control" name="end_date" required >
			                        </div>
			                        <div class="form-group col-md-6 mb-2">
			                        	<label for="projectinput5">Listing Image (Company Logo)</label>
			                            <input type="file" id="projectinput5" class="form-control" name="image" required >
			                        </div>
			                    </div>
								<div class="form-actions top">
	                            <button type="button" class="btn btn-warning mr-1">
	                            	<i class="ft-x"></i> Cancel
	                            </button>
	                            <button type="submit" class="btn btn-primary">
	                                <i class="fa fa-check-square-o"></i> Save
	                            </button>
	                        </div>
							</div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
</div>
</div>
<?require_once('footer.php');?>