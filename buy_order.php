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
			  $id = $_GET['stock_id'];
			  $error='';
			  if(isset($_POST['buy']))
			{
         	$user_id=$user_id;	
         	$user_name=$user_name;	
         	$pharmacy_stocks_id=$_POST['pharmacy_stocks_id'];	
         	$pharmacy_brand=$_POST['pharmacy_brand'];	
			$pharmacy_category=$_POST['pharmacy_category'];	
			$medicine_brand=$_POST['medicine_brand'];	
			$combination_generics=$_POST['combination_generics'];	
			$quantity=$_POST['quantity'];	
			$expiry_date=$_POST['expiry_date'];	
			$price=$_POST['price'];	
			$file=$_POST['file'];	
			$discount=$_POST['discount'];	
			$order_date=date('d/m/Y');	
			$stock_status='0';	
			$stock_quantity=$_POST['stock_quantity'];
			$select_stock =mysqli_query($con,"SELECT * FROM pharmacy_stocks where pharmacy_stocks_id='$id' AND quantity <= ".$_POST['quantity']."");
			$stock=mysqli_fetch_assoc($select_stock);
			if($stock) 
			{
			$error = "<font color='red'>Quantity available is ".$stock['quantity']."</font>";
			}
            else
		    {			
			$query1=mysqli_query($con,"insert into pharmacy_order_stocks values('','$pharmacy_stocks_id','$user_id','$user_name','$pharmacy_brand','$pharmacy_category',
			'$medicine_brand','$file','$combination_generics','$quantity','$price','$expiry_date','$discount','$order_date','$stock_status')");
		   $update_query=mysqli_query($con,"update pharmacy_stocks set quantity='$stock_quantity'where pharmacy_stocks_id='$id'");
			if($r = $query1 && $update_query)
			{
			echo "<script>alert('Ordered Succesfully'); window.location = './gallery.php';</script>";
			}
			else
			{
				echo '<font color="red">Some error found</font>';
			}
		    }   
			}
       
			 $select_brand =mysqli_query($con,"SELECT * FROM pharmacy_category");
							while ($row_brand=mysqli_fetch_array($select_brand)) 
							{				
			 $select_stock =mysqli_query($con,"SELECT * FROM pharmacy_stocks where pharmacy_stocks_id='$id' ");
							while ($row_stock=mysqli_fetch_array($select_stock)) 
							{
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
				 echo '<b>Price</b>&emsp;:&emsp;'.$row_stock['price'].'<br>';
                 echo '<b>Discount</b>&emsp;:&emsp;'.$row_stock['discount'].'<br><br>';
				 echo '<img class="img-responsive" style="width:300px;height:250px;" src="'.$path.'/'.$row_stock['file'].'"></center>'; 
				 echo '<table><td><input type="hidden" name="pharmacy_stocks_id" value='.$row_stock['pharmacy_stocks_id'].'></td>
				  <td><input type="hidden" name="pharmacy_brand" value='.$row_stock['pharmacy_brand'].'></td>
				  <td><input type="hidden" name="pharmacy_category" value='.$row_stock['pharmacy_category'].'></td>
				 <td> <input type="hidden" name="medicine_brand" value='.$row_stock['medicine_brand'].'></td>
				<td> <input type="hidden" name="file" value='.$row_stock['file'].'></td>
				<td> <input type="hidden" name="combination_generics" value='.$row_stock['combination_generics'].'></td>
				 <td><input type="hidden" name="expiry_date" value='.$row_stock['expiry_date'].'></td>
				<td> <input type="hidden" name="discount" value='.$row_stock['discount'].'></td></table>';
				 
				 ?> 
				 <br>
				<center> 
			<?php echo $error; ?>			
			<label for="">Quantity :&emsp; </label><input type="text" name="quantity" required></input>
          <script>
				function calculateArea() {

			var quantity = document.getElementsByName('quantity')[0].value;
			var price = <?php echo $row_stock['price'];  ?>;
		    var out =  parseFloat(price) * parseFloat(quantity);

			document.getElementsByName('price')[0].value= out;
			
			var stock = <?php echo $row_stock['quantity'];  ?>;
		    var out1 =  parseFloat(stock) - parseFloat(quantity);

			document.getElementsByName('stock_quantity')[0].value= out1;

			}
			</script>
        <input type="button" onClick="calculateArea()" value="Total price" class="btn btn-success"><br><br>
		<label for="output">Total price: </label><input type="text" name="price"></input>
		<input type="hidden" name="stock_quantity"></input>
			&emsp;<button type="submit" name="buy" class="btn btn-success">BUY</button></center>
                 </div>
			     </div>  
				 </div>
				 </div>
								<?php  }  }  }   ?>
						   

 </form>
 </div>

 </div>
 