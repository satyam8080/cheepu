<div class="container" align="center">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="card bg-info" align="center">
                    <div class="card-heading">
                        <div class="card-title">Sign In</div>
 
                    </div>     

                    <div style="padding-top:30px" class="card-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" action="<?= base_url();?>seller/slogin" method="post">
                                    <?= $mobile_err;?>
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class=""><i class=""></i></span>
                                        <input id="login-username" type="text" class="form-control" name="mobile" value="<?= $mobile;?>" placeholder="Your Mobile Number">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="password" value="<?= $password;?>" placeholder="Password">
                            </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <button  type="submit" class="btn btn-success" >Login  </button>
                                    </div>
                                </div>    
                            </form>     
                        </div>                     
                    </div>  
            </div>
    </div>