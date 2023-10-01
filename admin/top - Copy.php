<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#timediv').load('refresh_scores.php').fadeIn("slow");
}, 10000); // refresh every 10000 milliseconds
</script>
  <title>Pharmacy</title>
  <meta charset="utf-8">
  <!--<meta http-equiv="refresh" content="10" />-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({  
                type:'POST',
                url:'ajaxData.php',
                data:'pharmacy_brand_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();//alert(stateID);
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>

  <style>
.navbar-custom {
	background-color:#229922;
    color:#ffffff;
  	border-radius:0;
}
  
.navbar-custom .navbar-nav > li > a {
  	color:#fff;
  	padding-left:20px;
  	padding-right:20px;
}
.navbar-custom .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus {
    color: #ffffff;
	background-color:transparent;
}
      
.navbar-custom .navbar-nav > li > a:hover, .nav > li > a:focus {
    text-decoration: none;
    background-color: #33aa33;
}
      
.navbar-custom .navbar-brand {
  	color:#eeeeee;
}
.navbar-custom .navbar-toggle {
  	background-color:#eeeeee;
}

  </style>
  </head>
<div class="navbar navbar-custom navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Medical</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="pharmacy_brand.php">Add pharmacy</a></li>        
        <li><a href="pharmacy_categories.php">Pharmacy categories</a></li>-->
        <li><a href="add_pharmacy_stock.php">Add Hospital</a></li>
        <li><a href="pharmacy_license.php">Pharmacy license</a></li>
		<li class="dropdown "><a href="#" id="drop1" data-toggle="dropdown" class="dropdown-toggle" role="button">Users <b class="caret"></b></a>
            <ul role="menu" class="dropdown-menu" aria-labelledby="drop1">
                <li role="presentation"><a href="users_report.php" role="menuitem">Users report</a></li>
                <li role="presentation"><a href="users_orders.php" role="menuitem">Users orders</a></li>
                </ul>
        </li>
		<li class="dropdown "><a href="#" id="drop1" data-toggle="dropdown" class="dropdown-toggle" role="button">Salesman <b class="caret"></b></a>
            <ul role="menu" class="dropdown-menu" aria-labelledby="drop1">
                <li role="presentation"><a href="add_salesman.php" role="menuitem">Add salesman</a></li>
                <li role="presentation"><a href="salesman_report.php" role="menuitem">salesman reports</a></li>
                </ul>
        </li>
		 <li><a href="index.php">Logout</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>

<div class="container">
  
 
</div><!-- /.container -->