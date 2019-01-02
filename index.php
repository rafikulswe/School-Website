<?php
    require_once('functions/function.php');
    get_part('header.php');
?>
<section class="slider-main">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php
                $sel = 'SELECT * FROM s_banner ORDER BY ban_id DESC LIMIT 0,3';
                $qry = mysqli_query($con, $sel);
                while ($data = mysqli_fetch_array($qry)) {
            ?>
            <div class="item <?php if($data['ban_active']==1){echo 'active';} ?>">
                <img data-animation="animated pulse" src="admin/uploads/<?= $data['ban_image']; ?>" alt="...">
                <div class="carousel-caption text-center">
                    <h3 data-animation="animated bounceInLeft"><?= $data['ban_title']; ?></h3>
                    <p data-animation="animated bounceInRight"><?= $data['ban_subtitle']; ?></p>
                    <a data-animation="animated flipInX" href="<?= $data['ban_url']; ?>"><?= $data['ban_text']; ?></a>
                </div>
            </div>
                <?php } ?>
        </div>

        <!-- Controls -->
        <a class="left left-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <img src="img/left-slider.png" class="img-responsive" alt="">
        </a>
        <a class="right right-control" href="#carousel-example-generic" role="button" data-slide="next">
            <img src="img/right-slider.png" class="img-responsive" alt="">
        </a>
    </div>
</section>



<!--homepage start-->
<section class="welcome">
    <div class="container">
        <div class="col-sm-12 text-center">
             <div class="welcome-item">
            <?php
                $sel = 'SELECT * FROM cit_news NATURAL JOIN cit_news_category WHERE ncate_id="1"';
                $qry = mysqli_query($con, $sel);
                $data = mysqli_fetch_array($qry);
            ?>                 
                 <h5><?= $data['news_title'];?></h5>
                 <h4 class="title-school"><?=$data['news_subtitle'];?></h4><hr>
                 <p> <?=$data['news_details'];?></p>
                 <a class="btn-create" href="#">read more</a>
             </div>
        </div>
    </div>
</section>                              
             
        
        
 <section>
            <div class="container">
               <div class="col-sm-12 text-center">
                      <div class="controler">
                       <div class="img-responsive pre"><img src="img/arrow-right.png" alt=""></div>
                       <div class="title-school"> latest news </div>
                       <div class="img-responsive next"> <img src="img/arrow-left.png" alt=""></div>
                       <div class="clearfix"></div>
                      </div>
               </div>
                <div class="clearfix"></div> 
               
                       
           <div class="succes-slider">
            <?php
                $sel = 'SELECT * FROM s_photos NATURAL JOIN s_photos_pagecategory WHERE pcate_id="1" ORDER BY photo_id DESC LIMIT 0,6';
                $qry = mysqli_query($con, $sel);
                while ($data = mysqli_fetch_array($qry)) {
            ?>                
               <div class="col-sm-4">
                <div class="success-item">
                	<div class="image-box">
                    	<img class="img-responsive" src="admin/uploads/<?= $data['photo_image']; ?>" alt="Image-1">
                    	<h2><?= $data['photo_title']; ?></h2>
                        </div>
                    <div class="text-desc">
                    	<h3><?= $data['photo_title']; ?></h3>
                        <p><?= $data['photo_details']; ?></p>
                    	<a href="<?= $data['photo_url']; ?>" class="btn"><?= $data['photo_btn']; ?></a>
                    </div>
                </div>
               </div><!--col-sm-4-main end-->
            <?php };?>
           </div><!--succes-slider-->
           
     </div> <!--container end-->
 </section>
       
  
       
            
<section class="section-default">
        <div class="container">
            <div class="col-sm-6">
                 <div class="news-event">
                     <h2>Announcements 2015-2016</h2>   
                     <div class="news-slick">
        <?php
            $sel = 'SELECT * FROM s_noticeboard NATURAL JOIN s_noticeboard_category WHERE ncate_id="1" ORDER BY notice_id DESC LIMIT 0,4';
            $qry = mysqli_query($con, $sel);
            while ($data = mysqli_fetch_array($qry)) {
        ?>                         
                        <div class="news-item">                           
                         <a href="#">
                           <div class="news-clock">
                               <h4><?= substr($data['notice_time'],5,2);?></h4>
                               <h3><?= substr($data['notice_time'],8,3);?></h3>
                           </div>
                           <div class="news-details">
                               <p><?= $data['notice_details'];?></p>
                           </div>
                           <div class="clearfix"></div>
                         </a>                           
                       </div><!--news-item end-->
            <?php };?>
                     </div>                      
                      <a href="#" class="news-info"><span>read more</span><i class="fa fa-angle-right"></i></a>
                 </div> <!--news-event end-->
                 
                 
            </div><!--col-sm-6 end-->
            
            
            
            
            <div class="col-sm-6">
                 <div class="news-event">
                     <h2>Upcoming Events</h2> 
                      <div class="news-right">
        <?php
            $sel = 'SELECT * FROM s_noticeboard NATURAL JOIN s_noticeboard_category WHERE ncate_id="2" ORDER BY notice_id DESC LIMIT 0,4';
            $qry = mysqli_query($con, $sel);
            while ($data = mysqli_fetch_array($qry)) {
        ?>                           
                          <div class="right-item">
                           <a href="#">
                              <div class="news-clock">
                              <img class="img-responsive" src="admin/uploads/<?= $data['notice_image']; ?>" alt="">
                               </div>
                               <div class="news-details">
                               <h5><?= $data['notice_time'];?></h5>
                               <p><?= $data['notice_details'];?></p>
                              </div>
                           <div class="clearfix"></div>
                         </a>
                       </div><!--news-item end-->
            <?php };?>                
                    </div><!--news-right end-->
                    
                     <a href="#" class="news-info"><span>read more</span><i class="fa fa-angle-right"></i></a>
                 </div> <!--news-event end-->
                 
                 
            </div><!--col-sm-6 end-->
            
        </div>
</section>        
<!--homepage end-->        
 

<?php
    get_part('photo.php');
    get_part('footer.php');
?>