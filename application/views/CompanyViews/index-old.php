<html>
    <head>
        <title>Company Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>
        <link rel="stylesheet" href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
        
        <link rel="stylesheet" href="<?=base_url('user-assets/js/bootstrap337.min.css'); ?>">
        
        <script type="text/javascript" src="<?=base_url('user-assets/js/jquery.min.js');?>"></script>
        
        <script type="text/javascript" src="<?=base_url('user-assets/js/bootstrap337.min.js');?>"></script>
        
        <script type="text/javascript" src="<?=base_url('user-assets/js/jquery.easing.min.js');?>"></script>
        
        <script type="text/javascript" src="<?=base_url('user-assets/js/signature_pad.umd.min.js');?>"></script>
        
        <style>
            #ex1{
                height: 130px;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                background-color: white;
                width: 350px;
                border: 1px #ccc solid;
                border-radius: 20px;
                text-align: center;
                box-shadow: 3px 3px 3px 3px #ccc;
            }       
            /*custom font*/
            @import url(https://fonts.googleapis.com/css?family=Montserrat);
            
            /*basic reset*/
            * {
              margin: 0;
              padding: 0;
            }
            
            p{
                text-align:left;
            }
            html {
              height: 100%;
              background: #1e4280; /* fallback for old browsers */
              background: -webkit-linear-gradient(
                to left,
                #1e4280,
                #2a0845
              ); /* Chrome 10-25, Safari 5.1-6 */
            }
            
            body {
              font-family: montserrat, arial, verdana;
              background: transparent;
              overflow-x:hidden;
            }
            
            /*form styles*/
            #msform {
              text-align: center;
              position: relative;
              margin-top: 30px;
            }
            
            #msform fieldset {
              background: white;
              border: 0 none;
              border-radius: 0px;
              box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
              padding: 20px 30px;
              box-sizing: border-box;
              width: 93%;
              margin: 0 3%;
            
              /*stacking fieldsets above each other*/
              position: relative;
            }
            
            /*Hide all except first fieldset*/
            #msform fieldset:not(:first-of-type) {
              display: none;
            }
            
            /*inputs*/
            #msform input,
            #msform textarea,
            #msform select{
              padding: 15px;
              border: 1px solid #ccc;
              border-radius: 10.25px;
              margin-bottom: 10px;
              width: 100%;
              box-sizing: border-box;
              font-family: montserrat;
              color: #2c3e50;
              font-size: 13px;
            }
            
            #msform input:focus,
            #msform select:focus,
            #msform textarea:focus {
              -moz-box-shadow: none !important;
              -webkit-box-shadow: none !important;
              box-shadow: none !important;
              border: 1px solid #1e3280;
              outline-width: 0;
              transition: All 0.5s ease-in;
              -webkit-transition: All 0.5s ease-in;
              -moz-transition: All 0.5s ease-in;
              -o-transition: All 0.5s ease-in;
            }
            
            /*buttons*/
            #msform .action-button {
              width: 100px;
              background: #1e3280;
              font-weight: bold;
              color: white;
              border: 0 none;
              border-radius: 25px;
              cursor: pointer;
              padding: 10px 5px;
              margin: 10px 5px;
            }
            
            #msform .action-button:hover,
            #msform .action-button:focus {
              box-shadow: 0 0 0 2px white, 0 0 0 3px #1e3280;
            }
            
            #msform .action-button-previous {
              width: 100px;
              background: #c5c5f1;
              font-weight: bold;
              color: white;
              border: 0 none;
              border-radius: 25px;
              cursor: pointer;
              padding: 10px 5px;
              margin: 10px 5px;
            }
            
            #msform .action-button-previous:hover,
            #msform .action-button-previous:focus {
              box-shadow: 0 0 0 2px white, 0 0 0 3px #c5c5f1;
            }
            
            /*headings*/
            .fs-title {
              font-size: 18px;
              text-transform: uppercase;
              color: #2c3e50;
              margin-bottom: 10px;
              letter-spacing: 2px;
              font-weight: bold;
            }
            
            .fs-subtitle {
              font-weight: normal;
              font-size: 13px;
              color: #666;
              margin-bottom: 20px;
            }
            
            /*progressbar*/
            #progressbar {
              margin-bottom: 30px;
              overflow: hidden;
              /*CSS counters to number the steps*/
              counter-reset: step;
            }
            
            #progressbar li {
              list-style-type: none;
              color: white;
              text-transform: uppercase;
              font-size: 9px;
              width: 33.33%;
              float: left;
              position: relative;
              letter-spacing: 1px;
            }
            
            #progressbar li:before {
              content: counter(step);
              counter-increment: step;
              width: 24px;
              height: 24px;
              line-height: 26px;
              display: block;
              font-size: 12px;
              color: #333;
              background: white;
              border-radius: 25px;
              margin: 0 auto 10px auto;
            }
            
            /*progressbar connectors*/
            #progressbar li:after {
              content: "";
              width: 100%;
              height: 2px;
              background: white;
              position: absolute;
              left: -50%;
              top: 9px;
              z-index: -1; /*put it behind the numbers*/
            }
            
            #progressbar li:first-child:after {
              /*connector not needed before the first step*/
              content: none;
            }
            
            /*marking active/completed steps green*/
            /*The number of the step and the connector before it = green*/
            #progressbar li.active:before,
            #progressbar li.active:after {
              background: #fff;
              color: #000;
            }
            
            /* Not relevant to this form */
            .dme_link {
              margin-top: 30px;
              text-align: center;
            }
            .dme_link a {
              background: #fff;
              font-weight: bold;
              color: #1e3280;
              border: 0 none;
              border-radius: 25px;
              cursor: pointer;
              padding: 5px 25px;
              font-size: 12px;
            }
            
            .dme_link a:hover,
            .dme_link a:focus {
              background: #c5c5f1;
              text-decoration: none;
            }



            .container{
                margin-left: 420px;
            }
            .wrapper {
                position: relative;
                width: 100%;
                height: 200px;
                -moz-user-select: none;
                -webkit-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            img {
                position: absolute;
                left: 0;
                top: 0;
            }
            
            .signature-pad {
                position: absolute;
                left: 0;
                top: 0;
                width:100%;
                height:200px;
                border:1px solid #000;
            }
        </style>
    </head>
    <body>
        <!-- MultiStep Form -->
        <div class="row">
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
            <div class="col-md-12">
                <?=validation_errors(); ?>
                <form id="msform"  enctype="multipart/form-data" method="post" action="<?=base_url('Users/accept_registration');?>">
                    <div style="padding-bottom:120px">
                        <a href="" target="_blank"><img title="NBK Tokens" src="<?=base_url('img/NBKToken.png');?>" style="margin-left:30%"></a>
                    </div>
                    <!-- fieldsets -->
                    <fieldset>
                        <p style="color:red" id="errormsg"></p>
                        <h2 class="fs-title">Personal Details</h2>
                        <h3 class="fs-subtitle">Tell us something about you and your business</h3>
                        <input type="text" name="pname" id="pname" placeholder="Your Name"  value="<?=set_value('pname'); ?>"/>
                        <p style="color:red" id="pname-error"></p>
                        
                        <input type="text" name="bname" id="bname" placeholder="Business Name"  value="<?=set_value('bname'); ?>"/>
                        <p style="color:red" id="bname-error"></p>
                        
                        <input type="text" name="uname" id="uname" placeholder="User Name"  value="<?=set_value('uname'); ?>"/>
                        <p style="color:red" id="uname-error"></p>
                        
                        <input type="email" name="email" id="email" placeholder="Business Email Id"  value="<?=set_value('email'); ?>"/>
                        <p style="color:red" id="email-error"></p>
                        
                        <input type="text" name="mobile" id="mobile" placeholder="Your Mobile Number"  inputmode='numeric' pattern="^[5,6,9]\d{7}$" oninvalid="setCustomValidity('Incorrect Mobile Number')" onchange="this.setCustomValidity('')" formnovalidate value="<?=set_value('mobile'); ?>"/>
                        <p style="color:red" id="mobile-error"></p>
                        
                        <input type="text" name="civilid" id="civilid" placeholder="Your Civil ID Number"  inputmode='numeric' pattern="\d{12}$" oninvalid="setCustomValidity('Incorrect Civil Id Number')" onchange="this.setCustomValidity('')" formnovalidate value="<?=set_value('civilid'); ?>"/>
                        <p style="color:red" id="civilid-error"></p>
                        
                        <input type="text" name="password" id="password" placeholder="Your Password"   formnovalidate value="<?=set_value('password'); ?>"/>
                        <p style="color:red" id="password-error"></p>
                        
                        
                        <h2 class="fs-title">Some required attachments</h2>
                        <h3 class="fs-subtitle">Add your attachments</h3>
                        
                        <label style="font-size: 13px;">Upload Commercial License With Barcode</label>
                        <input type="file" name="civil_front" id="civil_front"/>
                        <p style="color:red" id="civil_front-error"></p>
                      
                        <input type="hidden" name="signauth" id="signauth" />
                        <div style="float: right;">
                            <button id="clear" formnovalidate class="btn btn-secondary">clear sign</button>
                        </div>
                        <label style="font-size: 13px;margin-bottom: 15px;padding-top: 7px;">Your Signature</label>
                        <div class="wrapper" id="wrapper">
                            <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
                        </div>
                        <p style="color:red" id="signature-pad-error"></p>
                        <input type="submit" name="submit" class="submit action-button" value="Submit" id="submit" formnovalidate />
                        
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- /.MultiStep Form -->        
       
        
        <script>
            $("#msform").submit(function(e) {
                $('html, body').animate({
                    scrollTop: $("#msform").offset().top
                }, 2000);
                    
                var data = signaturePad.toDataURL('image/png');
                var pname = $('#pname').val();
                var bus_name = $('#bname').val();
                var mobile = $('#mobile').val();
                var civil = $('#civilid').val();
                var acname = $('#account_name').val();
                var acno = $('#account_number').val();
                var iban = $('#iban').val();
                var machines = $('#machinesno').val();
                var duration = $('#duration').val();
                var bname = $('#bank_name').val();
                
                var sign = '';
                var cfront = '';
                var cback = '';
                var license ='' ;
                if(data==='data:image/png;base64,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')
                    sign = 'a';
                if ($('#civil_front')[0].files.length === 0)
                    cfront='a';
                if ($('#civil_back')[0].files.length === 0)
                    cback = 'a';
                if ($('#license')[0].files.length === 0)
                    license = 'a';
                    
                var error ='';
                if(pname=='' || bus_name=='' || mobile=='' || civil=='' || acname=='' || acno=='' || iban=='' || machines==null || duration==null || bname==null || sign=='a' || cfront=='a' || cback=='a' || license=='a'){
                    e.preventDefault();
                    if(pname==''){
                        e.preventDefault();
                        $('#pname-error').html('Personal name is required');
                        $('#pname').css('border-color', 'red');
                        //return false;
                    }else{
                        $('#pname-error').html('');
                        $('#pname').css('border-color', '#ccc');
                    }
                    if(bus_name==''){
                        e.preventDefault();
                        $('#bname-error').html('Business name is required');
                        $('#bname').css('border-color', 'red');
                        //return false;
                    }else{
                        $('#bname-error').html('');
                        $('#bname').css('border-color', '#ccc');
                    }
                    if(mobile==''){
                        e.preventDefault();
                        $('#mobile-error').html('Mobile Number is required');
                        $('#mobile').css('border-color', 'red');
                        //return false;
                    }else{
                        if(!$.isNumeric(mobile) || mobile.length!=8){
                            e.preventDefault();
                            $('#mobile-error').html('Mobile Number not in correct format');
                            $('#mobile').css('border-color', 'red');
                        }else{
                            $('#mobile-error').html('');
                            $('#mobile').css('border-color', '#ccc');
                        }
                    }
                    if(civil==''){
                        e.preventDefault();
                        $('#civilid-error').html('Civil Id is required');
                        $('#civilid').css('border-color', 'red');
                        //return false;
                    }else{
                         if(!$.isNumeric(civil) || civil.length!=12){
                            e.preventDefault();
                            $('#civilid-error').html('Civil Id not in correct format');
                            $('#civilid').css('border-color', 'red');
                        }else{
                            $('#civilid-error').html('');
                            $('#civilid').css('border-color', '#ccc');
                        }
                    }
                    if(acname==''){
                        e.preventDefault();
                        $('#account_name-error').html('Account name is required');
                        $('#account_name').css('border-color', 'red');
                        //return false;
                    }else{
                        $('#account_name-error').html('');
                        $('#account_name').css('border-color', '#ccc');
                    }
                    if(acno==''){
                        e.preventDefault();
                        $('#account_number-error').html('Account Number is required');
                        $('#account_number').css('border-color', 'red');
                        //return false;
                    }else{
                        if(!$.isNumeric(acno) || acno.length!=10){
                            e.preventDefault();
                            $('#account_number-error').html('Account Number not in correct format');
                            $('#account_number').css('border-color', 'red');
                        }else{
                            $('#account_number-error').html('');
                            $('#account_number').css('border-color', '#ccc');
                        }
                    }
                    if(iban==''){
                        e.preventDefault();
                        $('#iban-error').html('IBAN is required');
                        $('#iban').css('border-color', 'red');
                        //return false;
                    }else{
                        if(iban.length!=30){
                            e.preventDefault();
                            $('#iban-error').html('IBAN not in correct format');
                            $('#iban').css('border-color', 'red');
                        }else{
                            $('#iban-error').html('');
                            $('#iban').css('border-color', '#ccc');
                        }
                        
                    }
                    if(machines==null){
                        e.preventDefault();
                        $('#machinesno-error').html('Please select number of machines required');
                        $('#machinesno').css('border-color', 'red');
                        //return false;
                    }else{
                        $('#machinesno-error').html('');
                        $('#machinesno').css('border-color', '#ccc');
                    }
                    if(duration==null){
                        $('#duration-error').html('Please select duration of machines');
                        $('#duration').css('border-color', 'red');
                        //return false;
                    }else{
                        $('#duration-error').html('');
                        $('#duration').css('border-color', '#ccc');
                    }
                    if(bname==null){
                        $('#bank_name-error').html('Bank name is required');
                        $('#bank_name').css('border-color', 'red');
                        //return false;
                    }else{
                        $('#bank_name-error').html('');
                        $('#bank_name').css('border-color', '#ccc');
                    }
                    if(data==='data:image/png;base64,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'){
                        $('#signature-pad-error').html('Incorrect Signature');
                        $('#signature-pad').css('border-color', 'red');
                    }else{
                        $('#signature-pad-error').html('');
                        $('#signature-pad').css('border-color', '#ccc');
                    }
                    if ($('#civil_front')[0].files.length === 0) {
                        $('#civil_front-error').html('Civil Id Front photo is required');
                        $('#civil_front').css('border-color', 'red');
                    }else {
                        $('#civil_front-error').html('');
                        $('#civil_front').css('border-color', '#ccc');
                    }
                    if ($('#civil_back')[0].files.length === 0) {
                        $('#civil_back-error').html('Civil Id Back photo is required');
                        $('#civil_back').css('border-color', 'red');
                    }else {
                        $('#civil_back-error').html('');
                        $('#civil_back').css('border-color', '#ccc');
                    }
                    if ($('#license')[0].files.length === 0) {
                        $('#license-error').html('License photo is required');
                        $('#license').css('border-color', 'red');
                    }else {
                        $('#license-error').html('');
                        $('#license').css('border-color', '#ccc');
                    }
                }else{
                    
                }
                
            });

        </script>
        
        <script type="text/javascript">

            var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
              backgroundColor: 'rgba(255, 255, 255, 0)',
              penColor: 'rgb(0, 0, 0)'
            });
            $('#clear').click(function(e){
                e.preventDefault();
                signaturePad.clear();
            });
        </script>
        
    </body>
</html>


