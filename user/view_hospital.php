<div class="container">
 <?php include('top.php');   
 include('../admin/db.php');
			 ?>
 
     <h3>View Hospital</h3>
  
	<div class="table-responsive">  

		  
		  <form method="post">
		   <?php
   
    $query = mysqli_query($con,"SELECT distinct pharmacy_category FROM add_hospital");
    $rowCount = mysqli_num_rows($query);
    ?>
    <select class="form-control" name="hcat" style="width:300px;" id="spec">
        <option value="">Select category</option>
        <?php
        if ($rowCount >  0) { 
            while($row = mysqli_fetch_assoc($query)){ 
                echo '<option value="'.$row['pharmacy_category'].'">'.$row['pharmacy_category'].'</option>';
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
	echo "<th style='text-align:center;'>Category</th>";
	echo "<th style='text-align:center;'>Hospital Name</th>";
	echo "<th style='text-align:center;'>Image</th>";
	echo "<th style='text-align:center;'>Address</th>";
	echo "<th style='text-align:center;'>Mobile</th>";
	
	echo "</tr>	";
	// $qu= mysqli_query($con,"SELECT * FROM students_project");
	 
	 
	//while($row=mysqli_fetch_array($qu))
	 {
		 $hcat=$_POST['hcat'];
		//echo "name :".$na;
	    $query =mysqli_query($con, "SELECT * FROM add_hospital where pharmacy_category='$hcat'");
		//$result = mysqli_query($con,$query);
		while($r = mysqli_fetch_array($query)) 
		{
	?>
	<tr>	
	<?php  
	$path='/medical_rep/uploads/';
	echo "<td style='text-align:center;'>".$r['pharmacy_category']."</td>";   
	echo "<td style='text-align:center;'>".$r['hosp_name']."</td>";
	echo "<td style='text-align:center;'>"."<img src='".$path."/".$r["file"]."' class='img-responsive' style='width:90px;height:70px;'>"."</td>";   
	echo "<td style='text-align:center;'>".$r['hosp_address']."</td>";   
	echo "<td style='text-align:center;'>".$r['hosp_mob']."</td>";   
		
		?>
	</tr>
<?php }} }?>
	</table>

	      </div>
	      </div>
  
