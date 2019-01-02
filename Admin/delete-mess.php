<?php session_start();
	require_once('function/function.php');
	needLogged();
	get_part('header.php');
	get_part('sidebar.php');
	get_part('bread.php');
	$id=$_GET['d'];
	$delete="delete from s_contact_us where conus_id='$id'";
	$qry=mysqli_query($con,$delete);
	if($qry){
		header('Location: all-mess.php');
		}
	else{
		echo"User delete failed!!!";
		}
	get_part('footer.php');
?>