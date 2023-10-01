	<div class="container">	
		<?php  include('front_top.php'); include('admin/db.php');  include('verify_user_login.php'); ?>
    <h3>Login</h3>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
	 <div class="form-group">
	  <label class="control-label col-sm-2" for="name">Name</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
	  </div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="password">Password</label>
	  <div class="col-sm-4">
		<input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
	  </div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="password"></label>
	  <div class="col-sm-4">
		<?php echo $error;  ?>
	  </div>
	</div>
	<div class="form-group">        
	  <div class="col-sm-offset-2 col-sm-10">
		<button type="submit" name="submit" class="btn btn-success">Submit</button>
	  </div>
	</div>
    </form>