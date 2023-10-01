<div class="container">
			<?php include('session.php'); include('admin/db.php'); include('reg_top.php'); ?>	
			<div class="table-responsive">
      <form method="post" action="" enctype="multipart/form-data">
	   <?php 				
				$path='/pharmacy/uploads/';	
			if(isset($_POST['payment']))
			{
         	$user_id=$_POST['user_id'];	
         	$user_name=$_POST['user_name'];	
         	$price=$_POST['total_price'];	
			$payment_date=$_POST['payment_date'];
			$payment_mode=$_POST['payment_mode'];
			$stock_status=$_POST['stock_status'];
            $order_id=$_POST['order_id'];			
            $card_no=$_POST['card_no'];			
            $bank_name=$_POST['bank_name'];			
            $cvv_no=$_POST['cvv_no'];			
            $card_holder_name=$_POST['card_holder_name'];
            $query1=mysqli_query($con,"insert into pharmacy_paid_stocks values('','$user_id','$user_name',
			'$price','$payment_date','$payment_mode','$order_id','$card_no','$bank_name','$cvv_no','$card_holder_name')");
		    $update_query=mysqli_query($con,"UPDATE pharmacy_order_stocks SET stock_status='$order_id' WHERE user_id= '$user_id'
			AND stock_status='0'");
			
			if($r = $query1 && $update_query )
			{
		    echo "<script>alert('Paid Succesfully'); window.location = './carts.php';</script>";
			}
			else
			{
				echo '<font color="red">Some error found</font>';
			}
		    }  				
				  ?>				  
	     <table class="table">
				<tr bgcolor="#ccc">
					<th>Categories</th>
					<th>brand</th>
					<th>Preview</th>
					<th>Combination</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Discount</th>
					<th>Remove</th>
					</tr>
				<?php
				$date = date_default_timezone_set('Asia/Kolkata');
                 $today1 = date("dmy");
                 $order_id=''.$today1.''.date("gis").'';
				$sum =mysqli_query($con,"SELECT * FROM pharmacy_order_stocks WHERE user_id = '$user_id' AND stock_status = '0' ");
			$add='';	while($row_sum=mysqli_fetch_assoc($sum))
				{  
			    $add +=$row_sum['price'];  //var_dump($add);
				}
				$select_brand =mysqli_query($con,"SELECT * FROM pharmacy_category");
				while ($row_brand=mysqli_fetch_assoc($select_brand)) 
				{
				$select_stock =mysqli_query($con,"SELECT * FROM pharmacy_order_stocks where user_id='$user_id'");
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
                   if($row_stock['stock_status']=='0')  {				
				   ?>
				   <tr>
				   <td><?php echo $row_brand['pharmacy_category'];?></td>
				   <td><?php echo $row_stock['medicine_brand'];?></td>
				   <td><?php echo "<img src='".$path."/".$row_stock["file"]."' class='img-responsive' style='width:90px;height:70px;'>";?></td>
				   <td><?php echo $row_stock['combination_generics'];?></td>
				   <td><?php echo $row_stock['quantity'];?></td>
				   <td><?php echo $row_stock['price'];?></td>
				  <td><?php echo $row_stock['discount'];?></td>	
				  <td>
		 <a href="payment_pharmacy.php?id=<?php echo $row_stock['order_stocks_id'];?>" class="btn-danger">
				Remove</a>
		 </td>
               		<?php  echo '<input type="hidden" name="payment_date" value='.date('d/m/Y').'>
				 <input type="hidden" name="stock_quantity" value='.$mul.'>
				 <input type="hidden" name="stock_status" value="1">
				  <input type="hidden" name="user_id" class="form-control" value='.$user_id.'>
		 <input type="hidden" name="user_name" class="form-control" value='. $user_name.''; ?>
		 
				  </tr>
           <script>
		$(function(){
      $defaultValue=$('#total').val();
		$("input[type=checkbox]").click(function(event) {
		var total = 0;
		$("input:checked").each(function() {
			total += parseInt($(this).parent().find('#ch2').val());  //alert(total);
		});

		if (total == 0) {
			$('#total').val($defaultValue);
		}
		else {
			$('#total').val(total);
		}
		});

		})			
	  </script>
 
				  <?php }  }   }  }	?>
				  <script>
						$(document).ready(function(){
							$('#payment_mode').on('change',function(){
								var countryID = $(this).val();//alert(countryID);
								if(countryID=='Card')
								{
									$('#demo').show();
								}	
							   if(countryID=='Cash on delivery')
								{
									$('#demo').hide();
								}			
						});
						});

				  </script>
                    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Payment section</h4>
        </div>
        <div class="modal-body">
         <div class="row">
         <div class="form-group">
		  <div class="col-sm-4">
		 <input type="text" name="order_id" class="form-control" value="<?php echo 'U'; echo $order_id; ?>">
		 </div>
		 <div class="col-sm-4">
		 <input type="text" name="total_price" id="total" class="form-control" value="<?php echo $add; ?>">
		 </div>
		<div class="col-sm-4">						      
		<select class="form-control" name="payment_mode" id="payment_mode" required>
		<option value="">Select mode</option>
		<option value="Card">Card</option>
		<option value="Cash on delivery">Cash on delivery</option>
		</select>
		</div>
		 </div>
		 </div><br>
		 <div id="demo" style="display:none">
		 <div class="row">
		 <div class="form-group">
		  <div class="col-sm-4">
		 <input type="text" name="card_no" class="form-control" placeholder="Enter card number">		
		 </div>
		 <div class="col-sm-4">
		 <select name="bank_name" class="form-control">
		 <option value="">Select bank</option>
		 <option value="CUB">CUB</option>
		 <option value="SBI">SBI</option>
		 <option value="IOB">IOB</option>
		 <option value="KVB">KVB</option>
		 </select>
		 </div>	
		  <div class="col-sm-4">
		 <input type="text" name="cvv_no" class="form-control" placeholder="Enter cvv number">
		 </div>
		 </div>
		 </div><br>
		 <div class="row">
		 <div class="form-group">
		 <div class="col-sm-4">
		 <input type="text" name="card_holder_name" class="form-control" placeholder="card Holder name" >
		 </div>
		 </div>
		 </div>
		 </div><br>
		 <div class="row">
		 <div class="form-group">
		  <div class="col-sm-4">
		 <input type="submit" name="payment" class="btn btn-info" value="PAY">
		 </div>
		 </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div></div>
				</table>
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Make payment</button> </center>             
                 
    	
				<!-- Modal -->	
				</form>	
                    					
                      </div>
 