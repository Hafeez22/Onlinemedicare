<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#timediv').load('refresh_scores.php').fadeIn("slow");
}, 10000); // refresh every 10000 milliseconds
</script>
  <title>Pharmacy</title>
  <meta charset="utf-8">
  <!--<meta http-equiv="refresh" content="10" />-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>


  <style>
.navbar-custom {
	background-color:#229922;
    color:#ffffff;
  	border-radius:0;
}
  
.navbar-custom .navbar-nav > li > a {
  	color:#fff;
  	padding-left:20px;
  	padding-right:20px;
}
.navbar-custom .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus {
    color: #ffffff;
	background-color:transparent;
}
      
.navbar-custom .navbar-nav > li > a:hover, .nav > li > a:focus {
    text-decoration: none;
    background-color: #33aa33;
}
      
.navbar-custom .navbar-brand {
  	color:#eeeeee;
}
.navbar-custom .navbar-toggle {
  	background-color:#eeeeee;
}

  </style>
  </head>
<div class="container">
 <?php 
 session_start();

 include('front_top.php');   
 include('../admin/db.php');

 if(isset($_POST['submit']))
			{
			
			
			//$pharmacy_brand=$_POST['pharmacy_brand'];	
		
			$name=$_POST['name'];	
			$pwd=$_POST['pwd'];
			$addr=$_POST['addr'];	
			$mob=$_POST['mob'];	
			
			$query1=mysqli_query($con,"insert into users values('','$name','$pwd','$addr','$mob')");
				if($r = $query1)
				{
				echo "<script>alert('Added Succesfully'); window.location = './index.php';</script>";
				}
				else
				{
					echo '<font color="red">Some error found</font>';
				}
			   }
		
			 ?>
 
     <h3>Register User</h3>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
		
	
	<div class="form-group">
	  <label class="control-label col-sm-2" for="medicine_brand">Name</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="name" id="medicine_brand" placeholder="Enter Name" required>
	  </div>
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-2" for="medicine_brand">Password</label>
	  <div class="col-sm-4">
		<input type="password" class="form-control" name="pwd" id="medicine_brand" placeholder="Enter Password" required>
	  </div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="combination_generics">Address</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="addr" id="combination_generics" placeholder="Enter Address" required>
	  </div>
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-2" for="combination_generics">Mobile</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="mob" id="combination_generics" placeholder="Enter Mobile" required>
	  </div>
	</div>
	
	
	<div class="form-group">        
	  <div class="col-sm-offset-2 col-sm-10">
		<button type="submit" name="submit" class="btn btn-success">Submit</button>
	  </div>
	</div>
    </form>
	<div class="table-responsive">  

	      </div>
	      </div>
  </body>
  </html>
