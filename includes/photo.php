<?php
	$con=mysqli_connect("localhost","root","","adminpanel");
	if(!$con){
		echo "connection error";
		}
?>
<section>
       <div class="container">
               <div class="col-sm-12 text-center">
                        <div class="footer-control">
                       <div class="img-responsive pre"><img src="img/arrow-right.png" alt=""></div>
                       <div class="title-school"> photos </div>
                       <div class="img-responsive next"> <img src="img/arrow-left.png" alt=""></div>
                       <div class="clearfix"></div>
                      </div>
                 </div>
                 <div class="clearfix"></div>  
                 <div class="footer-slick">
            <?php
                $sel = 'SELECT * FROM s_photos NATURAL JOIN s_photos_pagecategory WHERE pcate_id="2" ORDER BY photo_id DESC LIMIT 0,6';
                $qry = mysqli_query($con, $sel);
                while ($data = mysqli_fetch_array($qry)) {
            ?>                     
                <div class="col-sm-4"><!--col-sm-4 start-->
               <div class="footer-item">
                   <div class="port-1 effect-2">
                	<div class="image-box">
                    	<img src="admin/uploads/<?= $data['photo_image']; ?>" alt="Image-2">
                    </div>
                    <div class="text-desc">
                    	<h3><?= $data['photo_title']; ?></h3>
                        <p><?= $data['photo_details']; ?></p>
                    	<a href="<?= $data['photo_url']; ?>" class="btn"><?= $data['photo_btn']; ?></a>
                    </div>
                </div>
               </div>
           </div><!--col-sm-4 end-->   
           <?php };?>
          
          </div><!--footer-slick-->
        </div>
</section>