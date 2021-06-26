<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBK Tokens</title>

    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?=base_url('../assets/css/stayle1.css');?>">


    <link rel="stylesheet" href="<?=base_url('../assets/css/style1.css');?>">
</head>

<body>

    <header>
        <ul class="nav__links">
          <logo class="Logo"><a href="<?=base_url('../Investor/listings');?>"><img style="width: 300px;" src="<?=base_url('../img/NBKToken.png');?>" alt=""></a></logo>
            <li><a href="<?=base_url('../Investor/listings');?>">Home</a></li>
            <li><a href="<?=base_url('../Investor/digital_wallet');?>">Wallet</a></li>
            <li><a href="<?=base_url('../Investor/over_the_counter');?>">OTC</a></li>
            <li><a href="<?=base_url('../Investor/logout');?>">Logout</a></li>
 
        </ul>
    </header>
    
    
    
    <div class="father">
        <div class="chiled1">
            <div style="display: flex; flex-direction: row; ">
                <img width="300px" src="<?=base_url('../user-assets/ljhkbn/'.$members['list_img']);?>" alt="" />

                <div>
                    <h2 class="title-text"><?=$members['company_name']?></h2>

                    <br />
                    <p class="text-infoo">
                        <span style="color:rgb(255, 7, 110)">Raised</span> <strong style="font-size: 23px"><?=$raised['ammt']." KWD";?></strong>
                    </p>
                    <p class="text-infoo">
                        <span style="color:rgb(255, 7, 110)">Token</span> <strong style="font-size: 23px">150</strong>
                    </p>
                    <p class="text-infoo">
                        <span style="color:rgb(255, 7, 110)">Remaining</span> <strong style="font-size: 23px"><?=$members['expected_funding'] - $raised['ammt']." KWD"?></strong>
                    </p>
                    <p class="text-infoo">
                      <span style="color:rgb(255, 7, 110)">Tokens</span>   <strong style="font-size: 23px"><?=$members['max_share']?></strong> <span style="color:rgb(255, 7, 110)">Max.Investment</span>
                    </p>
                    <button class="invest-button" style="width:250px" id="buy_now" onclick="call_modal('<?=$members['company_name'];?>', '<?=$members['company_id'];?>', '<?=$members['min_share'];?>', '<?=$members['max_share'];?>', '<?=$members['bid_amount'];?>', '<?=$members['listing_id'];?>')" >Invest </button>
                </div>
                <div></div>
            </div>

            <h2 class="summary-text">Summary</h2>
            <p class="comunity-text">
              <?=$members['company_name']?> is a Kuwaiti based company speciallized in building technology for  NASA
            </p>

        </div>

        <table style="width: 70%;">
            <tr>
                <th>Year</th>
                <th>Total Revenues</th>
                <th>Total Assets</th>
                <th>Total Liabilities</th>
                <th>Yearly Growth</th>
                <th>Net Profit/Loss</th>
            </tr>
            <tr>
                <td>2017</td>
                <td>5,000,000</td>
                <td>3,600,000</td>
                <td>400,000</td>
                <td>20%</td>
                <td>750,000</td>
            </tr>
            <tr class="tr-search">
                <td>Search Expected Fur</td>
                <td>Search Expected Fur</td>
                <td>Search Expected Fur</td>
                <td>Search Expected Fur</td>
                <td>Search Expected Fur</td>
                <td>Search Expected Fur</td>
            </tr>
        </table>

    </div>

    <style>
        .text-infoo {
            font-size: 14px;
            border-top: 2px;
            color: rgb(73, 106, 255);
            padding-left: 50px;
            text-align:left;
            
        }

        .invest-button {
            width: 250px;
            background-color: rgb(69, 97, 255);
            color: white;
            font-size: 20px;
            font-weight: bold;
            border: 0;
        }

        .title-text {
            width: 190px;
            color: rgb(64, 165, 224);
        }

        .comunity-text {
            width: 300px;
            margin-left: 30px;
        }

        .summary-text {
            color: rgb(64, 165, 224);
        }

        .table, th, td {

            height: 60px;
            border: 1px solid black;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            width: 8em;
        }

        .tr-search td {
            font-size: 10px;
            border: 2px solid rgb(107, 107, 107);
        }
    </style>
    
    
     <div class="modal fade" id="otpmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:#000">Hooray!! You are just a step away to invest.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('../Investor/buy_tokens'); ?>" autocomplete="off" >
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