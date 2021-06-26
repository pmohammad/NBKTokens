<?require_once('header.php');?>
<div>
  <div class="text">
    <div class="typewriter">
        <h1 style="font-weight: bold; font-size: 100px;">invest now</h1>
      </div>
      
    <h2 style="font-weight: 300;">Buyers willing to sell below shares at discounted rates.</h2>
    
    <div style="display: flex; flex-wrap: wrap; justify-content: center;">
        
        <?if(sizeof($members)==0){?>
            <p style="color:rgb(255, 7, 110);background: #fff;">Sorry, there is no available listing for you now.</p>
        <?}?>

        <?foreach($members as $key){?>
        <div class="card">
            <div class="card-image"><img src="<?=base_url('user-assets/ljhkbn/'.$key['list_img']);?>" style="max-width: 100%;"></div>
            <div class="card-text">
                <h5 style="color:rgb(255, 7, 110)"><?=$key['company_name'];?></h5>
                <p>Current Market Valuation at <br><span style="color:rgb(255, 7, 110)"><?=$key['current_valuation']." KWD";?></span></p>
                <ul style="list-style: kannada;padding: 0;text-align: left;">
                    <li style="color:rgb(255, 7, 110);margin-bottom: 20px;">
                        <div style="color:#000"><?=$key['total_tokens'];?> <span style="color:rgb(255, 7, 110)"> tokens</span></div>
                    </li>
                    
                    <li style="color:rgb(255, 7, 110);margin-bottom: 20px;">
                        <div style="color:#000">KWD  <?=$key['bid_amount']+($key['bid_amount']*10/100);?><span style="color:rgb(255, 7, 110)"> Valuation</span></div>
                    </li>
                    
                    <li style="color:rgb(255, 7, 110);margin-bottom: 20px;">
                        <div style="color:#000">KWD <?=$key['tokens_amount'];?><span style="color:rgb(255, 7, 110)"> selling price</span></div>
                    </li>
                </ul>
                <button class="btn btn-primary" onclick="call_modal('<?=$key['company_name'];?>', '<?=$key['total_tokens'];?>','<?=$key['tokens_amount'];?>','<?=$key['sold_id'];?>')">Buy <?=$key['total_tokens'];?> Tokens </button>
    

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
                <form method="post" action="<?php echo base_url('Investor/buy_sold_tokens'); ?>" autocomplete="off" >
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input class="form-control" id="cname" name="cnmae" type="text" readonly>
                            <input id="id" name="id" type="text" hidden value=''>
                        </div>
                        <div class="form-group">
                            <label>Tokens</label>
                            <input class="form-control" id="ntoken" name="ntoken" type="text" readonly>
                        </div>
                        <div class="form-group">
                            <label>Total Amount</label>
                            <label id="total_amt"></label>
                            <input class="form-control" id="tot_amt" name="tot_amt" type="text" readonly>
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
                        <button type="submit" class="btn btn-success" id="allocate">Buy Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<script>
    function call_modal(a, b, c, d){
        $('#cname').val(a);
        $('#id').val(d);
        $('#ntoken').val(b);
        $('#tot_amt').val(c);
        
    
        $('#otpmodal').modal('show');
    }
</script>
 

 
 
    
</body>
</html>