<?php session_start();
	require_once('function/function.php');
	needLogged();
	get_part('header.php');
	get_part('sidebar.php');
	get_part('bread.php');
	$id=$_GET['v'];
	$sel="select * from s_contact_us where conus_id='$id'";
	$qry=mysqli_query($con,$sel);
	$data=mysqli_fetch_array($qry);
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="col-sm-9">
                <strong>User Message Details</strong>
            </div>
            <div class="col-sm-3">
                <a href="all-mess.php" class="amar_btn"> <i class="fa fa-plus-square"></i> All Message</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-body">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table class="table table-striped table-responsive table-hover amar_table">
               			<tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><?=$data['conus_name'];?></td>
                        </tr>
                        <tr>
                        <td>Subject</td>
                        <td>:</td>
                        <td><?=$data['conus_sub'];?></td>
                   	</tr>
                        <tr>
                        <td>Message</td>
                        <td>:</td>
                        <td><?=$data['conus_mess'];?></td>
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