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
  <title>MediCare</title>
  <meta charset="utf-8">
  <!--<meta http-equiv="refresh" content="10" />-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>


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
      <!--<a class="navbar-brand" href="index.php">Medical</a>-->
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="pharmacy_brand.php">Add pharmacy</a></li>        
        <li><a href="pharmacy_categories.php">Pharmacy categories</a></li>-->
       
        <li><a href="view_doctor.php">View Doctor</a></li>
        <li><a href="view_medical.php">View Medical</a></li>
        <li><a href="view_hospital.php">View Hospital</a></li>
        <li><a href="view_pres.php">View Prescribtion</a></li>
        <li><a href="view_medicine.php">View Medicine</a></li> 
		 <li><a href="index.php">Logout</a></li>
      </ul>
	   <center> <h1> ONLINE MEDICARE</h1></center>
    </div><!--/.nav-collapse -->
  </div>
</div>

<div class="container">
  
 
</div><!-- /.container -->