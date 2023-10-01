<div class="container">
 <?php include('top.php');   
 include('db.php');

 if(isset($_POST['submit']))
			{
			$path=$_SERVER['DOCUMENT_ROOT'].'/medical_rep/uploads';
			if ($_FILES["file"]["error"] > 0)
			{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			}
			else
			{
			if (file_exists("".$path."/" . $_FILES["file"]["name"]))
			{
			echo $_FILES["file"]["name"] . " already exists. ";
			}
			else
			{ 
			if(move_uploaded_file($_FILES["file"]["tmp_name"],"".$path."/" . $_FILES["file"]["name"]))
			{
			
			//$pharmacy_brand=$_POST['pharmacy_brand'];	
			$scat=$_POST['scat'];	
			$d_name=$_POST['name'];	
			$pwd=$_POST['password'];
			$qual=$_POST['qual'];	
			$exp=$_POST['expe'];
			$file=$_FILES['file']['name'];				
			$addr=$_POST['addr'];	
			$mob=$_POST['mob'];	
			
			$query1=mysqli_query($con,"insert into add_doctor values('','$scat','$d_name','$pwd','$qual',$exp,'$file','$addr','$mob')");
				if($r = $query1)
				{
				echo "<script>alert('Added Succesfully'); window.location = './add_doctor.php';</script>";
				}
				else
				{
					echo '<font color="red">Some error found</font>';
				}
			   }
			}
			}
			}
			 ?>
 
     <h3>Add Doctor</h3>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
		
	 <div class="form-group">
		  <label class="control-label col-sm-2" for="pharmacy_category">Specialist In</label>
		  <div class="col-sm-4">
    <?php
   
    $query = mysqli_query($con,"SELECT * FROM doctor_spec");
    $rowCount = mysqli_num_rows($query);
    ?>
    <select class="form-control" name="scat" id="country">
        <option value="">Select category</option>
        <?php
        if ($rowCount >  0) { 
            while($row = mysqli_fetch_assoc($query)){ 
                echo '<option value="'.$row['spec'].'">'.$row['spec'].'</option>';
            }
        }
	   else {
		echo '<option value="">Specialization not available</option>';
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
	  <label class="control-label col-sm-2" for="medicine_brand">Password</label>
	  <div class="col-sm-4">
		<input type="password" class="form-control" name="password" id="medicine_brand" placeholder="Enter Password" required>
	  </div>
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-2" for="medicine_brand">Qualification</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="qual" id="medicine_brand" placeholder="Enter Qualification" required>
	  </div>
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-2" for="medicine_brand">Experience</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="expe" id="medicine_brand" placeholder="Enter No of Experience(for eg: 1 or 2)" required>
	  </div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="file">Image</label>
	  <div class="col-sm-4">
		<input type="file"  name="file" id="file" placeholder="Enter file" required>
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
	<form method="post" action="">
		<?php  $path=''.$_SERVER['DOCUMENT_ROOT'].'/medical_rep/uploads';
		if(isset($_POST['submit1']))
		{
		$stock_id = $_POST['stock_id'];		
		$query1=mysqli_query($con,"select * from add_doctor where id='$stock_id'");
		$querry1=mysqli_query($con,"DELETE FROM add_doctor WHERE id = '$stock_id'");
		while($row_img=mysqli_fetch_assoc($query1))
		{
			$del_image=$row_img['file'];	
			unlink("$path/$del_image");
		}
		if($querry1 && $query1)
		{
		echo "<script>alert('Deleted Successfully'); window.location = './add_doctor.php';</script>";
		}
		} ?>	

	      </form>
	      </div>
	      </div>
  
