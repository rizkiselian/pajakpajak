<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login E-pajak Labusel</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>design/login/assets/images/icon.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>design/login/assets/images/fav.jpg">
  <link rel="stylesheet" href="<?php echo base_url(); ?>design/login/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>design/login/assets/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>design/login/assets/css/animate.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>design/login/assets/plugins/slider/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>design/login/assets/plugins/slider/css/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>design/login/assets/css/style.css" />
  <style>
    redtext {
      color: red;
    }
  </style>
</head>

<body class="form-login-body"> 
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mx-auto login-desk">
       <div class="row">

        <div class="col-md-7 loginform">
          <div class="log-txt row no-margin">
            <h1>Badan Pengelolaan Pendapatan Daerah</h1>
          </div>

          <div class="login-det">
            <img src="<?php echo base_url(); ?>design/login/assets/images/art-direction1.png" alt="">
            <br>
          </div>

        </div>
        <div class="col-md-5 detail-box">
          <form class="form-login" action="<?php echo base_url('Auth/login'); ?>" method="POST">
            <div class="detailsh col-lg-8 col-md-10 col-sm-7 col-11 mx-auto">
              <img class="logo" src="<?php echo base_url(); ?>design/login/assets/images/icon.png" alt=""> 

              <div class="row form-ro no-margin">
                <input type="text" name="username" placeholder="Username" class="form-control form-control-sm">
              </div>

              <div class="row form-ro no-margin">
                <input type="password" name="password" placeholder="Password" class="form-control form-control-sm">
              </div>

              <div class="row form-ro fgbh">
                <div class="col-6">
                </div>
                <div class="col-6">
                  <button class="btn btn-sm btn-primary">Sign In</button>
                </div>
                <?php
                echo show_err_msg($this->session->flashdata('error_msg'));
                ?>
              </div>
              <div class="row form-ro hlio fgbh">
                <div class="col-md-14">
                  <p><b>Pemerintah Kabupaten Labuhanbatu Selatan</b></p>
                </div>
                
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
</body>

<script src="<?php echo base_url(); ?>design/login/assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>design/login/assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>design/login/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>design/login/assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="<?php echo base_url(); ?>design/login/assets/plugins/slider/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>design/login/assets/js/script.js"></script>
</html>