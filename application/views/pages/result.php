<div class="container mt-5">
	Showing results for <b>: <?= $item; ?></b></br>
	<b><?= $no; ?>  </b>results found <br>

<?php if($no==0): ?>
<div>
		<img class="img-fluid" src="<?= base_url()?>assets/img/gifs/sorry.gif" >	
</div>

<?php else  :?>
<?php foreach ($result as $result) : ?>
<a style="text-decoration: none;" href="<?= base_url(); ?>pages/product_description/<?=$result->product_id; ?>" >	
<div class="card mt-2">

	<div class="card-header"><b><?= $result->product_name; ?></b></div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-3">
				<img src="<?= base_url();?>assets/img/products/<?= $result->product_image; ?>" class="img-thumbnail">
			</div>
			<div class="col-md-9"><b>Description:</b><br>
				<?= $result->description; ?>

			</div>
		</div>
	</div>
</div>
</a>	
<?php endforeach; ?>
</div>
<<?php endif; ?>
