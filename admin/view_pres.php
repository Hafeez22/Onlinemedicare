<div class="container">
 <?php 
 session_start();
 include('top.php');   
 include('../admin/db.php');
			 ?>
 
     <h3>View Doctor Prescription</h3>
  
	<div class="table-responsive">  
	<form method="post" action="">
		
	<table class="table">
				<tr bgcolor="#ccc">
				
					<th>Symptoms</th>
					<th>Tablet Name</th>
					<th>Doctor Name</th>
					</tr>
				<?php
					
					$sql=mysqli_query($con,"select * from add_prescription");
					while($r=mysqli_fetch_array($sql))
					{
						?>
						 <tr>
				
				   <td><?php echo $r['symptoms'];?></td>
				   <td><?php echo $r['tablet_name'];?></td>
				   <td><?php echo $r['doctor_name'];?></td>
				   </tr>
					<?php }?>
				</table>
	      </form>
	      </div>
	      </div>
  
