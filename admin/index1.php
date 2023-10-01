        <div class="container">
			<?Php 
			include('top.php'); 
			include ('db.php');
			if(isset($_POST['submit']))
			{
			$pharmacy_brand=$_POST['pharmacy_brand'];	
			$r = mysqli_query($con,"select * from pharmacy_brand where pharmacy_brand ='$pharmacy_brand'") or die(mysql_error()); ;
			   if($row = mysqli_fetch_assoc($r))
			   {
				   echo "<font color='red'>$pharmacy_brand Already exist..</font>";
			   }
			   else
			   {
				$query1=mysqli_query($con,"insert into pharmacy_brand values('','$pharmacy_brand')");
				if($r = $query1)
				{
				echo "<script>alert('Added Succesfully'); window.location = './index.php';</script>";
				}
				else
				{
					echo '<font color="red">Some error found</font>';
				}
			   }
			}
			 ?>
				
				  <h3>Pharmacy</h3>
				  <form class="form-horizontal" method="post">
				 	<div class="form-group">
					  <label class="control-label col-sm-2" for="pharmacy_brand">Pharmacy</label>
					  <div class="col-sm-4">
						<input type="text" class="form-control" name="pharmacy_brand" id="pharmacy_brand" placeholder="Enter Pharmacy" required>
					  </div>
					</div>
					<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="submit" class="btn btn-success">Submit</button>
					  </div>
					</div>
				  </form>
					
				<table class="table">
				<tr bgcolor="#ccc">
					<th>Brand</th>
					</tr>
				<?php
				$select_brand =mysqli_query($con,"SELECT * FROM pharmacy_brand");
				while ($row_brand=mysqli_fetch_array($select_brand)) 
				{
				  ?>
				   <tr>
				   <td><?php echo $row_brand['pharmacy_brand'];?></td>
				   </tr>
				 <?php
					}
					?>

				</table>
					</div>	