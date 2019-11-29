<div class="container">
<a href="<?= base_url(); ?>seller/seller_dashboard" class="btn btn-light"><i class="fa fa-backward">Back</i></a>
<div class="card bg-primary col-md-5 ml-auto mr-auto mt-5">
	<div class="card-header text-white ml-auto mr-auto">

	</div>
	<div class="card-body ">
<form action="<?= base_url();?>admin_zone/add_sub_catogory" method="post" enctype="multipart/form-data">
		<div class="form-group">
   			<label class="text-white" for="">Sub-Category Name</label>    
    		<input type="text" name="sub_category_name" class="form-control " id="" placeholder="Product Name" value="<?= $sub_category_name; ?>" required>
    	 <span class="invalid-feedback"></span>
  	</div>
    <div class="form-group">
        <label for="" class="text-white">Image For SubCategory</label>
        <input type="file" name="userfile" class="form-control " id="" required>
        <span class="invalid-feedback"></span>
      </div>
  		<div class="form-group">
   			<label for="" class="text-white">Select Category Type</label>    
				<select class="form-control" name="cat_id" required>
					    <option value="">--select--</option>
					<?php foreach ($cat_name as $category ) : ?>
						<option value="<?= $category->cat_id; ?>"><?= $category->cat_name; ?></option>
					<?php endforeach; ?>
				</select>    		
    	 <span class="invalid-feedback"></span>
  		</div>

  		<div class="form-group btn-block"> 				
  			<input type="submit" class="btn btn-success" name="">	
  		</div>
  		</form>
   </div>
</div>	
</div>