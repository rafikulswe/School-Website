<?php session_start();
	require_once('function/function.php');
	needLogged();
	get_part('header.php');
	get_part('sidebar.php');
	get_part('bread.php');
	//Update User
	$id=$_GET['e'];
	$sele="SELECT * FROM cit_news NATURAL JOIN cit_news_category WHERE news_id='$id'";
	$qry=mysqli_query($con,$sele);
	$data=mysqli_fetch_array($qry);
	
	if(isset($_POST['send'])){
                $title = $_POST['title'];
                $subtitle = $_POST['subtitle'];
                $ntext = $_POST['details'];
                $image = $_FILES['news_pic'];
                $ImageName = 'News-' . time() . '-' . rand(10000, 100000) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
		
                if (!empty($image)){
		$edit= "UPDATE cit_news SET news_title='$title', news_subtitle='$subtitle', news_details='$ntext', news_image='$ImageName' WHERE news_id='$id'";
                if(mysqli_query($con,$edit)){
                        move_uploaded_file($image['tmp_name'], 'uploads/' . $ImageName);
			header('Location: all-pages.php');
		}else{
			echo "Banner update failed!!!";
                }
                
                }else {
                         echo "Please Enter banner Image!!!";
                }
		
	}

?><div class="col-md-12">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="col-md-9 heading_title">

                        Edit Page Content
                               
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="all-pages.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Pages</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="title" value="<?= $data['news_title'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Subtitle</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="subtitle" value="<?= $data['news_subtitle'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Details </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="details" value="<?= $data['news_details'];?>">
                        </div>
                    </div>
                 <div class="form-group">
                <label for="" class="col-sm-3 control-label">Page-Category</label>
                <div class="col-sm-5">
                      <select name="category" class="form-control">
                        <?php  
				$sel="SELECT * FROM cit_news_category";
				$qry=mysqli_query($con,$sel);
				while($per=mysqli_fetch_array($qry)){
			?>
                        	<option value="<?= $per['ncate_id'];?>" <?php if($data['ncate_id']===$per['ncate_id']) echo'selected="selected"';?>><?= $per['ncate_name'];?></option>
                        <?php }?>
                      </select>
                </div>
              </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Page Image</label>
                        <div class="col-sm-8">
                            <img height="50" src="uploads/<?= $data['news_image']; ?>" alt="banner" />
                            <input type="file" name="news_pic">
                        </div>
                    </div>
                </div>
              <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-8">
                    <input type="submit" class="btn btn-default" name="send" value="UPDATE">
                </div>
              </div>
            </div>
        </form>
    </div><!--col-md-12 end-->
<?php
	get_part('footer.php');
?>
