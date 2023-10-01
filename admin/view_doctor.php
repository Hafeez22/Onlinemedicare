<div class="container">
 <?php include('top.php');   
 include('db.php');

 
			 ?>
 
     <h3>View Doctor</h3>
  
	<div class="table-responsive">  
	<form method="post" action="">
		<?php  $path=''.$_SERVER['DOCUMENT_ROOT'].'/medical_rep/uploads';
		if(isset($_POST['submit1']))
		{
		$stock_id = $_POST['id'];		
		$query1=mysqli_query($con,"select * from add_doctor where id='$stock_id'");
		$querry1=mysqli_query($con,"DELETE FROM add_doctor WHERE id = '$stock_id'");
		while($row_img=mysqli_fetch_assoc($query1))
		{
			$del_image=$row_img['file'];	
			unlink("$path/$del_image");
		}
		if($querry1 && $query1)
		{
		echo "<script>alert('Deleted Successfully'); window.location = './view_doctor.php';</script>";
		}
		} ?>	
	<table class="table">
				<tr bgcolor="#ccc">
					<th>Specialist</th>
					<th>Name</th>
					<th>Qualification</th>
					<th>Experience</th>
					<th>File</th>
					<th>Address</th>
					<th>Mobile</th>
					<th>Remove</th>
					
					</tr>
				<?php
				$path='/medical_rep/uploads/';
				$select_brand =mysqli_query($con,"SELECT * FROM add_doctor");
				/*while ($row_brand=mysqli_fetch_array($select_brand)) 
				{*/
				$select_stock =mysqli_query($con,"SELECT * FROM add_doctor");
				while ($row_stock=mysqli_fetch_array($select_stock)) 
				{
					/*if($row_brand['pharmacy_stocks_id']==$row_stock['pharmacy_category'])
					{*/
				  ?>
				   <tr>
				   <td><?php echo $row_stock['specialist'];?></td>
				   <td><?php echo $row_stock['name'];?></td>
				   <td><?php echo $row_stock['qualification'];?></td>
				   <td><?php echo $row_stock['experience'];?></td>
				   <td><?php echo "<img src='".$path."/".$row_stock["file"]."' class='img-responsive' style='width:90px;height:70px;'>";?></td>
				   <td><?php echo $row_stock['address'];?></td>
				   <td><?php echo $row_stock['mobile'];?></td>
				  
				   <td>
				   <input type="hidden" name="id"  value="<?php echo $row_stock['id'];?>">
				   <input type="submit" name="submit1" class="btn-danger" value="remove">
				   </td>
				   </tr>
				 <?php    }  	?>

				</table>
	      </form>
	      </div>
	      </div>
  
