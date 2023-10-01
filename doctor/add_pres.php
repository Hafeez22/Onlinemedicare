<div class="container">
 <?php 
 ob_start();
 session_start();

 include('top.php');   
 include('../admin/db.php');

 if(isset($_POST['submit']))
			{
			
			//$pharmacy_brand=$_POST['pharmacy_brand'];	
			$sympt=$_POST['sympt'];	
			$m_name=$_POST['m_name'];	
			$usr=$_SESSION['dname'];
			//$qual=$_SESSION['qual'];
			//	$usr=$_SESSION['name'];
			$query1=mysqli_query($con,"insert into add_prescription values('','$sympt','$m_name','$usr')");
				if($r = $query1)
				{
				echo "<script>alert('Added Succesfully'); window.location = './add_pres.php';</script>";
				}
				else
				{
					echo '<font color="red">Some error found</font>';
				}
			   }
		
			
		
			 ?>
 
     <h3>Add Prescription</h3>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
		
	 <div class="form-group">
		  <label class="control-label col-sm-2" for="pharmacy_category">Symptoms</label>
		  <div class="col-sm-4">
			<input type="text" class="form-control" name="sympt" id="medicine_brand" placeholder="Enter Symptoms" required>
    <!--<select class="form-control" name="sympt" id="country">
		<option>Fever</option>
		<option>Cold</option>
		
    </select>-->
	</div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="medicine_brand">Name</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="m_name" id="medicine_brand" placeholder="Enter Medicine Name" required>
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
  
