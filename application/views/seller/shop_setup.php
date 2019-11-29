<div class="col-md-5 ml-auto mr-auto mt-3">
	<div class="card text-center mb-3">
		<div class="card-header">
			<center><h5>Setup Your shop</h5></center>
		</div>
		<div class="card-body">
<form action="<?= base_url();?>seller/shop_setup" method="post" enctype="multipart/form-data">	
  <div class="form-group">
    <label for="">Shop Image</label>
    	<input type="file" name="userfile" class="form-control <?php echo (!empty($shop_image_err)) ?'is-invalid' :'';  ?>" id="" value="<?=$shop_image;?>" placeholder="Enter email">
    	 <span class="invalid-feedback"><?=$shop_image_err;?></span>
  </div>
  <div class="form-group">
    <label for="">Shop Name</label>
    	<input type="text" name="shop_name" class="form-control <?php echo (!empty($shop_name_err)) ?'is-invalid' :'';  ?>" id="" placeholder="Kirana Store" value="<?=$shop_name?>">
    		<span class="invalid-feedback"><?= $shop_name_err; ?></span>
  	</div>
  	<div class="form-group">
    	<label for="">Shop Address</label>
    		<input type="text" name="shop_address" class="form-control <?php echo (!empty($shop_address_err)) ?'is-invalid' :'';  ?>" id="" value="<?=$shop_address; ?>" placeholder="Address">
    		<span class="invalid-feedback"><?= $shop_address_err; ?></span>
  	</div>
  	<div class="form-group">
    	<label for="">Shop Pin Code</label>
    		<input type="text" name="shop_pin_code" class="form-control <?php echo (!empty($shop_pin_code_err)) ?'is-invalid' :'';  ?>" id="" placeholder="Pin-code" value="<?=$shop_pin_code;?>">
    		<span class="invalid-feedback"><?= $shop_pin_code_err; ?></span>
  	</div>
  	<div class="form-group">
    	<label for="">Delivery Time</label>
    		<input type="time" name="shop_delivery_time" class="form-control <?php echo (!empty($shop_delivery_time_err)) ?'is-invalid' :'';  ?>" id="" placeholder="Time at which you can deliver" value="<?=$shop_delivery_time;?>">
    		<span class="invalid-feedback"><?= $shop_delivery_time_err; ?></span>
  	</div>

  <div class="row">
  		<div class="col">
  			<button type="submit" class="btn btn-primary btn-block">Submit</button>
  		</div>	
  	</div>
</form>

		</div>		
	</div>
</div>
