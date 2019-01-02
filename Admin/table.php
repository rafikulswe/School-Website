<?php session_start();
	require_once('function/function.php');
	needLogged();
	get_part('header.php');
	get_part('sidebar.php');
	get_part('bread.php');
	get_part('table_page.php');
	get_part('footer.php');
?>