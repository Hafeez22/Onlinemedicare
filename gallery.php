<div class="container">
				<?php 
				include('session.php');
				include('admin/db.php');
				include('reg_top.php');

				$path='/pharmacy/uploads/';				
				  ?>
				 
			 <div class="container">
			  <form class="form-horizontal" method="post" enctype="multipart/form-data">
			 <div class="col-sm-4">
					<?php
					$query = "SELECT * FROM pharmacy_category";
					$result = mysqli_query ($con,$query);
					echo "<select name='pharmacy_category' class='form-control' value=''><option>Select category</option>";
					while($r = mysqli_fetch_assoc($result)) {
					  echo "<option value=".$r['pharmacy_category_id'].">".$r['pharmacy_category']."</option>"; 
					} 
					echo "</select>";
						?></div> 						
				<div class="col-sm-2">
			 <button type="submit" name="submit" class="btn btn-success">View product</button>
			</div>
			</form>
			</div>
			<br>
			<h3><font color="green">All Products</font></h3>
       <div class="row">
	   <form class="form-horizontal" method="post" enctype="multipart/form-data">
	  <?php
	  
	 $select_brand =mysqli_query($con,"SELECT * FROM pharmacy_category");
							while ($row_brand=mysqli_fetch_array($select_brand)) 
							{				
			 $select_stock =mysqli_query($con,"SELECT * FROM pharmacy_stocks ");
							while ($row_stock=mysqli_fetch_array($select_stock)) 
							{
							if($row_brand['pharmacy_category_id']==$row_stock['pharmacy_category'])
								{
			 if(empty($_POST['pharmacy_category']))
						  {			 	
							 ?>
				 <div class="col-sm-4"> 
				 <div class="panel-group">	
				 <div class="panel panel-default"> 	
                  <div class="panel-heading">
				<?php echo '<b>'.$row_stock['medicine_brand'].'</b><br>'; ?>
				  </div>
				  <div class="panel-body">				  
				  <?php 
				 echo '<b>Combination generics</b>&emsp;:&emsp;'.$row_stock['combination_generics'].'<br>';
				 echo '<b>Type</b>&emsp;:&emsp;'.$row_brand['pharmacy_category'].'<br>';
				 echo '<b>Price</b>&emsp;:&emsp;'.$row_stock['price'].'<br>';
				 echo '<b>Discount</b>&emsp;:&emsp;'.$row_stock['discount'].'<br><br>';
				 echo '<img class="img-responsive" style="width:200px;height:100px;" src="'.$path.'/'.$row_stock['file'].'">';
				
				?> 
				 <br>
				
		 <a class="btn btn-success" style="float:right;" href="buy_order.php?stock_id=<?php echo $row_stock["pharmacy_stocks_id"];?>">
				View</a>
				 </div>
			     </div>  
				 </div>
				 </div>
				<?php  }   
						 
                     if(isset($_POST['pharmacy_category']))
						  {						  
			 		if($row_stock['pharmacy_category']==$_POST['pharmacy_category'])
							{	
                             ?>
				 <div class="col-sm-4"> 
				 <div class="panel-group">	
				 <div class="panel panel-default"> 	
                  <div class="panel-heading">
				<?php echo '<b>'.$row_stock['medicine_brand'].'</b><br>'; ?>
				  </div>
				  <div class="panel-body">				  
				  <?php 
				 echo '<b>Combination generics</b>&emsp;:&emsp;'.$row_stock['combination_generics'].'<br>';
				 echo '<b>Type</b>&emsp;:&emsp;'.$row_brand['pharmacy_category'].'<br>';
				 echo '<b>Price</b>&emsp;:&emsp;'.$row_stock['price'].'<br>';
				 echo '<b>Quantity</b>&emsp;:&emsp;'.$row_stock['quantity'].'<br>';
				 echo '<b>Expiry date</b>&emsp;:&emsp;'.$row_stock['expiry_date'].'<br>';
				 echo '<b>Discount</b>&emsp;:&emsp;'.$row_stock['discount'].'<br><br>';
				 echo '<img class="img-responsive" style="width:200px;height:100px;" src="'.$path.'/'.$row_stock['file'].'">'; 
				 
				 ?> 
				 <br>
				 <a class="btn btn-success" style="float:right;" href="buy_order.php?stock_id=<?php echo $row_stock["pharmacy_stocks_id"];?>">
				View</a>
                 </div>
			     </div>  
				 </div>
				 </div> 
						  <?php	}   } }  }  }   ?>
						   

 </form>
 </div>

 </div>
 