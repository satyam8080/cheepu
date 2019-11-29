<div class="container">
<a href="<?= base_url(); ?>seller/seller_dashboard" class="btn btn-light"><i class="fa fa-backward">Back</i></a>

<div class="card bg-primary col-md-5 ml-auto mr-auto mt-5">
	<div class="card-header text-white ml-auto mr-auto">
		<h4 class="display-4">Add Catogory</h4>
	</div>
	<div class="card-body ">
<form action="<?= base_url();?>admin_zone/add_catogory" method="post">
		<div class="form-group">
    <label for="">Catogory Name</label>
    
    	<input type="text" name="cat_name" class="form-control <?php echo (!empty($cat_name_err)) ?'is-invalid' :'';  ?>" id="" placeholder="Product Catogory" value="<?= $cat_name ?>">
    	 <span class="invalid-feedback"><?= $product_name_err; ?></span>
  		</div>

  		<div class="form-group btn-block"> 				
  			<input type="submit" class="btn btn-success" name="">	
  		</div>
  		</form>
   </div>
</div>	
</div>