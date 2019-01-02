<?php session_start();
	require_once('function/function.php');
	needLogged();
	get_part('header.php');
	get_part('sidebar.php');
	get_part('bread.php');
	$id=$_GET['v'];
	$sel="select * from r_user natural join user_role where id='$id'";
	$qry=mysqli_query($con,$sel);
	$data=mysqli_fetch_array($qry);
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>User Information</strong>
            </div>
            <div class="col-sm-3">
                <a href="all-user.php" class="amar_btn"> <i class="fa fa-plus-square"></i> All User</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-body">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table class="table table-striped table-responsive table-hover amar_table">
           				<tr>
                        <td>Profile Picture</td>
                        <td>:</td>
                        <td align="center"><img src="uploads/<?= $data['photo'];?>" height="50" width="50"/></td>
                   		</tr>
               			<tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><?=$data['name'];?></td>
                        </tr>
                        <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?=$data['email'];?></td>
                   		</tr>
                        <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td><?=$data['phone'];?></td>
                   		</tr>
                        <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?=$data['username'];?></td>
                   		</tr>
                        <tr>
                        <td>User Role</td>
                        <td>:</td>
                        <td><?=$data['role_name'];?></td>
                   		</tr>
                        
            </table>
            </div>
            <div class="col-md-2"></div>
            <div class="clr"></div>
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