<?php 

include('top.php'); 
include('../admin/db.php');
?>
<?php
//ob_start();
include("../admin/db.php");
$query ="SELECT * FROM add_prescription";
$student_data =mysqli_query($con,$query);
$stud_col = array();
while ($fetch_data = mysqli_fetch_assoc($student_data))
{
  //  $products_col[] = array('piece' => $fetch_data['hsn_sac'], 'key' => $fetch_data['unit_price'], 'value' => $fetch_data['name'] );

      $stud_col[] = array('value' => $fetch_data['symptoms'] );

  }
$student_col_json = json_encode($stud_col);


?>
<div class="container">
<form method="post">
<input type="text" name="find" id="sear" class="form-control" style="width:350px;" placeholder="Enter symptoms to find tablet(for eg:cold or fever)"  required//>
<input type="submit" name="search" style="float:left;position:relative;left:360px;top:-30px;" value="Search" >			
</form>

	<?php   
	if(isset($_POST['search']))
	{
	
	echo "<h3>View Prescription</h3>";
 echo "<table class='table'>";
	echo "<tr bgcolor='#ccc'>";
	echo "<th style='text-align:center;'>Symptoms</th>";
	echo "<th style='text-align:center;'>Tablet Name</th>";
	echo "<th style='text-align:center;'>Doctor Name</th>";
	
	echo "</tr>	";
	// $qu= mysqli_query($con,"SELECT * FROM students_project");
	 
	 
	//while($row=mysqli_fetch_array($qu))
	 {
		 $na=$_REQUEST['find'];
		//echo "name :".$na;
	    $query =mysqli_query($con, "SELECT * FROM add_prescription where symptoms like '%$na%'");
		//$result = mysqli_query($con,$query);
		while($r = mysqli_fetch_array($query)) 
		{
	?>
	<tr>	
	<?php  
	echo "<td style='text-align:center;'>".$r['symptoms']."</td>";   
	echo "<td style='text-align:center;'>".$r['tablet_name']."</td>";
	echo "<td style='text-align:center;'>".$r['doctor_name']."</td>";   
		
		?>
	</tr>
<?php }} }?>
	</table>
	</div>
		<script>
			$(function () {				
							var availableTags = <?php echo $student_col_json; ?>;	
							$("#sear").autocomplete({
								autoFocus: true,
								source: availableTags,
								select: function (event, ui) {
									$("#sear").val(ui.item.value);
								
									
									return false;
								}
		});
		
		
       });
  			</script>
				<script type="text/javascript">
      var datefield=document.createElement("input")
      datefield.setAttribute("type", "date")
      if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
         document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
      }
   </script>
   <script type="text/javascript">
      var datefield=document.createElement("input")
      datefield.setAttribute("type", "date")
      if (datefield.type=="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
         document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
      }
   </script>

	</body>
	</html>