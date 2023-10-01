
<div class="container">

<?php 
             include('front_top.php'); 
			 include('admin/db.php');
?>
         <div class="row">
 
        <div class="col-sm-6">
                         <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Recent Images</h3>
                            </div>
                            <div class="panel-body">
                             <div id="slider">
							 <?php                        
							 $select_img =mysqli_query($con,"SELECT * FROM add_hospital");
					while ($row_img=mysqli_fetch_array($select_img)) 		
					{	 ?>
							<figure>
							<?php echo 
							'<img class="img-responsive" style="height:407px;" alt="not showing" src="uploads/'.$row_img["file"].'">';
							?>
							</figure>
							<?php } ?>
							</div>
                            </div>
                          </div>
            </div>
			<div class="col-sm-6">
                         <div class="panel panel-success">
                            <div class="panel-heading">
                              <h3 class="panel-title">History</h3>
                            </div>
                            <div class="panel-body">
                           <p>Home health care under Original Medicare is short-term skilled care at home for the treatment of an illness or injury, often following a hospitalization. This includes skilled nursing care, physical therapy, occupational therapy, speech-language pathology, medical social work, and care by home health aides. Home health services may also include medical social services, or durable medical equipment (like wheelchairs, hospital beds, oxygen, and walkers) and medical supplies for use at home. Medicare doesn’t pay for full-time personal care, homemaker services (shopping, cleaning, laundry), or home meal delivery.
						   Medicare home health care benefits are available to patients if they meet all of these conditions:
1. The patient must be under the care of a doctor, and must be getting services under a plan of care established and reviewed regularly by a doctor.
2. The patient must need, and a doctor must certify that the patient needs, one or more of these:
• Intermittent skilled nursing care.
• Physical therapy.
• Speech-language pathology services.
• Continued occupational therapy.
3. The home health agency caring for the patient must be approved by Medicare 
4. The patient must be homebound, and a doctor must certify that he or she is homebound. To be homebound means:
• Leaving home isn’t recommended because of the patient’s condition.
• The condition keeps the patient from leaving home without help
(like using a wheelchair or walker, needing special transportation, or getting help from another person).
• Leaving home takes a considerable and taxing effort.

						   </p></div>
              </div>
            </div>
            </div>
		<?php //include('footer.php');?>
</div>
