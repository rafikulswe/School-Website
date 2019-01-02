<?php session_start();
require_once('function/function.php');
needLogged();
    get_part('header.php');
    get_part('sidebar.php');
    get_part('bread.php');
    if (!empty($_POST)) {
        $title = $_POST['title'];
        $details = $_POST['details'];
        $btext = $_POST['btext'];
        $burl = $_POST['burl'];
        $pcate = $_POST['category'];
        $image = $_FILES['gallary_pic'];
        $ImageName = 'Photo-' . time() . '-' . rand(10000, 100000) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
        if (!empty($title)) {
            if (!empty($image)) {
                $insert = "INSERT INTO s_photos(photo_title,photo_details,photo_btn,photo_url,pcate_id,photo_image)"
                        . "VALUES('$title','$details','$btext','$burl','$pcate','$ImageName')";
                if (mysqli_query($con, $insert)) {
                    move_uploaded_file($image['tmp_name'], 'uploads/' . $ImageName);
                    header ('location: all-photos.php');
                } else {
                    echo "Upload Failed!";
                }
            } else {
                echo "Please enter banner image!";
            }
        } else {
            echo "Please enter banner title!";
        }
    }
    ?>
    <div class="col-md-12">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="col-md-9 heading_title">
                        Add Photos
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="all-photos.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All photos</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Button Text</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="btext">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Button Url</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="burl">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Details</label>
                        <div class="col-sm-8">
                            <textarea name="details" class="form-control" id=""  rows="5" placeholder="Details"></textarea>
                        </div>
                    </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Page-Category</label>
                <div class="col-sm-5">
                      <select name="category" class="form-control">
                       <?php  
				$sel="SELECT * FROM s_photos_pagecategory";
				$qry=mysqli_query($con,$sel);
				while($per=mysqli_fetch_array($qry)){
			?>
                        	<option value="<?= $per['pcate_id'];?>"><?= $per['pcate_name'];?></option>
                        <?php }?>
                      </select>
                </div>
              </div>                    
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Banner</label>
                        <div class="col-sm-8">
                            <input type="file" name="gallary_pic">
                        </div>
                    </div>
                </div>
              <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-8">
                    <input type="submit" class="btn btn-sm btn-primary" name="send" value="UPLOAD">
                </div>
              </div>
               <!-- <div class="panel-footer text-center">
                    <button class="btn btn-sm btn-primary">UPLOAD</button>
                </div>-->
            </div>
        </form>
    </div><!--col-md-12 end-->
    <?php
     get_part('footer.php');
?>