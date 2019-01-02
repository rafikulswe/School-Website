<?php session_start();
	require_once('function/function.php');
	needLogged();
	get_part('header.php');
	get_part('sidebar.php');
	get_part('bread.php');
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>Table Information</strong>
            </div>
            <div class="col-sm-3">
                <a href="all-user.php" class="amar_btn"> <i class="fa fa-plus-square"></i> All User</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-responsive table-hover amar_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>User Role</th>
                        <th>Status</th>
                        <th>Photo</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                <?php
					$search=$_GET['search'];
                	$sel="select * from r_user natural join user_role where name like '%$search%'";
					$qry=mysqli_query($con,$sel);
					while($data=mysqli_fetch_array($qry)){
				?>
                    <tr>
                        <td><?=html_entity_decode($data['name']);?></td>
                        <td><?=$data['email'];?></td>
                        <td><?=$data['username'];?></td>
                        <td><?=$data['role_name'];?></td>
                        <td><a class="btn btn-sm btn-success" href="#">Active</a></td>
                        <td><img src="uploads/<?= $data['photo'];?>" height="50" width="50"/></td>
                        <td>
                            <a href="view-user.php?v=<?=$data['id'];?>" title="View"><i class="fa fa-plus-square"></i></a>
                            <a href="edit-user.php?e=<?=$data['id'];?>" title="Edit"><i class="fa fa-pencil-square"></i></a>
                            <a href="delete-user.php?d=<?=$data['id'];?>" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                  <?php
					}
				  ?>
                </tbody>
            </table>
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