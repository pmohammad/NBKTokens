<?require_once('header.php');?>
<style>
#timer {
  
}
.number-list {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
}
.number-list .item {
  width: 60px;
  margin-right: 15px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 12px;
  color: #000;
  font-weight: 700;
  font-family: sans-serif;
}
.unit-list {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 10px;
}
.unit-list .item {
  width: 60px;
  margin-right: 15px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  color: #000;
  font-weight: 500;
  font-family: sans-serif;
}

.timer-end {
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  color: #000;
  font-weight: 700;
  font-family: sans-serif;
}

</style>
<div>
  <div class="text">
    <div class="typewriter">
        <h1 style="font-weight: bold; font-size: 100px;">invest now</h1>
      </div>
      
    <h2 style="font-weight: 300;">Scroll to invest with a tap of a button.<br>Create your digital wallet and start investing.</h2>
    
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
    
    <div style="display: flex; flex-wrap: wrap; justify-content: center;">

        <?foreach($members as $key){?>
        <div class="card">
            <div class="card-image"></div>
            <div class="card-text">
                <h5 style="color:rgb(255, 7, 110)"><?=$key['company_name'];?></h5>
                <ul style="list-style: none;padding: 0;text-align: left;">
                    
                    
                    <li style="color:rgb(255, 7, 110);margin-bottom: 20px;">
                        <div style="color:#000">KWD <?=$key['expected_funding'];?><span style="color:rgb(255, 7, 110)"> Required capital</span></div>
                    </li>
                    <li style="color:rgb(255, 7, 110);margin-bottom: 20px;">
                        <div style="color:#000">KWD <?=$key['expected_funding'];?> <span style="color:rgb(255, 7, 110)"> raised</span></div>
                    </li>
                </ul>
                <a href="<?=base_url('Investor/listing_details/'.$key['listing_id']);?>" class="btn btn-primary" style="width:250px" id="buy_now" >Invest </a>
                <h6 style="color: rgb(255, 7, 110);font-family: monospace;margin-top: 40px;">
                    <?
                        $now = new DateTime();
                        $future_date = new DateTime($key['expiry_dt']);
                        $interval = $future_date->diff($now);
                        echo $interval->format("%a days, %h hours Remaining");
                    ?>
            </div>
        </div>
        
        <?}?>



    </div>
    </div>

  </div>


 <div class="modal fade" id="otpmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:#000">Hooray!! You are just a step away to invest.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('Investor/buy_tokens'); ?>" autocomplete="off" >
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input class="form-control" id="cname" name="cnmae" type="text" readonly>
                            <input id="id" name="id" type="text" hidden value=''>
                            <input id="listing_id" name="listing_id" type="text" hidden value=''>
                        </div>
                        <div class="form-group">
                            <label>How many number of tokens you wish to purchase?</label>
                            <input class="form-control" id="ntoken" name="ntoken" type="text">
                        </div>
                        <div class="form-group">
                            <label>Total Amount Would be</label>
                            <label id="total_amt"></label>
                            <input class="form-control" id="tot_amt" name="tot_amt" type="hidden">
                            <input class="form-control" id="balla" name="balla" type="hidden">
                        </div>
                        <p id="error" style="color:red"></p>
                        <div class="form-group">
                            <label>Payment Options: </label>
                            <input id="wallet" name="pmethod" type="radio" value="wallet" checked> Wallet
                            <input id="card" name="pmethod" type="radio" value="card" disbaled='disabled'> Card
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="allocate">Allocate Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script>

    function call_modal(a, b, c, d, e, f){
        $('#allocate').attr('disabled', true);
        $('#cname').val(a);
        $('#id').val(b);
        $('#listing_id').val(f);
        $("#ntoken").attr({
            "min" : c,      
            "max" : d        
        });
        $('#balla').val(c*e);
        $('#tot_amt').val(e);
        
    
        $('#otpmodal').modal('show');
    }
    $('#ntoken').change(function(){
        var token = $('#ntoken').val();
        var amt = $('#tot_amt').val();
        var balla = $('#balla').val();
        var bal = token*amt;
        $('#tot_amt').val(bal);
        $('#total_amt').html(bal+" KWD")
        if(bal>=balla){
            $('#allocate').removeAttr('disabled', true);
            $('#error').html('');
        }else{
            $('#tot_amt').val(amt);
            $('#balla').val(balla);
            $('#allocate').attr('disabled', true);
            $('#error').html('Please add more tokens to complete the purchase');
        }
        
    });
</script>
    
</body>
</html>