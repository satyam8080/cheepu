<?php foreach ($order as $order): ?>
	<!-- echo $order->id; -->
	<div class="card">
  <h4 class="card-header"><b><?= $order->product_name; ?></b></h4>
  <div class="card-body">
    <p class="card-text"><h5><b>Name: </b></h5><?= $order->user_name; ?></p>
    <p class="card-text"><h5><b>Address: </b></h5><?= $order->address; ?></p>
      <p class="card-text"><h5><b>Landmark: </b></h5><?= $order->landmark; ?></p>
       <p class="card-text"><h5><b>City: </b></h5><?= $order->city; ?></p>
        <p class="card-text"><h5><b>State: </b></h5><?= $order->state; ?></p>
         <p class="card-text"><h5><b>Pin Code: </b></h5><?= $order->pin_code; ?></p>

          <a href="<?= base_url(); ?>admin_zone/dispatch/<?= $order->id ?>" class="btn btn-primary">Proceed</a>
  </div>
</div>

<?php endforeach; ?> 