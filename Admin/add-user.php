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
  if($_SESSION['role']<=1){
	get_part('header.php');
	get_part('sidebar.php');
	get_part('bread.php');
	
	if(isset($_POST['send'])){
		$name=htmlentities($_POST['name'],ENT_QUOTES);
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$username=$_POST['username'];
		$password=md5($_POST['pass']);
		$user_role=$_POST['role'];
		$photo=$_FILES['photo'];
		$ImageName='user-'.time().'-'.md5(rand(10000,100000)).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);
		
		if(empty($username)||(empty($password))){
			echo"<script>window.alert('please fill up the required fields!!')</script>";
 			exit();
			}
		else{	
		$insert="INSERT INTO r_user(name,email,phone,username,password,role_id,photo)VALUES('$name','$email','$phone','$username','$password','$user_role','$ImageName')";
		$qry=mysqli_query($con,$insert);
		if($qry){
			if($ImageName!=''){
            move_uploaded_file($photo['tmp_name'], 'uploads/'.$ImageName);
			 header('Location: all-user.php');
			}}
			else{
				 echo"window.alert('Product insert Failed!!')";
				}
		}
	}
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>User Registration</strong>
            </div>
            <div class="col-sm-3">
                <a href="all-user.php" class="amar_btn"> <i class="fa fa-plus-square"></i> All User</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Name<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Email<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="">
                </div>
              </div>
               <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
                <div class="col-sm-8">
                  <input type="text" name="phone" class="form-control" id="inputEmail3" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Username<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Password<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="password" name="pass" class="form-control" id="inputEmail3" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Re-Password<span class="req_span">*</span></label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputEmail3" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">User-Role</label>
                <div class="col-sm-5">
                  <select name="role" class="form-control">
                  <option value="">Select User Role</option>
                   <?php
				  	$select="select * from user_role";
					$query=mysqli_query($con,$select);
					while($data=mysqli_fetch_array($query)){
				  ?>
                  <option value="<?=$data['role_id'];?>"><?=$data['role_name'];?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Photo</label>
                <div class="col-sm-8">
                    <input type="file" name="photo" class="" id="" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-8">
                    <input type="submit" class="btn btn-default" name="send" value="REGISTRATION">
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
	}else{
		echo "Access Denied!!!";
		}
?>