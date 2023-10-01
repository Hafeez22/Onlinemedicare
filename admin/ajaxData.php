<?php
//Include database configuration file
include('db.php');

if(isset($_POST["pharmacy_brand_id"]) && !empty($_POST["pharmacy_brand_id"])){
    //Get all state data
    $query = mysqli_query($con,"SELECT * FROM pharmacy_category WHERE pharmacy_brand = ".$_POST['pharmacy_brand_id']." ORDER BY pharmacy_category ASC");
   
   $rowCount = mysqli_num_rows($query);
    
    if ($rowCount >  0) { 
        echo '<option value="">Select category</option>';
        while($row =  mysqli_fetch_assoc($query)){ 
            echo '<option value="'.$row['pharmacy_category_id'].'">'.$row['pharmacy_category'].'</option>';
        }
	}
	else {
		echo '<option value="">Pharmacy not available</option>';
		}
}
?>