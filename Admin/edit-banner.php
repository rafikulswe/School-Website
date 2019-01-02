<?php session_start();
	require_once('function/function.php');
	needLogged();
	get_part('header.php');
	get_part('sidebar.php');
	get_part('bread.php');
	//Update User
	$id=$_GET['e'];
	$sele="SELECT * FROM s_banner WHERE ban_id='$id'";
	$qry=mysqli_query($con,$sele);
	$data=mysqli_fetch_array($qry);
	
	if(isset($_POST['send'])){
		$title=$_POST['title'];
		$subtitle=$_POST['subtitle'];
		$url=$_POST['url'];
		$button=$_POST['button'];
                $details=$_POST['details'];
                $image = $_FILES['banner_pic'];
                $ImageName = 'Banner-' . time() . '-' . rand(10000, 100000) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
		
                if (!empty($image)){
		$edit= "UPDATE s_banner SET ban_title='$title', ban_subtitle='$subtitle', ban_url='$url', ban_text='$button', ban_details='$details', ban_image='$ImageName' WHERE ban_id='$id'";
                if(mysqli_query($con,$edit)){
                        move_uploaded_file($image['tmp_name'], 'uploads/' . $ImageName);
			header('Location: all-banner.php');
		}else{
			echo "Banner update failed!!!";
                }
                
                }else {
                         echo "Please Enter banner Image!!!";
                }
		
	}

?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>Update Banner Information</strong>
            </div>
            <div class="col-sm-3">
                <a href="all-banner.php" class="amar_btn"> <i class="fa fa-plus-square"></i> All Banner</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-sm-3 control-label">Banner Title<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="title" value="<?= $data['ban_title'];?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Banner Subtitle<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="subtitle" value="<?= $data['ban_subtitle'];?>">
                </div>
              </div>
              <div class="form-group">
                <label  class="col-sm-3 control-label">URL</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="url" value="<?= $data['ban_url'];?>">
                </div>
              </div>
              <div class="form-group">
                <label  class="col-sm-3 control-label">Banner Text<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="button" value="<?= $data['ban_text'];?>">
                </div>
              </div>
              <div class="form-group">
                <label  class="col-sm-3 control-label">Banner Details<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="details" value="<?= $data['ban_details'];?>">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Photo</label>
                <div class="col-sm-8">
                    <img height="50" src="uploads/<?= $data['ban_image']; ?>" alt="banner" />
                    <input type="file" class="" id="" name="banner_pic">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-8">
                    <input type="submit" class="btn btn-default" name="send" value="UPDATE">
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
