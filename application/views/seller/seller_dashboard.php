<div class="row">
	<div class="col-md-3" align="center">
		<a href="<?= base_url(); ?>seller/shop_products">
		<div align="center" class=" card card-body d w-75 mt-5" >
				<span><i class="fa fa-2x fa-user"></i></br><strong>Your Catalog</strong></span>
		</div>
		</a>
	</div>
	<div class="col-md-3" align="center">
		<a href="<?= base_url(); ?>admin_zone/your_order">
		<div align="center" class=" card card-body d w-75 mt-5" > 
				<span><i class="fa fa-2x fa-shopping-cart"> 

					  <sup ><span class="badge badge-primary" id="products_in_cart">
            <?php
                echo $this->admin_model->orders_from_users();
              ?></span></sup> 
        
				</i></br><strong>Your Order</strong></span>
		</div>
		</a>
	</div>
	<?php if(!$this->session->userdata('a')):  ?>
	<div class="col-md-3 " align="center">
		<a href="<?= base_url(); ?>admin_zone/add_catogory">
		<div align="center" class=" card card-body d w-75 mt-5" >
				<span class=""><i class="fa fa-2x fa-plus"></i></br><strong>Add Catogories</strong></span>
		</div>
		</a>
	</div>

	<div class="col-md-3" align="center">
		<a href="<?= base_url(); ?>admin_zone/add_sub_catogory">
		<div align="center" class=" card card-body bg-light d w-75 mt-5">
				<span class=""><i class="fa fa-2x fa-plus"></i></br><strong>Add SubCatogories</strong></span>
		</div>
	</a>
	</div>
<?php endif ; ?>
	<div class="col-md-3" align="center">
			<a href="<?= base_url(); ?>admin_zone/add_product">
		<div align="center" class=" card card-body bg-light d w-75 mt-5">
				<span><i class="fa fa-2x fa-plus"></i></br><strong>Add Products</strong></span>
	</div>
	</a>
	</div>
	<div class="col-md-3" align="center">
			<a href="<?= base_url(); ?>admin_zone/add_offer">
		<div align="center" class=" card card-body bg-light d w-75 mt-5">
				<span><i class="fa fa-2x fa-plus"></i></br><strong>Add Offer</strong></span>
	</div>
	</a>
	</div>
	<div class="col-md-3" align="center">
			<a href="<?= base_url(); ?>admin_zone/order_proceed">
		<div align="center" class=" card card-body bg-light d w-75 mt-5">
				<span><i class="fa fa-2x fa-check"></i></br><strong>Order Proceed</strong></span>
	</div>
	</a>
	</div>
</div>
