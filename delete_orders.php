<?php include('admin/db.php');
            if(isset($_POST['cancel']))
			{
         	$id=$_GET['id'];var_dump($id);	
         	$order_stocks_id=$_POST['order_stocks_id'];	var_dump($order_stocks_id);
         	$pharmacy_stock_id=$_POST['pharmacy_stock_id'];var_dump($pharmacy_stock_id);
            			
            //$querry1=mysqli_query($con,"DELETE FROM pharmacy_order_stocks WHERE order_stocks_id = '$id'"); 
			$stock_quantity=$_POST['stock_quantity'];var_dump($stock_quantity);
		   // $update_query=mysqli_query($con,"update pharmacy_stocks set quantity='$stock_quantity' where pharmacy_stocks_id='$pharmacy_stock_id'");
			if($r = $querry1 && $update_query)
			{
			//echo "<script>alert('Order canceled Succesfully'); window.location = './view_orders.php';</script>";
			}
			else
			{
				echo '<font color="red">Some error found</font>';
			}   
			}
			
			?>