<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$mahs= $_POST['mahs'];
	$ngay= $_POST['ngay'];
	
	$sql = "INSERT INTO dangkyan (MAHS,NGAY)
				VALUES('$mahs','$ngay')";

		if ( !mysql_query($sql, $con) )
		die("khong chen duoc");
		else echo "thanhcong";		
		mysql_close($con);
		echo "<script>alert(\"Cập nhật thành công !\"); location.href = \"capnhatdkkhongan_canbo.php\";</script>";
		
?>