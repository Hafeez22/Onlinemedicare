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
  <title>Add Medicine</title>
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

 include('top.php');   
 include('../admin/db.php');
	$mname=$_SESSION['dname'];
 if(isset($_POST['submit']))
			{
			
			//$pharmacy_brand=$_POST['pharmacy_brand'];	
			$bname=$_POST['bname'];	
			$price=$_POST['price'];	
			$av_qty=$_POST['av_qty'];	
			
			$query1=mysqli_query($con,"insert into add_medicine values('','$mname','$bname','$price','$av_qty')");
				if($r = $query1)
				{
				echo "<script>alert('Added Succesfully'); window.location = './add_medicine.php';</script>";
				}
				else
				{
					echo '<font color="red">Some error found</font>';
				}
			   }
		
			 ?>
 
     <h3>Add Medicine</h3>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
		
	
	<div class="form-group">
	  <label class="control-label col-sm-2" for="medicine_brand">Brand Name</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="bname" id="medicine_brand" placeholder="Enter Name" required>
	  </div>
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-2" for="combination_generics">Price</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="price" id="combination_generics" placeholder="Enter Price" required>
	  </div>
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-2" for="combination_generics">Available Quantity</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="av_qty" id="combination_generics" placeholder="Enter Available Quantity" required>
	  </div>
	</div>
	
	
	<div class="form-group">        
	  <div class="col-sm-offset-2 col-sm-10">
		<button type="submit" name="submit" class="btn btn-success">Submit</button>
	  </div>
	</div>
    </form>
		<div class="table-responsive">  
	<form method="post" action="">
		<?php  $path=''.$_SERVER['DOCUMENT_ROOT'].'/admin/uploads';
		if(isset($_POST['submit1']))
		{
		$stock_id = $_POST['stock_id'];		
		$query1=mysqli_query($con,"select * from add_medicine where id='$stock_id'");
		$querry1=mysqli_query($con,"DELETE FROM add_medicine WHERE id = '$stock_id'");
		
		if($querry1 && $query1)
		{
		echo "<script>alert('Deleted Successfully'); window.location = './add_medicine.php';</script>";
		}
		} ?>	
	<table class="table">
				<tr bgcolor="#ccc">
					<th>Id</th>
					<th>Medical Name</th>
					<th>Brand Name</th>
					<th>Price</th>
					<th>Available Quantity </th>
					</tr>
				<?php
				$path='/admin/uploads/';
				//$select_brand =mysqli_query($con,"SELECT * FROM add_medicine");
				//while ($row_brand=mysqli_fetch_array($select_brand)) 
				//{
				$select_stock =mysqli_query($con,"SELECT * FROM add_medicine");
				while ($row_stock=mysqli_fetch_array($select_stock)) 
				{
				
				  ?>
				   <tr>
				   <td><?php echo $row_stock['id'];?></td>
				   <td><?php echo $row_stock['mname'];?></td>
				   <td><?php echo $row_stock['bname'];?></td>
				   <td><?php echo $row_stock['price'];?></td>
				   <td><?php echo $row_stock['available_qty'];?></td>
				  				 
				   <td>
				   <input type="hidden" name="stock_id"  value="<?php echo $row_stock['id'];?>">
				   <input type="submit" name="submit1" class="btn-danger" value="remove">
				   </td>
				   </tr>
				 <?php     }  	?>

				</table>
	      </form>
	      </div>
	      </div>
  </body>
  </html>
