        <div class="container">
			<?Php 
			include('top.php'); 
			include ('db.php');
			if(isset($_POST['submit']))
			{
			$pharmacy_brand=$_POST['pharmacy_brand'];	
			$pharmacy_category=$_POST['pharmacy_category'];	
			$r = mysqli_query($con,"select * from pharmacy_category where pharmacy_brand='$pharmacy_brand' AND pharmacy_category ='$pharmacy_category'") or die(mysql_error()); ;
			   if($row = mysqli_fetch_assoc($r))
			   {
				   echo "<font color='red'>$pharmacy_category Already exist..</font>";
			   }
			   else
			   {
				$query1=mysqli_query($con,"insert into pharmacy_category values('','$pharmacy_brand','$pharmacy_category')");
				if($r = $query1)
				{
				echo "<script>alert('Added Succesfully'); window.location = './pharmacy_categories.php';</script>";
				}
				else
				{
					echo '<font color="red">Some error found</font>';
				}
			   }
			}
			 ?>
				
				  <h3>Pharmacy categories</h3>
				  <form class="form-horizontal" method="post">
					 <div class="form-group">
					  <label class="control-label col-sm-2" for="pharmacy_brand">pharmacy</label>
					  <div class="col-sm-4">
						<select name="pharmacy_brand" class="form-control">
						 <?php	$selectss =mysqli_query($con,"SELECT * FROM pharmacy_brand");
									while ($rowss=mysqli_fetch_array($selectss)) 		{	 ?>
						<option value="<?php echo $rowss['pharmacy_brand_id']; ?>"><?php echo $rowss['pharmacy_brand']; ?></option>
						<?php } ?>
						</select>
					  </div>
					</div>
				 	<div class="form-group">
					  <label class="control-label col-sm-2" for="pharmacy_category">category</label>
					  <div class="col-sm-4">
						<input type="text" class="form-control" name="pharmacy_category" id="pharmacy_category" placeholder="Enter category" required>
					  </div>
					</div>
					<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="submit" class="btn btn-warning">Submit</button>
					  </div>
					</div>
				  </form>
				  <table class="table">
				<tr bgcolor="#ccc">
					<th>Pharmacy</th>
					<th>Categories</th>
					</tr>
				<?php
				$select_brand =mysqli_query($con,"SELECT * FROM pharmacy_brand");
				while ($row_brand=mysqli_fetch_array($select_brand)) 
				{
				$select_category =mysqli_query($con,"SELECT * FROM pharmacy_category");
				while ($row_category=mysqli_fetch_array($select_category)) 
				{
					if($row_brand['pharmacy_brand_id']==$row_category['pharmacy_brand'])
					{
				  ?>
				   <tr>
				   <td><?php echo $row_brand['pharmacy_brand'];?></td>
				   <td><?php echo $row_category['pharmacy_category'];?></td>
				   </tr>
				 <?php  }   }  }	?>

				</table>
					</div>	