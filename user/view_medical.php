<div class="container">
 <?php include('top.php');   
 include('../admin/db.php');
			 ?>
 
     <h3>View Medical</h3>
  
	<div class="table-responsive">  

		  
		  <form method="post">
		   <?php
   
    $query = mysqli_query($con,"SELECT * FROM medical_cat");
    $rowCount = mysqli_num_rows($query);
    ?>
    <select class="form-control" name="mcat" style="width:300px;" id="spec">
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
<input type="submit" name="submit" style="float:left;position:relative;left:310px;top:-30px;" value="View"  />			
</form>

<?php   
	if(isset($_POST['submit']))
	{
	
	echo "<h3>View Medical</h3>";
 echo "<table class='table'>";
	echo "<tr bgcolor='#ccc'>";
	echo "<th style='text-align:center;'>Category</th>";
	echo "<th style='text-align:center;'>Medical Name</th>";
	echo "<th style='text-align:center;'>Address</th>";
	echo "<th style='text-align:center;'>Mobile</th>";
	
	echo "</tr>	";
	
	 
	 
	//while($row=mysqli_fetch_array($qu))
	 {
		 $mcat=$_POST['mcat'];
		//echo "name :".$na;
	    $query =mysqli_query($con, "SELECT * FROM add_medical where category='$mcat'");
		//$result = mysqli_query($con,$query);
		while($r = mysqli_fetch_array($query)) 
		{
	?>
	<tr>	
	<?php  
	echo "<td style='text-align:center;'>".$r['category']."</td>";   
	echo "<td style='text-align:center;'>".$r['mname']."</td>";
	echo "<td style='text-align:center;'>".$r['address']."</td>";   
	echo "<td style='text-align:center;'>".$r['mob']."</td>";   
		
		?>
	</tr>
<?php }} }?>
	</table>

	      </div>
	      </div>
  
