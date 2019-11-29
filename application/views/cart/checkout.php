<div class="mt-5">
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn bg-primary text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          1) DELIVERY ADDRESS
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
<div class="row">
    <div class="col-md-6 ml-auto mr-auto">
      <form class="form-horizontal" id="order_form" role="form">
        <fieldset>

          <!-- Form Name -->
          <legend>Address Details</legend>

          <!-- Text input-->
           <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Address</label>
            <div class="col-sm-10">
              <input type="text" name="address"  placeholder="Complete Address" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Landmark</label>
            <div class="col-sm-10">
              <input type="text" name="landmark" placeholder="Landmark" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">City</label>
            <div class="col-sm-10">
              <input type="text" name="city" placeholder="City" class="form-control">
            </div> 
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="textinput">State</label>
            <div class="col-sm-4">
              <input type="text" placeholder="State" name="state" class="form-control">
            </div>

            <label class="col-md-2 control-label" for="textinput">PIN code</label>
            <div class="col-sm-4">
              <input type="text" placeholder="Pin Code" name="pin_code" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button  type="button" class="btn bg-primary text-white" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Cancel</button>
                <button type="button" class="btn bg-primary text-white" id="order_add" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" >Save</button>
              </div>
            </div>
          </div>

        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn bg-primary text-white" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          2) ORDER SUMMERY
        </button>
        <h2>Your Order id is: <?php echo $this->session->userdata('order_id'); ?></h2>
      </h2>
    </div>
    <!-- order summary -->
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      	<div class="row"> 

          <?php foreach ($products as $result ) : ?>
    		
<?php $totalPrice = 0; ?>
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
      <?php @$s_id .= $result->s_id.","; 
        
         ?>
      <?php @$p_id .= $result->product_id.","; 
        
         ?>
      <?php @$quantity .= $result->quantity.","; 
        
         ?>      
			<?php 
				$totalPrice = $totalPrice + $result->s_p * $result->quantity; 
			?>
		</div>
	</div>
</div>    	
   	<?php endforeach; ?>     		
      	</div>
          <form action="<?= base_url(); ?>cart/order_confirm" id="order_detail" method="POST" >
          <input type="hidden" name="s_id" value="<?= $s_id; ?>">
          <input type="hidden" name="p_id" value="<?= $p_id; ?>">
          <input type="hidden" name="quantity" value="<?= $quantity; ?>">
        </form>
         <!--  <a href="<?=base_url(); ?>Cart/pay" id="order_confirm" class="btn btn-outline-success btn-block col-md-4 ml-auto mr-auto">Confirm your order</a>
          --> <form action="<?=base_url(); ?>Cart/pay" method="POST">
              <input type="hidden" name="user_name" value="<?php echo $this->session->userdata('name'); ?>">
              <input type="hidden" name="user_email" value="<?php echo $this->session->userdata('email'); ?>">
              <input type="hidden" name="user_mobile" value="<?php echo $this->session->userdata('mobile'); ?>">
              <input type="hidden" name="totalPrice" value="<?= $totalPrice; ?>">
              <input type="submit" name="submit">
          </form>
      </div>
    </div>
  </div>
<!--   <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn bg-primary text-white" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          3) PAYMENT OPTION
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
      
 <div class="accordion" id="accordionExample1">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h4 class="mb-0">
        <input type="radio" name="payment_method" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone" checked>
          Cards
        
      </h4>
    </div>

    <div id="collapseone" class="collapse show" aria-labelledby="headingone" data-parent="#accordionExample1">
      <div class=" col-md-4 ">

     		<div class="card card-default">
    
     			<div class="card-body">
     				<form role="form">
                    <div class="form-group">
                        <label for="cardNumber">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expityMonth">
                                    EXPIRY DATE</label>
                               
                                <div class="col-xs-6 col-lg-6" style=" padding-left: 0px;">
                                    <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6  " style=" padding-left: 0px;">
                                    <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode">
                                    CV CODE</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div>
                    </form>
                    </div>
            </div>
            <ul class="btn btn-primary btn-block">
                <li class="active"><a href="#"><span class="badge bg-white text-primary pull-right"><span class="fa fa-rupee"></span>4200</span> Final Payment</a>
                </li>
            </ul>
            <br/>
            <a href="http://www.jquery2dotnet.com" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
     			</div>
     		</div> 	
      </div>

     <div class="card">
    <div class="card-header" id="headingTwo">
      <h4 class="mb-0">
        <input type="radio" name="payment_method" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="false" aria-controls="collapsetwo">
          Net Banking
      </h4>
    </div>
    <div id="collapsetwo" class="collapse" aria-labelledby="headingtwo" data-parent="#accordionExample1">
      <div class="card-body">
          List of Banks
      </div>
    </div>
  </div>

    <div class="card">
    <div class="card-header" id="headingTwo">
      <h4 class="mb-0">
        <input type="radio" name="payment_method" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree">
          PhonePay
      </h4>
    </div>
    <div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#accordionExample1">
      <div class="card-body">
        PhonePay api will be loaded here
      </div>
    </div>
  </div>
   <div class="card">
    <div class="card-header" id="headingTwo">
      <h4 class="mb-0">
        <input type="radio" name="payment_method" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree">
          Cash ON Delivery
      </h4>
    </div>
    <div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#accordionExample1">
      <div class="card-body">
     
      </div>
    </div>
  </div>
    </div>
  </div>
</div>
</div> -->
    </div>
  </div>
</div>
</div>
