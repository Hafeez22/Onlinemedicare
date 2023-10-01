<div class="container">
 <?php include('top.php');   
 include('db.php');

 if(isset($_POST['submit']))
			{
			
			//$pharmacy_brand=$_POST['pharmacy_brand'];	
			$mcat=$_POST['mcat'];	
			$mname=$_POST['name'];	
			
			$addr=$_POST['addr'];	
			$mob=$_POST['mob'];	
			
			$query1=mysqli_query($con,"insert into add_medical values('','$mcat','$mname','$addr','$mob')");
				if($r = $query1)
				{
				echo "<script>alert('Added Succesfully'); window.location = './add_medical.php';</script>";
				}
				else
				{
					echo '<font color="red">Some error found</font>';
				}
			   }
			
			 ?>
 
     <h3>Add Medical</h3>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
		
	 <div class="form-group">
		  <label class="control-label col-sm-2" for="pharmacy_category">Medical Category</label>
		  <div class="col-sm-4">
    <?php
   
    $query = mysqli_query($con,"SELECT * FROM medical_cat");
    $rowCount = mysqli_num_rows($query);
    ?>
    <select class="form-control" name="mcat" id="country">
        <option value="">Select category</option>
        <?php
        if ($rowCount >  0) { 
            while($row = mysqli_fetch_assoc($query)){ 
                echo '<option value="'.$row['cate'].'">'.$row['cate'].'</option>';
            }
        }
	   else {
		echo '<option value="">State not available</option>';
		}
        ?>
    </select>
	</div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="medicine_brand">Name</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="name" id="medicine_brand" placeholder="Enter Name" required>
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
	
	      </div>
  
