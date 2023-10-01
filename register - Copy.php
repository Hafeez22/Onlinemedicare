	<div class="container">	
		<?php 
		   include('front_top.php');
		   include('admin/db.php');
			if(isset($_POST['submit']))
			{
			$name=$_POST['name'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$mobile=$_POST['mobile_no'];
			$address=$_POST['address'];
			$gender=$_POST['gender'];
			$dob=$_POST['dob'];
			$query1=mysqli_query($con,"insert into pharmacy_register values('','$name','$password','$email','$mobile','$address',
			'$gender','$dob')");
			if($query1)
			{
			echo "<script>alert('Successfully Registered'); window.location = './user_login.php';</script>";
			}
			else
			{
				echo '<font color="red">Some error found</font>';
			}
			}
			?>
          <h3>Register</h3>
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
	  <label class="control-label col-sm-2" for="email">E-mail</label>
	  <div class="col-sm-4">
		<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
	  </div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="mobile_no">Mobile</label>
	  <div class="col-sm-4">
		<input type="number" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter moile number" required>
	  </div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="address">Address</label>
	  <div class="col-sm-4">
		<textarea type="text" class="form-control" name="address" id="address" placeholder="Enter address" required>
	  </textarea>
	</div>
	</div>
	<div class="row">
	<div class="form-group">	
	  <label class="control-label col-sm-2" for="gender">Gender</label>
	  <div class="col-sm-4">
		<label class="radio-inline">
      <input type="radio" name="gender" value="male" required>male
    </label>
    <label class="radio-inline">
      <input type="radio" name="gender" value="female">female
    </label>
		</div>
	</div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="dob">DOB</label>
	  <div class="col-sm-4">
		<input type="date" class="form-control" name="dob" id="birthday" placeholder="Enter dob" required>
	</div>
	</div>
	<div class="form-group">        
	  <div class="col-sm-offset-2 col-sm-10">
		<button type="submit" name="submit" class="btn btn-success">Submit</button>
	  </div>
	</div>
    </form>
	<script type="text/javascript">
      var datefield=document.createElement("input")
      datefield.setAttribute("type", "date")
      if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
         document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
      }
   </script>

 <script>
    if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
       jQuery(function($){ //on document.ready
          $("#birthday").datepicker({ dateFormat: "dd/mm/yy" }).val()
       })
    }
 </script>