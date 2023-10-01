<div class="container">
			<?php include('session.php'); include('admin/db.php'); include('reg_top.php'); ?>	
			<div class="table-responsive">
      <form method="post" action="">
	   <?php 				
				$path='/pharmacy/uploads/';	
	 			if(isset($_POST['cancel']))
		        {
                $order_stocks_id=$_POST['order_stocks_id'];
				$pharmacy_stock_id=$_POST['pharmacy_stock_id'];var_dump($pharmacy_stock_id);
							
			    $querry1=mysqli_query($con,"DELETE FROM pharmacy_order_stocks WHERE order_stocks_id = '$order_stocks_id'"); 
				$stock_quantity=$_POST['stock_quantity'];
			    $update_query=mysqli_query($con,"update pharmacy_stocks set quantity='$stock_quantity' where pharmacy_stocks_id='$pharmacy_stock_id'");
				if($r = $querry1 && $update_query)
				{
				echo "<script>alert('Order canceled Succesfully'); window.location = './view_orders.php';</script>";
				}
				else
				{
					echo '<font color="red">Some error found</font>';
				} 
			   }  				
				  ?>				  
	     <table class="table">
				<tr bgcolor="#ccc">
					<th>Order date</th>
				   <th>Categories</th>
					<th>brand</th>
					<th>Preview</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Action</th>
					</tr>
				<?php
				$select_brand =mysqli_query($con,"SELECT * FROM pharmacy_category");
				while ($row_brand=mysqli_fetch_assoc($select_brand)) 
				{
				$select_stock =mysqli_query($con,"SELECT * FROM pharmacy_order_stocks where user_id='$user_id'
				AND stock_status != '0' order by order_date DESC ");
				while ($row_stock=mysqli_fetch_assoc($select_stock)) 
				{
					$pharmacy_stocks_identify=$row_stock['pharmacy_stock_id'];
				  $stock_old =mysqli_query($con,"SELECT * FROM pharmacy_stocks where pharmacy_stocks_id= '$pharmacy_stocks_identify' ");
					while ($stocks=mysqli_fetch_assoc($stock_old)) 
					{
						$stock_old_quantity=$stocks['quantity'];
					} 
					 $price = $row_stock['quantity'];  	    
					$stock =$stock_old_quantity;  
					$mul=$stock  + $price;
					if($row_brand['pharmacy_category_id']==$row_stock['pharmacy_category'])
					{				                       		
				   ?>
				   <tr>
				   <td><?php echo $row_stock['order_date'];?></td>
				   <td><?php echo $row_brand['pharmacy_category'];?></td>
				   <td><?php echo $row_stock['medicine_brand'];?></td>
				   <td><?php echo "<img src='".$path."/".$row_stock["file"]."' class='img-responsive' style='width:90px;height:70px;'>";?></td>
				    <td><?php echo $row_stock['quantity'];?></td>
				   <td><?php echo $row_stock['price'];?></td>
				  <!--<td>
				<input type="hidden" name="pharmacy_stock_id" value="<?php echo  $row_stock['pharmacy_stock_id'];?>">
				 <input type="hidden" name="order_stocks_id" value="<?php echo $row_stock['order_stocks_id'];?>">
				 <input type="hidden" name="stock_quantity" value="<?php echo $mul;?>">
				 <a href="payment_pharmacy.php?id=<?php echo $row_stock['order_stocks_id'];?>" class="btn btn-info">
				 View</a>
				 </td>-->
					<td>
				<button type="button" class="btn btn-success">PAID</button>
				  </td>
				   </tr>
				  <?php     }   }  }	?>
                  
				</table>                   	
				</form>	
                    </div>						
                      </div>
 