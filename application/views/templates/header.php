<!DOCTYPE html>
<html>
<head>
  <title>Cheepu</title>
  <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/css.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/jquery-ui.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.css" />
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <script type="text/javascript">
   </script>
   <script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
   <meta http-equiv="Access-Control-Allow-Origin" content="*" />
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta http-equiv="Pragma" content="no-cache" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

</head>
<body>

  <nav class=" navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
  <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url();?>assets/img/logo/logo.png" height="50px"></a>
  <div>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <!--   <img src="<?= base_url();?>assets/img/logo/search-flat.png" height="30px"> -->
  <span class="fa fa-lg fa-search"></span>
  </button>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class=" text-white" style="width: 500px;">
    <form method="get" action="<?= base_url(); ?>pages/search" class="form-inline d-none d-md-block" >
        <input class="form-control mr-sm-2" style="width: 500px;" name="item" type="search" placeholder="Search" aria-label="Search">
    </form>
  </div>
  <div class=" collapse navbar-collapse" id="navbarSupportedContent1">
    <!-- search form -->
    <div class="navbar-toggler">
        <form method="get" action="<?= base_url(); ?>pages/search">
    <div class="input-group">
    <input type="text" name="item" class="form-control" placeholder="product name" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="input-group-text" id="basic-addon2">search</button>
  </div>
  </div>
  </form>
    </div>

   </div>


  <div class=" collapse navbar-collapse" id="navbarSupportedContent">
    <ul class=" navbar-nav ml-auto">
      <?php if($this->session->userdata('type')=="seller") : ?>
        <?php if($this->session->userdata('new')=="no") : ?>

          <li class="nav-item">
          <a href="<?= base_url(); ?>seller/seller_dashboard"class="nav-link ">Shop Dashboard</a>
        </li>
        <?php elseif($this->session->userdata('new')=="yes"): ?>
            <a href="<?= base_url(); ?>seller/shop"class="nav-link ">Create Shop</a>
        <?php endif; ?>
        <li class="nav-item">
          <a href="<?= base_url(); ?>pages/logout"class="nav-link ">Logout</a>
        </li>
        <!-- if user is login  -->
        <?php elseif($this->session->userdata('type')=="user"): ?>
            <li class="nav-item">
          <a href="<?= base_url(); ?>pages/account"class="nav-link"><i class="<?= $this->session->userdata('user_pic');?>"></i><?="  ".$this->session->userdata('name');?></a>
        </li>
            <li class="text-white mt-2">
          <a href="<?= base_url(); ?>cart/basket">
            <i class="fa fa-shopping-cart">
          <sup ><span class="badge badge-primary" id="products_in_cart">
            <?php
                echo $this->pages_model->products_in_cart();
              ?></span></sup> 
            </i>
            </a>
          </li>
        <li class="nav-item">
          <a href="<?= base_url(); ?>pages/logout"class="nav-link ">Logout</a>
        </li>
      <?php else: ?>
          <li class="nav-item">
            <a href="about.html" class="nav-link" data-toggle="modal" style="font-size:12px" data-target="#Signup">Register</a>
          </li>

          <li class="nav-item">
            <a href="services.html" class="nav-link" data-toggle="modal" style="font-size:12px" data-target="#Signin">Sign In</a>
          </li>
      <?php endif; ?>
        </ul>
  </div>
 </nav>
<div class="mt-5">.</div>
</div>
<!-- Modal for sign in -->
<div class="modal fade " id="Signin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width: 400px">
    <div class="modal-content">
<div class="card bg-secondary shadow border-0">
    <div class="card-header bg-white pb-5">
        <div class="text-muted text-center mb-3"><small>Sign in with</small></div>
        <div class="btn-wrapper text-center">
            <button class="btn" scope="public_profile,email" onlogin="checkLoginState();">
                <span class="btn-inner--icon"><img height="30px" width="50px" src="https://cdn4.iconfinder.com/data/icons/social-icon-4/842/facebook-512.png"></span>
                <span class="btn-inner--text">Facebook</span>
            </button>
            <a href="#" class="btn shadow-lg rounded">
                <span class="btn-inner--icon"><img height="30px" width="30px" src="https://www.trzcacak.rs/file/max/130/1304281_google-logo-png-transparent.png"></span>
                <span class="btn-inner--text">Google</span>
            </a>
        </div>
    </div>
    <div class="card-body px-lg-5 py-lg-5">
        <div class="text-center mb-4 text-white">
            <small>Or sign in with credentials</small>
        </div>
        <form method="post" id="signinform" role="form">
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input class="form-control" id="lmobile" name="mobile" placeholder="Email" type="number">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input class="form-control" id="lpassword" name="password" placeholder="Password" type="password">
                </div>
            </div>
              <input type="hidden" name="type" value="users">
            <div class="custom-control custom-control-alternative custom-checkbox">
                <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                <label class="custom-control-label" for=" customCheckLogin"><span>Remember me</span></label>
            </div>
            <div class="text-center">
            </div>
        </form>
      <div id="iframeloading" style= "display: none; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">
    <img src="<?= base_url();?>assets/img/logo/loader.gif" alt="loading" />
      </div>
  <button type="button" id="signin" class="btn btn-primary my-4">Sign in</button>
    </div>
</div>
    </div>
  </div>
</div>

<!-- Modal for sign up -->
<div class="modal fade " id="Signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="card bg-secondary shadow border-0">

    <div class="card-body px-lg-5 py-lg-5">
        <div class="text-center mb-4 text-white">
            <small>Or sign up with credentials</small>
        </div>
        <form method="post" id="signupform" role="form">
              <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input class="form-control" id="mobile" name="mobile" placeholder="Mobile" type="number" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input class="form-control" id="password" name="password" placeholder="Password" type="password" required>
                </div>
            </div>
              <input type="hidden" name="type" value="users">

            <div class="text-center">
            </div>
          <button type="button" id="signup" class="btn btn-primary my-4">Sign Up</button>

        </form>
      <div id="iframeloading" style= "display: none; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">
    <img src="<?= base_url();?>assets/img/logo/loader.gif" alt="loading" />
      </div>
  <!-- <button type="button" id="signup" class="btn btn-primary my-4">Sign Up</button> -->
    </div>
</div>
    </div>
  </div>
</div>
</div>
<div class="mb-5"></div>
