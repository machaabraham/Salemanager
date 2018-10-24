<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>POINT OF SALE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url(); ?>bootstrap-4.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
      @import url("<?php echo base_url(); ?>font-awesome-4.7.0/css/font-awesome.min.css");
.login-block{
background: #DCDCDC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #DCDCDC, #DCDCDC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #DCDCDC, #DCDCDC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
float:left;
width:100%;
padding : 50px 0;
}
.banner-sec{
  background:url()  no-repeat left bottom;
   background-size:cover; 
   min-height:500px; 
   border-radius: 0 10px 10px 0; padding:0;
}
.container{
  background:white; border-radius: 10px;
  box-shadow:15px 20px 0px rgba(0,0,0,0.1);
 }
.carousel-inner{border-radius:0 10px 10px 0;
}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #DE6262; color:#fff; font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}
    </style>
    <script src="<?php echo base_url();?>js/jquery-1.2.6.min.js"></script>
    <script src="<?php echo base_url(); ?>bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#DCDCDC">
<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 style="color:blue;" class="text-center">POINT OF SALE</h2>
	
<?php
$attrib=array('class'=>'form');
 echo form_open('login',$attrib) ?>
<?php echo validation_errors(); ?>
  <div id="top">
  <h5>Welcome to Multi-location POINT OF SALE,
  Manage your Business any Where Without Geographical Limitation.</h5><br/>
  </div> 

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="fa fa-user"></i></span>
    </div>
    <?php echo form_input(array(
    'name'=>'username',
    'class'=>'form-control',
    'placeholder'=>'Username', 
    'value'=>set_value('username'),
    'size'=>'20')); ?>
    </div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="fa fa-lock"></i></span>
    </div>
    <?php echo form_password(array(
    'name'=>'password', 
    'class'=>'form-control',
    'value'=>set_value('password'),
    'size'=>'20')); ?>
    </div>
    <button type="submit" name="loginButton" class="btn btn-primary btn-block">Login</button>
<?php echo form_close(); ?>

<div class="copy-text" style="color: blue;">Developed By <i class="fa fa-heart"></i> agmacha@yahoo.com <a href="#">+255-689-843-428</a></div>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="<?php echo base_url();?>images/login1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2 style="color: blue;">This is Point Of Sale</h2>
            <p>Manage Your Business Without Geographical Location</p>
        </div>	
  </div>
    </div>
    <!-- <div class="carousel-item">
      <img class="d-block img-fluid" src="<?php //echo base_url();?>images/header_bunner.png" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>	
    </div>
    </div> -->
   <!--  <div class="carousel-item">
      <img class="d-block img-fluid" src="https://images.pexels.com/photos/872957/pexels-photo-872957.jpeg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>	
    </div>
  </div> -->
            </div>	   
		    
		</div>
	</div>
</div>
</section>
<script type="text/javascript">

</script>
</body>
</html>
