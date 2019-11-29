  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn bg-primary text-white" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          3) PAYMENT OPTION
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
      	<!-- Payment Option here -->
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
      	<!-- Debit card or credit card -->
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
        <!-- second option -->
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
  <!-- third option --> 
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
        <form action="<?= base_url(); ?>cart/order_confrim" method="post" >
          <input type="text" name="s_id" value="<?= $s_id; ?>">
          <input type="text" name="p_id" value="<?= $p_id; ?>">
          <input type="text" name="quantity" value="<?= $quantity; ?>">
          <input type="text" name="order_id" value="<?= $this->session->userdata('order_id'); ?>">
        </form>
          <button class="btn btn-outline-primary">Click Here to proceed</button>
      </div>
    </div>
  </div>
    </div>
  </div>
</div>
</div>