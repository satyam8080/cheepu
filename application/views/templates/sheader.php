<!DOCTYPE html>
<html>
<head>
	<title>Cheepu ShopKeeper Area</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">	
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/sstyle.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <meta http-equiv="Access-Control-Allow-Origin" content="*" />
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta http-equiv="Pragma" content="no-cache" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
	<div class="container">
		<a href="" class="navbar-brand">Cheepu</a>
		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="<?= base_url() ?>seller/seller_dashboard" class="nav-link px-2 active">DashBoard</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link px-2 ">Products</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link px-2 ">Sale</a>
				</li>
			</ul>
        <ul class="navbar-nav ml-auto">
               <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url(); ?>">Back To Website</a>
          
          <a class="dropdown-item" href="<?= base_url(); ?>pages/logout">Logout</a>
        </div>
      </li>
      <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link " data-toggle="dropdown">
              <i class="fa fa-user"></i> Welcome <?= $this->session->userdata('sname');?>
            </a>
      </li>
	        </ul>
		</div>
	</div>
</nav>
<header id="main_header" class="py-2 bg-primary text-white">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1><i class="fa fa-gear"></i> DashBoard</h1>
			</div>
			
		</div>
	</div>
</header>
<div class="container">
	<?php if($this->session->flashdata('pro_add')): ?>
			<p class='alert alert-success'><?= $this->session->flashdata('pro_add'); ?></p>
	<?php endif; ?>	
	
	<?php if($this->session->flashdata('cat_add')): ?>
			<p class='alert alert-success'><?= $this->session->flashdata('cat_add'); ?></p>
	<?php endif; ?>	
	
	<?php if($this->session->flashdata('sub_cat_add')): ?>
			<p class='alert alert-success'><?= $this->session->flashdata('sub_cat_add'); ?></p>
	<?php endif; ?>	