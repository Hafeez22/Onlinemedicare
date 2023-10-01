<?php 
include ('top_menu.php');
include ('db.php');
if(isset($_POST['submit']))
{
$leagues=$_POST['leagues'];	
$team_name1=$_POST['team_name1'];	
$goals1=$_POST['goals1'];	
$team_name2=$_POST['team_name2'];	
$goals2=$_POST['goals2'];	
$won_team=$_POST['won_team'];	
$won_goals=$_POST['won_goals'];	
$match_date=$_POST['match_date'];	
$result=$_POST['result'];	
$ground=$_POST['ground'];
$query1=mysqli_query($con,"insert into fball_match_results values('','$leagues','$team_name1','$goals1','$team_name2','$goals2','$won_team','$won_goals',
'$match_date','$ground','$result')");
if($r = $query1)
{
echo "<script>alert('Added Succesfully'); window.location = './add_results.php';</script>";
}
else
{
	echo '<font color="red">Some error found</font>';
}
}
 ?>
<div class="container">
  <h2>Results</h2>
  <form class="form-horizontal" method="post">
  <div class="form-group">
      <label class="control-label col-sm-2" for="leagues">Leagues</label>
      <div class="col-sm-4">
        <select name="leagues" class="form-control">
		 <?php	$selectss =mysqli_query($con,"SELECT * FROM fball_leagues");
					while ($rowss=mysqli_fetch_array($selectss)) 		{	 ?>
		<option value="<?php echo $rowss['league_id']; ?>"><?php echo $rowss['leagues']; ?></option>
		<?php } ?>
		</select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="team_name1">Team name 1</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="team_name1" id="team_name1" placeholder="Enter team name 1" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="goals1">Goals</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="goals1" id="goals1" placeholder="Enter goals" required>
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-2" for="team_name2">Team name 2</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="team_name2" id="team_name2" placeholder="Enter team name 2" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="goals2">Goals</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="goals2" id="goals2" placeholder="Enter goals" required>
      </div>
    </div>
	 <div class="form-group">
      <label class="control-label col-sm-2" for="won_team">Won team</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="won_team" id="won_team" placeholder="Enter won team" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="won_goals">Won team goals</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="won_goals" id="won_goals" placeholder="Enter won team goals" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="match_date">Date</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="match_date" id="birthday" placeholder="Enter date" required>
      </div>
    </div>	  
	<div class="form-group">
      <label class="control-label col-sm-2" for="ground">Ground</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="ground" id="ground" placeholder="Enter ground" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="result">Result</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="result" id="result" placeholder="Enter result" required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" class="btn btn-warning">Submit</button>
      </div>
    </div>
  </form>
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
           $('#birthday').datepicker();
       })
    }
 </script>