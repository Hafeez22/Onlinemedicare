<?php 

include('top.php'); 
include('../admin/db.php');
?>
<?php
//ob_start();
include("../admin/db.php");
$query ="SELECT * FROM add_medicine";
$student_data =mysqli_query($con,$query);
$stud_col = array();
while ($fetch_data = mysqli_fetch_assoc($student_data))
{
  //  $products_col[] = array('piece' => $fetch_data['hsn_sac'], 'key' => $fetch_data['unit_price'], 'value' => $fetch_data['name'] );

      $stud_col[] = array('value' => $fetch_data['bname'] );

  }
$student_col_json = json_encode($stud_col);


?>
<div class="container">
<form method="post">
<input type="text" name="find" id="sear" class="form-control" style="width:350px;" placeholder="Enter Medicine Name"  required//>
<input type="submit" name="search" style="float:left;position:relative;left:360px;top:-30px;" value="Search" >			
</form>

	<?php   
	if(isset($_POST['search']))
	{
	
	echo "<h3>View Medicine </h3>";
 echo "<table class='table'>";
	echo "<tr bgcolor='#ccc'>";
	echo "<th style='text-align:center;'>Id</th>";
	echo "<th style='text-align:center;'>Medical Name</th>";
	echo "<th style='text-align:center;'>Brand Name</th>";
	echo "<th style='text-align:center;'>Price</th>";
	echo "<th style='text-align:center;'>Qty Available</th>";
	
	echo "</tr>	";
	// $qu= mysqli_query($con,"SELECT * FROM students_project");
	 
	 
	//while($row=mysqli_fetch_array($qu))
	 {
		 $na=$_REQUEST['find'];
		//echo "name :".$na;
	    $query =mysqli_query($con, "SELECT * FROM add_medicine where bname like '%$na%'");
		//$result = mysqli_query($con,$query);
		while($r = mysqli_fetch_array($query)) 
		{
	?>
	<tr>	
	<?php  
	echo "<td style='text-align:center;'>".$r['id']."</td>";   
	echo "<td style='text-align:center;'>".$r['mname']."</td>";
	echo "<td style='text-align:center;'>".$r['bname']."</td>";   
	echo "<td style='text-align:center;'>".$r['price']."</td>";   
	echo "<td style='text-align:center;'>".$r['available_qty']."</td>";   
		
		?>
	</tr>
<?php }} }?>
	</table>
	</div>
		

	</body>
	</html>