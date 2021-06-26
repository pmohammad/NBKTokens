<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?=base_url('assets/css/support.css');?>" />
    <script src="<?=base_url('assets/lib/jquery/jquery.min.js');?>"></script>
    <script src="<?=base_url('assets/lib/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <title>Sign in & Sign up Form</title>
  </head>
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
  </style>
  <body>
    
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
          <form action="<?=base_url('Investor/login_user');?>" class="sign-in-form" method="POST">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="email" id="email"  />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" id="password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
            <form action="<?=base_url('Investor/register_user');?>" class="sign-up-form" method="POST">
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
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" id="username" name="username" />
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" id="email" />
                </div>
                <div class="input-field">
                    <i class="fas fa-phone"></i>
                    <input type="tel" inputmode="numeric" name="mobile" id="mobile" required="" pattern="^[5,6,9]\d{7}$" oninvalid="setCustomValidity('Incorrect Mobile Number')" onchange="this.setCustomValidity('')" formnovalidate="" placeholder="Mobile Number">
                </div>
                <div class="input-field">
                    <i class="fas fa-id-card"></i>
                    <input type="tel" class="form-control" name="civil_number" required="" inputmode="numeric" pattern="\d{12}$" oninvalid="setCustomValidity('Incorrect Civil Id Number')" onchange="this.setCustomValidity('')" formnovalidate="" placeholder="Example: 289010109234" maxlength="12" aria-required="true">
                </div>
                <div class="input-field">
                    <i class="fas fa-birthday-cake"></i>
                    <input type="date" class="form-control" name="dob" required="" max="2003-06-25" min="1931-06-25" aria-required="true">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" id="password" name="password" />
                </div>
                
            <input type="submit" class="btn" value="Sign up" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              You can still register with us and start your trading experience with us. 
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
           <a href="<?=base_url('Investor/home')?>"><button class="btn transparent" id="sign-up-btn">
              Home
            </button></a> 
          </div>

        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              You can login to your existing account. 
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
           <a href="<?=base_url('Investor/home')?>"><button  class="btn transparent" id="sign-in-btn"> 
              Home
            </button></a> 
          </div>

        </div>
      </div>
    </div>

    <script src="<?=base_url('assets/js/app.js');?>"></script>
    
  </body>
</html>
