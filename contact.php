
<div class="container">

<?php 
             include('front_top.php'); 
			 include('admin/db.php');
			 //include('sale_session.php');
?>
         <div class="row">
  <div class="col-sm-6">
  <h3>Contact us</h3>
  <form class="form-horizontal" method="post">
				 	<div class="form-group">
					  <label class="control-label col-sm-2" for="Name">Name</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" name="Name" id="Name" placeholder="Enter Name" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="Mobile">Mobile</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" name="Mobile" id="Mobile" placeholder="Enter Mobile" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="Address">Address</label>
					  <div class="col-sm-6">
						<textarea type="text" class="form-control" name="Address" id="Address" placeholder="Enter Address" >
					  </textarea>
					  </div>
					</div>
					<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="submit" class="btn btn-warning">Submit</button>
					  </div>
					</div>
				  </form>
              </div>
 <div class="col-sm-6">
 <h3>Contact address</h3>
  <p> xxxx xxxx </p>
  <p> xxxx xxxx </p>
  <p> xxxx xxxx </p>
  <p> xxxx xxxx </p>
              </div> 			  
              </div>  
       <div class="row">
       <div class="col-sm-12">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30683992.893261995!2d64.48051417608622!3d20.150536871844487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1486532438614" width="100%" height="450" frameborder="0" style="border:0" ></iframe>	  
      
                 </div>
            </div>
			
            </div>
		<?php //include('footer.php');?>
</div>
