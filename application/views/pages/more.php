
<div class="container">
      
                                  <div class="row">
                                 <?php foreach ($sub_cat_name as $sub_cat) : ?>
 <?php if($sub_cat->sub_category_id == $id_cat ): ?>
<div class="my-5"></div>

<!-- Contact -->
<section class="container">

    <!--Contact heading-->
    <h2 class="h1 m-0"> <?= $sub_cat->sub_category_name ?></h2>
    <!--Contact description-->
    <p> </p>
</section>
<?php endif; ?>
<?php endforeach; ?>   
                                    <?php foreach($products as $product): ?>
                                        <?php if($product->sub_cat_id == $id_cat ): ?>


                <div class="w3-col l3 m3 s6">
        <a style="text-decoration: none;" href="<?= base_url(); ?>pages/product_description/<?=$product->product_id; ?>" > 
          <div class="card mx-2 my-2" style="height: auto;">
            <img src="<?=$product->product_image;?>"  class="card-img-top" alt="..." width="23%" height="200" >
              <div class="card-body">
                 <div class="thumb-content" align="center">
                  <h4 ><?=$product->product_name; ?></h4>
                        <p style="color: red;font-size: 12px;"><i class="fa fa-rupee"  ></i><?=$product->s_p; ?>/<?=$product->type;?></p>
                  </div>  
                  
              </div>  

            </div>
            
         </a> 
        </div>
        

                  <?php endif; ?>                                         
                          <?php endforeach; ?>
                                <pre>                                     
                                     </pre>
                                    </div>  
                              
           </div>
 