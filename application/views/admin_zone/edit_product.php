<div class="container">
<a href="<?= base_url(); ?>seller/shop_products" class="btn btn-light"><i class="fa fa-backward">Back</i></a>
  <a style="text-decoration: none;" href="<?= base_url(); ?>admin_zone/delete_product/<?=$product_id; ?>" >
  <div class="ml-auto mr-auto block btn btn-danger btn-block col-md-8">
     Delete this Product
      
  </div>
  </a>
<div class="card bg-primary col-md-8 ml-auto mr-auto mt-5">
  <div class="card-header text-white ml-auto mr-auto">
    <h4 class="display-4">Edit Product</h4>
  </div>

  <div class="card-body">
<form action="<?= base_url();?>admin_zone/edit_product/<?=$product_id; ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="text-white" for="">Product Name</label>    
        <input type="text" name="product_name" class="form-control " id="" placeholder="Product Name" value="<?= $product_name; ?>" required>
       <span class="invalid-feedback"></span> 
      </div>
    <div class="form-group">
        <label class="text-white" for="sku">SKU</label>    
        <input type="text" name="sku" class="form-control " id="" placeholder="SKU ID" value="<?= $sku; ?>" required>
       <span class="invalid-feedback"></span>       
      </div>
    <div class="form-group">
        <label class="text-white" for="isbn">ISBN:</label>    
        <input type="text" name="isbn" class="form-control " id="" placeholder="ISBN " value="<?= $isbn; ?>" required>
       <span class="invalid-feedback" ><?= $isbn_err; ?></span>
      </div>    
<!-- Select category -->

  </script>
      <div class="form-group">
        <label for="" class="text-white">Category Type</label>    
        <select class="form-control" name="sub_cat_id" id="categoryId" onchange="my()" required>
          <option  value="" class="form-control">---select----</option>   
          <?php foreach ($cat_name as $category ) : ?>
            <option value="<?= $category->cat_id; ?>"><?= $category->cat_name; ?></option>
          <?php endforeach; ?>
        </select>       
       <span class="invalid-feedback"></span>
      </div>    

<!-- Select sub-category -->

      <div class="form-group">
        <label for="" class="text-white">Select Sub-Category Type</label>    
        <select class="form-control" name="sub_cat_id" required>
          <option  value="" class="form-control">---select----</option>   
          <?php foreach ($sub_cat_name as $category ) : ?>
            <option value="<?= $category->sub_category_id; ?>"><?= $category->sub_category_name; ?></option>
          <?php endforeach; ?>
        </select>       
       <span class="invalid-feedback"></span>
      </div>

      <div class="form-group">
        <label for="" class="text-white">Image For Product</label>
        <input type="file" name="userfile[]" class="form-control " id="" required>
       <span class="invalid-feedback"></span>
      </div>

      <div class="form-group">
        <label for="" class="text-white">Image2 For Product</label>
        <input type="file" name="userfile[]" class="form-control " id=""  >
       <span class="invalid-feedback"></span>
      </div>

        <div class="form-group">
        <label for="" class="text-white">Image3 For Product</label>
        <input type="file" name="userfile[]" class="form-control " id="" >
       <span class="invalid-feedback"></span>
      </div>


        <div class="form-group">
        <label for="" class="text-white">Image4 For Product</label>
        <input type="file" name="userfile[]" class="form-control " id="" >
       <span class="invalid-feedback"></span>
      </div>
      
       <div class="form-group">
        <label for="" class="text-white">Image5 For Product</label>
        <input type="file" name="userfile[]" class="form-control " id="" >
       <span class="invalid-feedback"></span>
      </div>

      <div class="form-group">
        <label for="" class="text-white">Quantity or per Item</label>
        <select class="form-control" name="type" required>
            <option  value="" class="form-control">---select----</option>
            <option value="100g" class="form-control">100g</option>
            <option value="500g" class="form-control">500g</option>
            <option value="1kg" class="form-control">kg</option>
            <option value="per-item" class="form-control">Per Item</option>
            <option value="per-dozen" class="form-control">Per Dozen</option>
        </select>
      </div>
      
      <div class="row">
        <div class="col">
      <div class="form-group">
        <label for="Common Name" class="text-white">Selling Price</label>
        <input type="number" name="s_p" class="form-control " value="<?= $s_p; ?>"  required>
       <span class="invalid-feedback"></span>
      </div>          
        </div>
        <div class="col">
      <div class="form-group">
        <label for="Common Name" class="text-white">M.R.P.</label>
        <input type="number" name="m_r_p" class="form-control " value="<?= $m_r_p; ?>"  required>
       <span class="invalid-feedback"></span>
      </div>          
        </div>
      <div class="form-group">
        <label for="Author" class="text-white">Edition</label>
        <input type="text" name="edition" class="form-control" value="<?= $edition; ?>"  required>
        <span class="invalid-feedback"></span>
        </div>          
      </div>
      <div class="row">
        <div class="col">
      <div class="form-group">
        <label for="Author" class="text-white">Author</label>
        <input type="text" name="author" class="form-control" value="<?= $author; ?>"  required>
       <span class="invalid-feedback"></span>
      </div>          
        </div>
        <div class="col">
      <div class="form-group">
        <label for="Common Name" class="text-white">Language</label>
        <select class="form-control" name="language" required>
          <option value="">--select--</option>
          <option value="Hindi">Hindi</option>
          <option value="Eng">English</option>
        </select>
       <span class="invalid-feedback"></span>
      </div>          
        </div>
      </div>              
      </div>
      <div class="form-group">
        <label for="Common Name" class="text-white">Description</label>
        <textarea  type="text" name="description" class="form-control"  required><?= $description ?></textarea>
       <span class="invalid-feedback"></span>
      </div>
      <script>
         CKEDITOR.replace( 'description' );
      </script>
      <div class="form-group btn-block">        
        <input type="submit" class="btn btn-success" name=""> 
      </div>
      </form>
   </div>
</div>  
</div>