<div class="col-md-12 ml-auto mr-auto mt-5" >
	<div class="row">
			<img id="imm" class="ml-auto mr-auto" style="width:auto;height: auto;" src="<?=$product_image ?>" class="">		
	</div>

</div>
<div class="row">
<div class="col-md-6 ml-auto mr-auto" style="">
	<?php if($product_image): ?>
	<img  src="<?=$product_image ?>" class=" mx-1 my-3" width="18%" height="60px"   onclick="fun('<?=$product_image; ?>')">
	<?php endif; ?>

    <?php if($product_image2): ?>
	<img  src="<?=$product_image2 ?>" class="  mx-1 my-3" width="18%" height="60px" onclick="fun('<?=$product_image2; ?>')">
	<?php endif; ?>
	<?php if($product_image2): ?>
	<img  src="<?=$product_image3 ?>" class="  mx-1 my-3" width="18%" height="60px" onclick="fun('<?=$product_image3; ?>')">
	<?php endif; ?>

	<?php if($product_image3): ?>
	<img  src="<?=$product_image4 ?>" class="  mx-1 my-3" width="18%" height="60px" onclick="fun('<?=$product_image4; ?>')">
	<?php endif; ?>
	<?php if($product_image4): ?>
	<img  src="<?=$product_image5 ?>" class="  mx-1 my-3" width="18%" height="60px" onclick="fun('<?=$product_image5; ?>')">
	<?php endif; ?>
</div>	
</div>

<script type="text/javascript">
	
	function fun(id) {
		// body...

		document.getElementById('imm').src = id;

	}

</script>