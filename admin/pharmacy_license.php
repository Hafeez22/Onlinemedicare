<div class="container">
 <?php include('top.php');   
 include('db.php');

 if(isset($_POST['submit']))
			{
         	$pharmacy_brand=$_POST['pharmacy_brand'];	
			$address=$_POST['address'];	
			$shop_size=$_POST['shop_size'];	
			$due_period=$_POST['due_period'];	
			$start_date=$_POST['start_date'];	
			$end_date=$_POST['end_date'];	
			$query1=mysqli_query($con,"insert into pharmacy_license values('','$pharmacy_brand','$address',
			'$shop_size','$due_period','$start_date','$end_date')");
				if($r = $query1)
				{
				echo "<script>alert('Added Succesfully'); window.location = './pharmacy_license.php';</script>";
				}
				else
				{
					echo '<font color="red">Some error found</font>';
				}
			   }
			    if(isset($_POST['update']))
			{
         	$pharmacy_license_id=$_POST['pharmacy_license_id'];	
         	$pharmacy_brand=$_POST['pharmacy_brand'];	
			$address=$_POST['address'];	
			$shop_size=$_POST['shop_size'];	
			$due_period=$_POST['due_period'];	
			$start_date=$_POST['start_date'];	
			$end_date=$_POST['end_date'];	
			$query1=mysqli_query($con,"UPDATE pharmacy_license  SET pharmacy_brand='$pharmacy_brand',address='$address',
			shop_size='$shop_size',due_period='$due_period',start_date='$start_date',end_date='$end_date' WHERE 
			pharmacy_license_id='$pharmacy_license_id'");
				if($r = $query1)
				{
				echo "<script>alert('Updated Succesfully'); window.location = './pharmacy_license.php';</script>";
				}
				else
				{
					echo '<font color="red">Some error found</font>';
				}
			   }
			 ?>
 
     <h3>License details</h3>
          <?php  $x=0; 
		  $select_stock =mysqli_query($con,"SELECT * FROM pharmacy_license");
				while ($row_stock=mysqli_fetch_assoc($select_stock)) 
				{  
              //$demo=$row_stock['start_date'];
              $demo=date('d-m-Y');
					$demo1=$row_stock['end_date'];
					$datetime1 = new DateTime(''.$demo.'');
					$datetime2 = new DateTime(''.$demo1.'');
					$interval = $datetime1->diff($datetime2);
					$inter= $interval->format('%R %a');
			  $x++;
			if(isset($row_stock)) {   ?>
				 <form class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="form-group">
		  <label class="control-label col-sm-2" for="pharmacy_brand">pharmacy</label>
		  <div class="col-sm-4">
     <input type="text" readonly class="form-control" name="pharmacy_brand"  value="ABC PHARMACY">
	</div>
	</div>
   <div class="form-group">
	  <label class="control-label col-sm-2" for="address">Address</label>
	  <div class="col-sm-4">
		<textarea name="address" class="form-control">
	<?php echo $row_stock['address']; ?></textarea>
	  </div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="shop_size">Shop size</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="shop_size" value="<?php echo $row_stock['shop_size']; ?>">
	  </div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="due_period">Due period</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="due_period" value="<?php echo $row_stock['due_period']; ?>">
	  </div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="start_date">start date</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="start_date" id="birthday" value="<?php echo $row_stock['start_date']; ?>">
	  </div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="end_date">expiry date</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="end_date" id="birthday1" value="<?php echo $row_stock['end_date']; ?>">
		<input type="hidden" name="pharmacy_license_id" value="<?php echo $row_stock['pharmacy_license_id']; ?>">
	  </div>
	</div>
			<?php if(date('d-m-Y')==$demo1 || $demo1 < $inter)  {    ?>
				<div class="form-group">
	  <label class="control-label col-sm-2" for="start_date"></label>
	  <div class="col-sm-4" style="background-color:red">
	 <font color="#FFF"><b><?php echo 'Expiry in '.$inter.' days';?></b></font>
	  </div>
	</div>
	<?php }   else { echo '
	<div class="form-group">
	  <label class="control-label col-sm-2" for="start_date"></label>
	  <div class="col-sm-4" style="background-color:orange">
	<font color="#FFF"><b>Expiry in '.$inter.' days</b></font>
	  </div>
	</div>';   } ?>
	<div class="form-group">        
	  <div class="col-sm-offset-2 col-sm-10">
		<button type="submit" name="update" class="btn btn-success">Update</button>
	  </div>
	</div>
				</form> 
				<?php }   }  if($x=='0') {?>
				 <form class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="form-group">
		  <label class="control-label col-sm-2" for="pharmacy_brand">pharmacy</label>
		  <div class="col-sm-4">
    <input type="text" readonly class="form-control" name="pharmacy_brand"  value="ABC PHARMACY">
	</div>
	</div>
   <div class="form-group">
	  <label class="control-label col-sm-2" for="address">Address</label>
	  <div class="col-sm-4">
		<textarea type="text" class="form-control" name="address" id="address" placeholder="Enter address" required>
	  </textarea>
	  </div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="shop_size">Shop size</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="shop_size" id="shop_size" placeholder="Enter shop size" required>
	  </div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="due_period">Due period</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="due_period" id="due_period" placeholder="Enter due period" required>
	  </div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="start_date">start date</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="start_date" id="birthday" placeholder="Enter start date" required>
	  </div>
	</div>
	<div class="form-group">
	  <label class="control-label col-sm-2" for="end_date">expiry date</label>
	  <div class="col-sm-4">
		<input type="text" class="form-control" name="end_date" id="birthday1" placeholder="Enter end date" required>
	  </div>
	</div>
	<div class="form-group">        
	  <div class="col-sm-offset-2 col-sm-10">
		<button type="submit" name="submit" class="btn btn-warning">Submit</button>
	  </div>
	</div>
				</form>
				<?php } ?>
	</div>

  <script type="text/javascript">
      var datefield=document.createElement("input")
      datefield.setAttribute("type", "date")
      if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
         document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
      }
   </script>

 <script>
    if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
       jQuery(function($){ //on document.ready
	   $("#birthday").datepicker({ dateFormat: 'dd-mm-yy' });
      $("#birthday1").datepicker({ dateFormat: 'dd-mm-yy' });
       })
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

 <script>
    if (datefield.type=="date"){ //if browser doesn't support input type="date", initialize date picker widget:
       jQuery(function($){ //on document.ready
	   $("#birthday").datepicker({ dateFormat: 'dd-mm-yy' });
      $("#birthday1").datepicker({ dateFormat: 'dd-mm-yy' });
       })
    }
 </script>