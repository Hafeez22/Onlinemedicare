<div class="container">
				<?php 
				include('session.php');
				include('admin/db.php');
				include('reg_top.php');

				$path='/pharmacy/uploads/';				
				  ?>
			
       <div class="row">
	   <form class="form-horizontal" method="post" enctype="multipart/form-data">
	  <?php
			  $id = $_GET['id'];
			  $error='';
			  if(isset($_POST['cancel']))
			{
         	$order_stocks_id=$_POST['order_stocks_id'];	//var_dump($order_stocks_id);
         	$pharmacy_stock_id=$_POST['pharmacy_stock_id'];//var_dump($pharmacy_stock_id);
            			
            $querry1=mysqli_query($con,"DELETE FROM pharmacy_order_stocks WHERE order_stocks_id = '$id'"); 
			$stock_quantity=$_POST['stock_quantity'];//var_dump($stock_quantity);
		    $update_query=mysqli_query($con,"update pharmacy_stocks set quantity='$stock_quantity' where pharmacy_stocks_id='$pharmacy_stock_id'");
			if($r = $querry1 && $update_query)
			{
			echo "<script>alert('Order canceled Succesfully'); window.location = './carts.php';</script>";
			}
			else
			{
				echo '<font color="red">Some error found</font>';
			}   
			}
			if(isset($_POST['payment']))
			{
         	$user_id=$user_id;	
         	$user_name=$user_name;	
         	$order_stocks_id=$_POST['order_stocks_id'];	
         	$pharmacy_stock_id=$_POST['pharmacy_stock_id'];	
         	$pharmacy_brand=$_POST['pharmacy_brand'];	
			$pharmacy_category=$_POST['pharmacy_category'];	
			$medicine_brand=$_POST['medicine_brand'];	
			$combination_generics=$_POST['combination_generics'];	
			$quantity=$_POST['quantity'];	
			$expiry_date=$_POST['expiry_date'];	
			$price=$_POST['price'];	
			$file=$_POST['file'];	
			$discount=$_POST['discount'];	
			$payment_date=date('d/m/Y');
			$stock_status='1';
            $card_no=$_POST['card_no'];			
            $bank_name=$_POST['bank_name'];			
            $cvv_no=$_POST['cvv_no'];			
            $card_holder_name=$_POST['card_holder_name'];			
			$query1=mysqli_query($con,"insert into pharmacy_paid_stocks values('','$order_stocks_id','$pharmacy_stock_id','$user_id','$user_name','$pharmacy_brand','$pharmacy_category',
			'$medicine_brand','$file','$combination_generics','$quantity','$price','$expiry_date','$discount',
			'$payment_date','$stock_status','$card_no','$bank_name','$cvv_no','$card_holder_name')");
		    $update_query=mysqli_query($con,"update pharmacy_order_stocks set stock_status='$stock_status'where order_stocks_id='$order_stocks_id'");
			if($r = $query1 && $update_query )
			{
			echo "<script>alert('Paid Succesfully'); window.location = './view_orders.php';</script>";
			}
			else
			{
				echo '<font color="red">Some error found</font>';
			}
		    }  
       
			 $select_brand =mysqli_query($con,"SELECT * FROM pharmacy_category");
							while ($row_brand=mysqli_fetch_array($select_brand)) 
							{				
			 $select_stock =mysqli_query($con,"SELECT * FROM pharmacy_order_stocks where order_stocks_id='$id' ");
							while ($row_stock=mysqli_fetch_array($select_stock)) 
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
				 <div class="col-sm-8"> 
				 <div class="panel-group">	
				 <div class="panel panel-default"> 	
                  <div class="panel-heading">
				<?php echo '<center><b>'.$row_stock['medicine_brand'].'</b><br></center>'; ?>
				  </div>
				  <div class="panel-body">				  
				  <?php 
				 echo '<b>Combination generics</b>&emsp;:&emsp;'.$row_stock['combination_generics'].'<br>';
				 echo '<b>Type</b>&emsp;:&emsp;'.$row_brand['pharmacy_category'].'<br>';
				 echo '<b>Quantity</b>&emsp;:&emsp;'.$row_stock['quantity'].'<br>';
				 echo '<b>Price</b>&emsp;:&emsp;'.$row_stock['price'].'<br>';
                 echo '<b>Discount</b>&emsp;:&emsp;'.$row_stock['discount'].'<br><br>';
				 echo '<img class="img-responsive" style="width:300px;height:250px;" src="'.$path.'/'.$row_stock['file'].'"></center>'; 
				 echo '<table><td><input type="hidden" name="pharmacy_stock_id" value='.$row_stock['pharmacy_stock_id'].'></td>
			       <td><input type="hidden" name="order_stocks_id" value='.$row_stock['order_stocks_id'].'></td>
				  <td><input type="hidden" name="pharmacy_brand" value='.$row_stock['pharmacy_brand'].'></td>
				  <td><input type="hidden" name="pharmacy_category" value='.$row_stock['pharmacy_category'].'></td>
				 <td> <input type="hidden" name="medicine_brand" value='.$row_stock['medicine_brand'].'></td>
				<td> <input type="hidden" name="file" value='.$row_stock['file'].'></td>
				<td> <input type="hidden" name="quantity" value='.$row_stock['quantity'].'></td>
				<td> <input type="hidden" name="price" value='.$row_stock['price'].'></td>
				<td> <input type="hidden" name="combination_generics" value='.$row_stock['combination_generics'].'></td>
				 <td><input type="hidden" name="expiry_date" value='.$row_stock['expiry_date'].'></td>
				  <input type="hidden" name="stock_quantity" value='.$mul.'>
				<td> <input type="hidden" name="discount" value='.$row_stock['discount'].'></td></table>';
				 
				 ?> 
				 <br>
				<center> 
			<button type="submit" name="cancel" class="btn btn-danger">Remove</button>
		       </div>
			     </div>  
				 </div>
				 </div>
								<?php  }  }  }   ?>
						   
 </form>
 </div>

 </div>
 