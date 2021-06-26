<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="webtechies.tech">
    <title>Digital Wallet - NBK Tokens</title>
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
    
    
    <link rel="stylesheet" href="<?=base_url('assets/css/style2.css');?>">
    
    <style>
        html body a{
            color:#fff;
        }
    </style>
    
  </head>
  <body style="background-color: #4481eb;" >
<header>
        <ul class="nav__links">
          <logo class="Logo"><a href="index.html"><img style="width: 300px;" src="<?=base_url('img/NBKToken.png');?>" alt=""></a></logo>
            <li><a href="<?=base_url('Investor/listings');?>">Home</a></li>
            <li><a href="<?=base_url('Investor/digital_wallet');?>">Wallet</a></li>
            <li><a href="<?=base_url('Investor/over_the_counter');?>">OTC</a></li>
            <li><a href="<?=base_url('Investor/logout');?>">Logout</a></li>
 
        </ul>
    </header>
    <div class="typewriter">
        <h1 style="font-weight: bold; font-size: 100px;">digital Wallet</h1>
      </div>

<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-body"><!-- Add rows table -->
        
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

<!-- Individual column searching (text inputs) table -->
<section id="text-inputs">
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div id="wallet1" style="display: flex;">
                        <i class="icon-wallet" style="font-size: 100px;color: #000;margin-left:50px"></i>
                        <span style="padding-top: 25px;padding-left: 20px;font-size: 18px;font-family: monospace;">My Wallet<br><span style="font-size: 14px;color:#000"><?=$users['wallet_balance']." KD";?></span> </span>
                    </div>    
                    <br>
                    <button id="wallet" class="btn" style="background-color:rgb(255, 7, 110);margin-left: 70px;width: 150px;">Add Credit</button>
                    <h4 class="card-title" style="color:#000;margin-top: 20px;">List of Tokens</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body" style="padding-top: 0px;">
                        <table class="table table-striped table-bordered text-inputs-searching">
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Total Tokens</th>
                                    <th>Purchased Price</th>
                                    <th>Purchased On</th>
                                    <th>Current Valuation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?foreach($record as $key){?>
                                    <tr>
                                        <td><?=$key['company_name'];?></td>
                                        <td><?=$key['tokens'];?></td>
                                        <td><?=$key['income'];?></td>
                                        <td><?=$key['created_dt'];?></td>
                                        <td><?=$key['income']+($key['income']*10/100);?></td>
                                        <td><button class="btn " style="background-color:rgb(255, 7, 110)" onclick="release('<?=$key['company_id'];?>','<?=$key['company_name'];?>','<?=$key['tokens'];?>','<?=$key['income']+($key['income']*10/100);?>')">Sell Now</button></td>
                                    </tr>
                                <?}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Individual column searching (text inputs) table -->

        </div>
      </div>
    </div>
    
    
    
    <div class="modal fade" id="otpmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:#000">Hooray!! Add money to your wallet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('Investor/add_amount'); ?>" autocomplete="off" >
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Amount in KWD</label>
                            <input class="form-control" id="amt" name="amt" type="text">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="allocate">Pay Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="release_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:#000">Release Your Tokens</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('Investor/release_tokens'); ?>" autocomplete="off" >
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input class="form-control" id="cname" name="cnmae" type="text" readonly>
                            <input id="cid" name="cid" type="text" hidden>
                        </div>
                        <div class="form-group">
                            <label>How many number of tokens you wish to release?</label>
                            <input class="form-control" id="ntoken" name="ntoken" type="text">
                        </div>
                        <div class="form-group">
                            <label>Amount Expected for the tokens</label>
                            <input class="form-control" id="amount" name="amount" type="text">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="allocate">Release Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    
    

    <!-- BEGIN VENDOR JS-->
    <script src="<?=base_url('admin-assets/vendors/js/vendors.min.js');?>"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    
    <script src="<?=base_url('admin-assets/vendors/js/tables/datatable/datatables.min.js');?>"></script>
    <script src="<?=base_url('admin-assets/vendors/js/tables/datatable/dataTables.responsive.min.js');?>"></script>
    <script src="<?=base_url('admin-assets/vendors/js/menu/jquery.mmenu.all.min.js');?>"></script>
    <script src="<?=base_url('admin-assets/vendors/js/charts/raphael-min.js');?>"></script>
    <script src="<?=base_url('admin-assets/vendors/js/charts/morris.min.js');?>"></script>
    <script src="<?=base_url('admin-assets/vendors/js/charts/chart.min.js');?>"></script>
    <script src="<?=base_url('admin-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js');?>"></script>
    <script src="<?=base_url('admin-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js');?>"></script>
    <script src="<?=base_url('admin-assets/vendors/js/extensions/moment.min.js');?>"></script>
    <script src="<?=base_url('admin-assets/vendors/js/extensions/underscore-min.js');?>"></script>
    <script src="<?=base_url('admin-assets/vendors/js/extensions/clndr.min.js');?>"></script>
    <script src="<?=base_url('admin-assets/vendors/js/charts/echarts/echarts.js');?>"></script>
    <script src="<?=base_url('admin-assets/vendors/js/extensions/unslider-min.js');?>"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?=base_url('admin-assets/js/core/app-menu.js');?>"></script>
    <script src="<?=base_url('admin-assets/js/core/app.js');?>"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?=base_url('admin-assets/js/scripts/pages/dashboard-ecommerce.js');?>"></script>
    <!-- END PAGE LEVEL JS-->
    
    <script src="<?=base_url('admin-assets/js/scripts/tables/datatables/datatable-api.js');?>"></script>
    
    <script>
        $('#wallet').click(function(){
            $('#otpmodal').modal('show');
        });
    
    function release(a, b, c, d, e){
        $('#allocate').attr('disabled', true);
        $('#cid').val(a);
        $('#cname').val(b);
        
        
    
        $('#release_modal').modal('show');
    }
    </script>
  </body>
</html>
