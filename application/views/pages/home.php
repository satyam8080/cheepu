 
    <div class="panel-group" id="accordion1">
        <?php foreach ($cat_name as $category) :?>
          <?php $count = 0; ?>
                <?php foreach($sub_cat_name as $sub_cat): ?>
                                    <?php if($category->cat_id == $sub_cat->category_id ) $count++ ; ?>
                <?php endforeach; ?>  
                 
            <div class="panel panel-default">
                <div class="panel-heading">
                  <?php if($count > 0) : ?>
                    



                   <?php endif; ?> 
                   <?php $count = 0; ?>
                </div>
                <div id="collapseOne<?= $category->cat_id; ?>" class="panel-collapse collapse in show">
                    <div class="panel-body">
                    <?php foreach($sub_cat_name as $sub_cat): ?>
                        <?php $count1 = 0; ?>
                            <?php foreach($products as $product): ?>
                                    <?php if($product->sub_cat_id == $sub_cat->sub_category_id ) $count1++ ; ?>
                            <?php endforeach; ?>

                            <?php if($count1 > 0) : ?>
                            <?php if($sub_cat->category_id == $category->cat_id ): ?>
                             


<div class="my-5"></div>

<!-- Contact -->
<section class="container">

    <!--Contact heading-->
    <h2 class="h1 m-0"> <?= $sub_cat->sub_category_name ?></h2>
    <!--Contact description-->
    <p> </p>
</section>
                             
                              
                                <div class="collapse container show" id="collapseExample<?= $sub_cat->sub_category_id ?>">
                                  <div class="row">
                                         <?php $no = 0; ?>
                                    <?php foreach($products as $product): ?>
                                        <?php if($product->sub_cat_id == $sub_cat->sub_category_id ): ?>
                                   <div class="w3-col l3 m3 s6">
  <!--        <a href="<?= base_url(); ?>pages/product_description/<?=$product->product_id; ?>"> -->
        <a style="text-decoration: none;" href="<?= base_url(); ?>pages/product_description/<?=$product->product_id; ?>" > 
          <div class="card mx-2 my-2" style="height: auto;">
            <img src="<?=$product->product_image;?>"  class="card-img-top" alt="..." width="23%" height="200" >
              <div class="card-body">
                 <div class="thumb-content" align="center">
                  <h4 ><?=$product->product_name; ?></h4>
                        <p style="color: red;font-size: 12px;"><i class="fa fa-rupee"  ></i><?=$product->s_p; ?>/<?=$product->type;?></p>
                        
                         <form action="" method="post">
                  </div>  
                  
              </div>  

            </div>
            
         </a> 
        </div>
        
                <?php if($no++ == 3) break; ?>
                                      <?php endif; ?>   
                                      
                                     <?php endforeach; ?>
                                                                         
                                    </div>
                        <a href="<?= base_url(); ?>Pages/more/<?=$sub_cat->sub_category_id ?>" >            
                          <div align="center" style="width: 150px" class="mt-3 ml-auto mr-auto py-2 px-3 d-block  bg-primary text-white">      View More   
                          </div> 
                        </a> 
                                </div>                           
                             <?php endif; ?> 
                             <?php endif; ?> 
                      <?php endforeach; ?> 
                    </div>
                </div>
            </div>
             <?php endforeach ; ?> 
        </div>