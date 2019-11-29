<div class="card bg-primary col-md-5 ml-auto mr-auto mt-5">
	<div class="card-header text-white ml-auto mr-auto">
		<h4 class="display-4">Add Product</h4>
	</div>
	<div class="card-body ">
<form action="<?= base_url();?>admin_zone/add_offer" method="post" enctype="multipart/form-data">
  		<div class="form-group">
  			<label for="" class="text-white">Image For Offer</label>
   			<input type="file" name="userfile" class="form-control " id="" value="<?= $offer_image; ?>" >
    	 <span class="invalid-feedback"><?= $offer_image_err; ?></span>
  		</div>
  		<div class="form-group btn-block"> 				
  			<input type="submit" class="btn btn-success" value="Add Offer">	
  		</div>
  		</form>
   </div>
</div>	
