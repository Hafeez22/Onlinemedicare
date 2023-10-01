<div class="container">
 <?php include('top.php');   
 include('../admin/db.php');
			 ?>
 
     <h3>View Doctor</h3>
  
	<div class="table-responsive">  

		  
		  <form method="post">
		   <?php
   
    $query = mysqli_query($con,"SELECT * FROM doctor_spec");
    $rowCount = mysqli_num_rows($query);
    ?>
    <select class="form-control" name="dcat" style="width:300px;" id="spec">
        <option value="">Select category</option>
        <?php
        if ($rowCount >  0) { 
            while($row = mysqli_fetch_assoc($query)){ 
                echo '<option value="'.$row['spec'].'">'.$row['spec'].'</option>';
            }
        }
	   else {
		echo '<option value="">State not available</option>';
		}
        ?>
<input type="submit" name="submit" style="float:left;position:relative;left:310px;top:-30px;" value="View"  />			
</form>

<?php   
	if(isset($_POST['submit']))
	{
	
	echo "<h3>View Doctor</h3>";
 echo "<table class='table'>";
	echo "<tr bgcolor='#ccc'>";
	echo "<th style='text-align:center;'>Specialist</th>";
	echo "<th style='text-align:center;'>Name</th>";
	echo "<th style='text-align:center;'>Qualification</th>";
	echo "<th style='text-align:center;'>Experience</th>";
	echo "<th style='text-align:center;'>File</th>";
	echo "<th style='text-align:center;'>Address</th>";
	echo "<th style='text-align:center;'>Mobile</th>";
	
	echo "</tr>	";
	// $qu= mysqli_query($con,"SELECT * FROM students_project");
	 
	 
	//while($row=mysqli_fetch_array($qu))
	 {
		 $scat=$_POST['dcat'];
		//echo "name :".$na;
	    $query =mysqli_query($con, "SELECT * FROM add_doctor where specialist='$scat'");
		//$result = mysqli_query($con,$query);
		while($r = mysqli_fetch_array($query)) 
		{
	?>
	<tr>	
	<?php  
		$path='/medical_rep/uploads/';
	echo "<td style='text-align:center;'>".$r['specialist']."</td>";   
	echo "<td style='text-align:center;'>".$r['name']."</td>";
	echo "<td style='text-align:center;'>".$r['qualification']."</td>";   
	echo "<td style='text-align:center;'>".$r['experience']."</td>";   
	echo "<td style='text-align:center;'>"."<img src='".$path."/".$r["file"]."' class='img-responsive' style='width:90px;height:70px;'>"."</td>";   
	echo "<td style='text-align:center;'>".$r['address']."</td>";   
	echo "<td style='text-align:center;'>".$r['mobile']."</td>";   

		?>
	</tr>
<?php }} }?>
	</table>

	      </div>
	      </div>
  
