<?php session_start();
	require_once('function/function.php');
	needLogged();
	get_part('header.php');
	get_part('sidebar.php');
	get_part('bread.php');
	//Update User
	$id=$_GET['e'];
	$sele="SELECT * FROM r_user NATURAL JOIN user_role WHERE id='$id'";
	$qry=mysqli_query($con,$sele);
	$data=mysqli_fetch_array($qry);
	
	if(isset($_POST['send'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$role=$_POST['role'];
                $photo=$_FILES['photo'];
		$ImageName='user-'.time().'-'.md5(rand(10000,100000)).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);

		$edit= "UPDATE r_user SET name='$name', email='$email', phone='$phone', role_id='$role', photo='$ImageName' WHERE id='$id'";
                if(mysqli_query($con,$edit)){
                        if($ImageName!=''){
                        move_uploaded_file($photo['tmp_name'], 'uploads/'.$ImageName);
			header('Location: all-user.php');
                     }
                    
	}else{
            echo "User update failed!!!";
            }
        }
        
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>Update <?=$data['username'];?>'s Information</strong>
            </div>
            <div class="col-sm-3">
                <a href="all-user.php" class="amar_btn"> <i class="fa fa-plus-square"></i> All User</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-sm-3 control-label">Name<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="name" value="<?= $data['name'];?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Email<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" name="email" value="<?= $data['email'];?>">
                </div>
              </div>
              <div class="form-group">
                <label  class="col-sm-3 control-label">Phone</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="phone" value="<?= $data['phone'];?>">
                </div>
              </div>
              <div class="form-group">
                <label  class="col-sm-3 control-label">Username<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="user" value="<?= $data['username'];?>" disabled="disabled">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">User-Role</label>
                <div class="col-sm-5">
                      <select name="role" class="form-control">
                        <?php 
							$sel="SELECT * FROM user_role";
							$qry=mysqli_query($con,$sel);
							while($per=mysqli_fetch_array($qry)){
						?>
               			 <option value="<?= $per['role_id'];?>" <?php if($data['role_id']===$per['role_id']) echo'selected="selected"';?>><?= $per['role_name'];?></option>
                        <?php }?>
                      </select>
                </div>
              </div>
              <div class="form-group">
                    
               
                <label for="" class="col-sm-3 control-label">Photo</label>
                <div class="col-sm-8">
                    <img src="uploads/<?= $data['photo'];?>" height="50" width="50"/>
                    <input type="file" class="" id="" name="photo">
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
