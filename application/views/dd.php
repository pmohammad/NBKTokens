<?require_once('header.php');?>
    <div class="typewriter">
        <h1 style="font-weight: bold; font-size: 60px;">digital Wallet</h1>
    </div>
<style>
    .modal{
        width:auto;
        height:auto;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<?if($balance['09_balance']!=''?$bal = $balance['09_balance']:$bal = '0.000');?>
    <div class="main-content">
      <a style="float: right;margin-left: 10px;" href="#" data-toggle="tooltip" title="Conditions:Minimum 3 Referrals and 50 Kd amount should be there for withdrawal"><i class="tf-ion-information-circled"></i></a>
      <button class="btn btn-success" style="float: right;margin: 30px;" id="withdraw">Withdraw <?="- " .$bal;?></button>
      <div class="admin-container">
        <div class="payment" style="margin-top: 100px;">
          <div class="card">
            <div class="card-body">
              <div class="payment-table">
                <table id="payment" class="table table-striped table-bordered dt-responsive nowrap w-100">
                  <thead>
                    <tr>
                        <th style="display:none"></th>
                      <th>Date</th>
                      <th>Description</th>
                      <th>Expire on</th>
                      <th>Earning</th>
                      <th>Withdrawal</th>
                      <th>Balance</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div> <!--/.card-body-->
          </div> <!--/.card-->
        </div> <!--/.payment-->

      </div> <!--/.admin-container-->
    </div> <!--/.main-content-->

  </main> <!--/.main-->


 


<div class="modal fade" id="otpmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hooray!! </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('Users/request_withdraw'); ?>" autocomplete="off" >
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Account Password</label>
                            <input class="form-control" id="hash" name="hash" type="password" placeholder="Your Account Password" required autocomplete="off">
                            <input id="id" name="id" type="text" hidden value='<?=$balance['01_id']?>'>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Withdraw</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?require_once('footer.php')?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

<script>
$('#payment').DataTable({
  "order": [[0, "desc" ]],
  "ajax": {
    "url": "../Users/fetch_wallet",
    "type": "POST"
  },
}); // End of DataTable
</script>


<script>
    $('#withdraw').click(function(){
        var bank = '<?=$balance['is_bank_details']?>';
        var amount = '<?=$balance['09_balance']?>';
        var refer = '<?=$balance['01_total_refer']?>';
        var is_verify = '<?=$kyc['is_verify']?>';
        if(amount>50 && refer>=3){
            if(bank==0){
                var message = "Please Update Your Profile and Bank Details before forwarding with withdrawal.";
                $('#message').html(message);
                $( "#ex1" ).modal();
            }else{
                if(is_verify==1){
                    $('#otpmodal').modal('show');
                }else{
                    var message = "KYC is not done... please complete the KYC process";
                    $('#message').html(message);
                    $( "#ex1" ).modal();
                }
            }
        }else{
            var message = "Amount should be greater than 50Kd and atleast refer 3 of your friends";
                $('#message').html(message);
                $( "#ex1" ).modal();
        }
    });
</script>
<script>
    $('#submit').click(function(e) {
        var bank = $('#banks').val();
        if(bank=="default"){
            e.preventDefault();
        }else{
            return true;
        }
    });
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
