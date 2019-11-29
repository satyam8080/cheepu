<div class="mt-5 mb-5">.</div>

<h2 class="mb-5 mt-5">Your<b> Order</b></h2>

<?php $totalPrice=0; ?>
	<?php if(empty($cartpro)) : ?>
<div class="card bg-success ml-auto mr-auto py-2 w-50 ">
	<div class="card-header bg-success ml-auto mr-auto text-white">
		Your Cart Is Empty	
	</div>
</div>			
	<?php else :?>
    	<div class="row">

    <?php foreach ($cartpro as $result ) : ?>
    		

<div class="w3-col l3 m3 s6">
  <div class="card ml-auto mr-auto mt-3 mb-5 mx-2 my-2" id="rfc<?= $result->cart_id; ?>" style="width: 14rem">
	<div class="card-header bg-primary text-white"><b><?= $result->product_name; ?></b>
		<button type="button" class="close text-danger removefromcart" pid="<?= $result->cart_id; ?>" style="color: red" id="">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
	<div class="card-body" >
		<div class="card-img-top">
			<img src="<?= $result->product_image; ?>" class="card-img-top" height="100">
			</div> <i class="fa fa-rupee"></i>
			
			<?= $result->s_p; ?> * <?= $result->quantity ?> = <i class="fa fa-rupee"></i> <?= $result->s_p * $result->quantity ?>

			<?php 
				$totalPrice = $totalPrice + $result->s_p * $result->quantity; 
			?>
		</div>
	</div>
</div>    	
   	<?php endforeach; ?> 	
    	</div>
<a href="<?= base_url(); ?>cart/checkout" style="text-decoration: none;">
<div class="card bg-success ml-auto mr-auto py-2 w-50 ">
	<div class="card-header bg-success ml-auto mr-auto text-white">
		Pay <i class="fa fa-rupee"></i> <?php echo $totalPrice; ?>	
	</div>
</div>
</a>
<?php endif; ?>
