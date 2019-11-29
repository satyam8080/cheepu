<h1>Thank You For Shopping with Cheepu</h1>
<h2>Your Order id is: <?php echo $this->session->userdata('order_id'); ?></h2>
<h3>Have a Nice Day</h3>

<?php 


echo "<h4>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>" ;
    echo "<h4>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h4>" ;
    echo "<h4>Payment Email: " . $response['payments'][0]['buyer_email'] . "</h4>" ;	



?>