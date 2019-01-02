<?php session_start();
	require_once('function/function.php');
	needLogged();
        //[created_art]=Sun mar 23 06:40:16 +0000 2017;
	//$raw="sun mar 23 06:40:16 +0000 2017";
        //$xplod=explode(' ', $raw);
        //print_r($xplod);
        //$string="$xplod[5]-$xplod[1]-$xplod[2] $xplod[3]";
        //echo "<br/>$string";
        //$date=  date("Y-m-d H:i:s",  strtotime($string));
        //echo "<br/>$date";
        date_default_timezone_set('Asia/Dhaka');
        //echo date('Y-m-d H:i:s');

	get_part('header.php');
	get_part('sidebar.php');
	get_part('bread.php');
	
	if(isset($_POST['send'])){
		$details=$_POST['details'];
		$news_category=$_POST['category'];		
                $date = date('Y-m-d H:i:s');
                $image = $_FILES['image'];
                $ImageName = 'Photo-' . time() . '-' . rand(10000, 100000) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);		
		if(empty($details)||(empty($news_category))){
			echo"<script>window.alert('please fill up the required fields!!')</script>";
 			exit();
			}
		else{	
		$insert="INSERT INTO s_noticeboard(notice_details,ncate_id,notice_image,notice_time)VALUES('$details','$news_category','$ImageName','$date')";
		$qry=mysqli_query($con,$insert);
		if($qry){
                    move_uploaded_file($image['tmp_name'], 'uploads/' . $ImageName);
                    header('Location: all-news.php');
			}
			else{
				 echo"window.alert('Insertion Failed!!')";
                            }
                    }
	}
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>News Update</strong>
            </div>
            <div class="col-sm-3">
                <a href="all-news.php" class="amar_btn"> <i class="fa fa-plus-square"></i> All News</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Details</label>
                <div class="col-sm-8">
                    <textarea name="details" class="form-control" id=""  rows="5" placeholder="Details"></textarea>
                </div>
            </div>                
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">NewS-Category</label>
                <div class="col-sm-5">
                  <select name="category" class="form-control">
                  <option value="">Select News Category</option>
                   <?php
                                        $select="select * from s_noticeboard_category";
                                        $query=mysqli_query($con,$select);
                                        while($data=mysqli_fetch_array($query)){
                                  ?>
                  <option value="<?=$data['ncate_id'];?>"><?=$data['ncate_name'];?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-8">
                            <input type="file" name="image">
                        </div>
                    </div>                
              <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-8">
                    <input type="submit" class="btn btn-default" name="send" value="Publish">
                </div>
              </div>
            </form>
          </div>
          <div class="panel-footer">
            .
          </div>
        </div>
    </div>
</div>
<?php
	get_part('footer.php');
	
?>