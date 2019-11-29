 
    <div class="panel-group" id="accordion1">
        <?php foreach ($cat_name as $category) :?>
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="btn btn-success btn-lg" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne<?= $category->cat_id; ?>"><?=$category->cat_name; 
                        ?>
                        </a>
                    </h4>
                </div>
                <div id="collapseOne<?= $category->cat_id; ?>" class="panel-collapse collapse in">
                    <div class="panel-body">
                    <?php foreach($sub_cat_name as $sub_cat): ?>
                            <?php if($sub_cat->category_id == $category->cat_id ): ?>
                              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample<?= $sub_cat->sub_category_id ?>" aria-expanded="false" aria-controls="collapseExample<?= $sub_cat->sub_category_id ?>">
                                    <?= $sub_cat->sub_category_name ?>
                                </button><br>
                              
                                <div class="collapse container" id="collapseExample<?= $sub_cat->sub_category_id ?>">
                                  <div class="row">
                                    <?php foreach($products as $product): ?>
                                        <?php if($product->sub_cat_id == $sub_cat->sub_category_id ): ?>
                                <a href="<?=base_url(); ?>admin_zone/edit_product/<?= $product->product_id; ?>">
                                  <div class="w3-col l3 m3 s6">    
                                <div class="card"  id="di<?= $product->product_id;?>" >
                                  
                                  <img src="<?=$product->product_image;?>"  class="card-img-top" height="200" >
                                   
                                     
                                  <div class="card-body">
                                      <form id="addpro<?=$product->product_id; ?>" action="" method="post"> 
                                      <div class="thumb-content" id="matter<?=$product->product_id; ?>" pid="<?=$product->product_id; ?>">
                                        <h5 align="center" style="font-size: 15px"><?=$product->product_name; ?></h5>

                                        </div>
                                      </form>                                       
                                      <span>
            
                                      </div>   
                                           </a> 
                                        </div>
                                      </div>
                                      <?php endif; ?>                                         
                                     <?php endforeach; ?>
                                    </div>  
                                </div>                           
                             <?php endif; ?> 
                      <?php endforeach; ?> 
                    </div>
                </div>
            </div>
             <?php endforeach ; ?> 
        </div>