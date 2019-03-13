 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>sign Up</title>
  <style>
    #loader {
      transition: all .3s ease-in-out;
      opacity: 1;
      visibility: visible;
      position: fixed;
      height: 100vh;
      width: 100%;
      background: #fff;
      z-index: 90000
    }

    #loader.fadeOut {
      opacity: 0;
      visibility: hidden
    }
    .error{color: red}

    .spinner {
      width: 40px;
      height: 40px;
      position: absolute;
      top: calc(50% - 20px);
      left: calc(50% - 20px);
      background-color: #333;
      border-radius: 100%;
      -webkit-animation: sk-scaleout 1s infinite ease-in-out;
      animation: sk-scaleout 1s infinite ease-in-out
    }

    @-webkit-keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0)
      }
      100% {
        -webkit-transform: scale(1);
        opacity: 0
      }
    }

    @keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0);
        transform: scale(0)
      }
      100% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 0
      }
    }
  </style>
  <link href="<?php echo base_url()?>assets/static/css/style.css" rel="stylesheet">
</head>

<body class="app">
  <div id="loader">
    <div class="spinner"></div>
  </div>
  <script type="text/javascript">window.addEventListener('load', () => {
      const loader = document.getElementById('loader');
      setTimeout(() => {
        loader.classList.add('fadeOut');
      }, 300);
    });</script>
  <div class="peers ai-s fxw-nw h-100vh">
    <div class="peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image:url(<?php echo base_url()?>assets/static/images/bg.jpg)">
      <div class="pos-a centerXY">
        <div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px">
          <img class="pos-a centerXY" src="<?php echo base_url()?>assets/static/images/logo.png" alt="">
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
      <h4 class="fw-300 c-grey-900 mB-40">Register</h4>       
		<?php if (isset($formmessage)) { ?>
		<CENTER><h3 style="color:green;">User Data inserted successfully</h3></CENTER><br>
		<?php } ?>
      <?php echo form_open(''); ?>
       <div class="form-group">
          <label class="text-normal text-dark">Name</label>          
          <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>"  placeholder="John Doe">
            <?php echo form_error('name', '<div class="error">', '</div>'); ?> 
        </div>
         <div class="form-group">
          <label class="text-normal text-dark">Mobile</label>         
          <input type="text" class="form-control" name="mobile" value="<?php echo set_value('mobile'); ?>" placeholder="9999999999">
           <?php echo form_error('mobile','<div class="error">', '</div>'); ?>
        </div>
         <div class="form-group">
          <label class="text-normal text-dark">Email Address</label>          
          <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="name@email.com">
          <?php echo form_error('email','<div class="error">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label class="text-normal text-dark">Username</label>         
          <input type="text" class="form-control" name="user_name" value="<?php echo set_value('user_name'); ?>" placeholder="John">
           <?php echo form_error('user_name','<div class="error">', '</div>'); ?>
        </div>
        
        <div class="form-group">
          <label class="text-normal text-dark">Password</label>         
          <input type="password" class="form-control" name="password" value="<?php echo set_value('passwird'); ?>" placeholder="Password">
           <?php echo form_error('password','<div class="error">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label class="text-normal text-dark">Confirm Password</label>          
          <input type="password" class="form-control" name="cpassword" value="<?php echo set_value('cpassword'); ?>" placeholder="Password">
          <?php echo form_error('cpassword','<div class="error">', '</div>'); ?>
        </div>
        <div class="form-group">
          <div class="peers ai-c jc-sb fxw-nw">
            <div class="peer">
              <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                <label for="inputCall1" class="peers peer-greed js-sb ai-c">
                  <span class="peer peer-greed">Remember Me</span>
                </label>
              </div>
            </div>
            <div class="peer">
              <button class="btn btn-primary">Login</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url()?>assets/static/js/vendor.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/static/js/bundle.js"></script>
</body>
<!-- Mirrored from colorlib.com/polygon/adminator/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 May 2018 09:21:54 GMT -->

</html>