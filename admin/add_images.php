<?php 
include ('top_menu.php');
include ('db.php');
?>
<div class="container">
<?php
$path=$_SERVER['DOCUMENT_ROOT'].'football_info/uploads';
if(isset($_POST['submit']))
{
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else
{
if (file_exists("".$path."/" . $_FILES["file"]["name"]))
{
echo $_FILES["file"]["name"] . " already exists. ";
}
else
{ 
if(move_uploaded_file($_FILES["file"]["tmp_name"],"".$path."/" . $_FILES["file"]["name"]))
{
$project_file=$_FILES['file']['name'];
$fball_img_title=$_POST['fball_img_title'];
$post_by=$_POST['post_by'];
$query_image = "insert into fball_recent_images (fball_img_title,file,post_by)
 values ('$fball_img_title','$project_file','$post_by')";
if(mysqli_query($con,$query_image))
{
//echo "Stored in: " . "images/" . $_FILES["file"]["name"];
echo "<script>alert('image uploaded Successfully'); window.location = './add_images.php';</script>";
}
else
{
echo 'File name not stored in database';
}
}
}


}
}
?>
<div class="container">
  <h4>Upload images</h4>
 
  <form class="form-horizontal" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" for="fball_img_title">Title</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="fball_img_title" id="fball_img_title" placeholder="Enter title" required>
      </div>
    </div> 
	<div class="form-group">
      <label class="control-label col-sm-2" for="file">Image file</label>
      <div class="col-sm-4">
        <input type="file" class="form-control" name="file" id="file" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="post_by">Post by</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="post_by" id="post_by" required>
      </div>
    </div>
	 <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" class="btn btn-warning">Upload</button>
      </div>
    </div>

  </form>
</div>

</body>
</html>