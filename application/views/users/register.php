<div class="col-md-5 ml-auto mr-auto">
<div class="card card-body bg-light mt-3" >
	<h2>Create an Account</h2>
	<p class="text-muted">Please fill this form to register with us...</p>
 	<form action="<?php echo base_url(); ?>Users/register" method="post">
		<div class="form-group">
		<label for="name">Full Name<sup>*</sup></label>:<input type="text" name="name" class="form-control form-control-md <?php echo (!empty($name_err)) ?'is-invalid' :'';  ?>" placeholder=" adam ,james"  value="<?= $name;?>"><br>
			<span class="invalid-feedback"><?= $name_err; ?></span>
		</div>
		<div class="form-group">
		<label for="mobile">Mobile Number<sup>*</sup></label>:<input type="number" name="mobile" class="form-control form-control-md <?php echo (!empty($mobile_err)) ?'is-invalid' :'';  ?>" value="<?= $mobile;?>"><br>
			<span class="invalid-feedback"><?= $mobile_err; ?></span>
		</div>
		<div class="form-group">
		<label for="password">Password<sup>*</sup></label>:<input type="password" name="password" class="form-control form-control-md <?php echo (!empty($password_err)) ?'is-invalid' :'';  ?>" value="<?= $password ?>"><br>
			<span class="invalid-feedback"><?= $password_err; ?></span>
		</div>		
		<input type="submit" name="submit">
	</form>
</div>
</div>