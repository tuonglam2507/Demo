<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );

	$ngay= $_POST['ngay'];

	$thang= $_POST['thang'];

	$nam= $_POST['nam'];

	$ngay=$nam."/".$thang."/".$ngay;

	$mamon = $_POST['mamon'];

	$sql = "INSERT INTO ngay (NGAY,MAMON)
				VALUES('$ngay','$mamon')";


		if ( !mysql_query($sql, $con) )
		die("khong chen duoc");
		else echo "thanhcong";		
		mysql_close($con);
		echo "<script>alert(\"Cập nhật thành công !\"); location.href = \"capnhatngay_canbo.php\";</script>";
?>