<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$mamon = $_GET['a'];
	$tenmon= $_POST['tenmon'];
	
	$sql = "UPDATE monan SET TENMON='$tenmon' WHERE MAMON = '$mamon'";
	if ( !mysql_query($sql, $con) )
	die("khong sua duoc");	
	echo "<script>alert(\"Sửa thành công !\"); location.href = \"capnhatmonan_canbo.php\";</script>";
?>