        <div class="container mt-5 py-5" >
            <div class="row">
                 
               <div class="col-md-6 item-photo">
                <a href="<?= base_url(); ?>pages/photos/<?= $p_id; ?>">
                    <img style="max-width:auto;" height="300px" data-toggle="modal" data-target="#exampleModalCenter" src="<?=$product_image?>"  />
                </a>
                </div>
                
                <div class="col-md-6" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3><?= $product_name; ?></h3>                        
                    <!-- Precios -->
                    <h6 class="title-price"><small>SELLING PRICE</small></h6>
                    <h3 style="margin-top:0px;"><i class="fa fa-rupee"> </i><?= $s_p ?></h3>M.R.P. : <strike><?= $m_r_p ;?></strike>
        
                    <!-- Detalles especificos del producto -->
                    <div class="section">    
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>QUANTITY:-  </small></h6>                    
                        <div>
                            <div class="btn-minus"><span class="fa fa-minus"></span></div>
                            <input value="1" id="atcc<?=$product_id; ?>" pid="<?=$product_id; ?>"  min=1 disabled>
                            <div class="btn-plus"><span class="fa fa-plus"></span></div>
                        </div>
                    </div>                
        
                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                        <button pid="<?=$product_id; ?>" id="atc<?=$product_id; ?>"  class="btn btn-primary btn-block addtocart">                         </span>Add To Cart</button>

                    </div>                                        
                </div>                              
        
                <div class="col-xs-9">
                    <ul class="menu-items">
                        <li class="active">Product Description</li>
                       
                    </ul>
                    <div style="width:100%;border-top:1px solid silver">
                        <p style="padding:15px;">
                            <small>

                            <div class="text-container">
                    <div class="content hideContent">
                                <?= $description; ?>
                        </div>
                    <div class="show-more">
                        <button class="btn btn-outline-success">Show more</button> 
                    </div>
                            </div>



                            </small>
                    </div>
                </div>      
            </div>
        </div>  


