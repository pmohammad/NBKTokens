<html>
    <head>
        <title>Company Registration</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        
        <style>
.register {
  background: linear-gradient(to right, #3931af 0, #00c6ff 100%);
  margin-top: 3%;
  padding: 3%;
  overflow: hidden;
}
.register .register-form {
  padding: 10%;
  margin-top: 10%;
}
@media (max-width: 991px) {
  .register .register-form {
    margin-top: 16%;
  }
}
@media (max-width: 667px) {
  .register .register-form {
    margin-top: 20%;
  }
}
.register .nav-tabs {
  margin-top: 3%;
  border: none;
  background: #0062cc;
  border-radius: 1.5rem;
  width: 28%;
  float: right;
}
@media (max-width: 991px) {
  .register .nav-tabs {
    width: 33%;
    margin-top: 8%;
  }
}
.register .nav-tabs .nav-link {
  padding: 2%;
  height: 34px;
  font-weight: 600;
  color: #fff;
  border-top-right-radius: 1.5rem;
  border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover {
  border: none;
}
.register .nav-tabs .nav-link.active {
  width: 100px;
  color: #0062cc;
  border: 2px solid #0062cc;
  border-top-left-radius: 1.5rem;
  border-bottom-left-radius: 1.5rem;
}

.register-left {
  text-align: center;
  color: #fff;
  margin-top: 4%;
}
.register-left input {
  border: none;
  border-radius: 1.5rem;
  padding: 2%;
  width: 60%;
  background: #f8f9fa;
  font-weight: bold;
  color: #383d41;
  margin-top: 30%;
  margin-bottom: 3%;
  cursor: pointer;
}
.register-left img {
  margin-top: 15%;
  margin-bottom: 5%;
  width: 25%;
  -webkit-animation: mover 1s infinite alternate;
          animation: mover 1s infinite alternate;
}
.register-left p {
  font-weight: lighter;
  padding: 12%;
  margin-top: -9%;
}

.register-right {
  background: #f8f9fa;
  border-top-left-radius: 10% 50%;
  border-bottom-left-radius: 10% 50%;
}

@-webkit-keyframes mover {
  0% {
    transform: translateY(0);
  }
  100% {
    transform: translateY(-20px);
  }
}
@keyframes mover {
  0% {
    transform: translateY(0);
  }
  100% {
    transform: translateY(-20px);
  }
}
.btnRegister {
  margin-top: 10%;
  border: none;
  border-radius: 1.5rem;
  padding: 2%;
  background: #0062cc;
  color: #fff;
  font-weight: 600;
  width: 50%;
  cursor: pointer;
  margin-right: auto;
  margin-left: auto;
  display:block;
}

.register-heading {
  text-align: center;
  margin-top: 8%;
  margin-bottom: -15%;
  color: #495057;
}
@media (max-width: 991px) {
  .register-heading {
    font-size: 1.5rem;
  }
}
        </style>
    </head>
    <body>
        <div class="user-ragistration">
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
            <a href="" target="_blank"><img title="NBK Tokens" src="<?=base_url('img/NBKToken.png');?>" style="margin-left:30%;background:#000"></a>
	<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from raising money!</p>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Registration</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Login</h3>
                            <form method="POST" action="<?=base_url('Company/login_company')?>">
                                <div class="row register-form">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="User Name *" name="uname" id="uname" value="<?=set_value('uname'); ?>"  required />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" name="password" id="password" value="<?=set_value('password'); ?>"  required />
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Login"/>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Registration</h3>
                            <form method="POST" action="<?=base_url('Company/register_company')?>" enctype="multipart/form-data">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Your Name *" name="pname" id="pname" value="<?=set_value('pname'); ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Business Name *" name="bname" id="bname" value="<?=set_value('bname'); ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Username *" name="uname" id="uname" value="<?=set_value('uname'); ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" name="password" id="password" value="<?=set_value('password'); ?>" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Business Email Id *" name="bemail" id="bemail" value="<?=set_value('bemail'); ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" inputmode="numeric" class="form-control" name="mnumber" id="mnumber" required="" pattern="^[5,6,9]\d{7}$" oninvalid="setCustomValidity('Incorrect Mobile Number')" onchange="this.setCustomValidity('')" formnovalidate="" placeholder="Mobile Number*">
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control" name="civilno" required="" inputmode="numeric" pattern="\d{12}$" oninvalid="setCustomValidity('Incorrect Civil Id Number')" onchange="this.setCustomValidity('')" formnovalidate="" placeholder="Example: 289010109234" maxlength="12" aria-required="true">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control"name="comm_lic" id="comm_lic" value="<?=set_value('comm_lic'); ?>" required />
                                            <p style="color:red">Commercial License with Barcode</p>
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Register" />
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>