<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	$malop = $_GET['a'];

	$malop1 = $_POST['malop'];

	if($malop == $malop1){
		$sql = "UPDATE lop SET MALOP='$malop1' WHERE MALOP = '$malop'";

		if ( !mysql_query($sql, $con) )
		die("khong sua duoc");
	}else{
	$sql = "SELECT * FROM lop WHERE MALOP = '$malop1'";
	$result = mysql_query($sql, $con);
	if(!$row = mysql_fetch_array( $result )){
					$sql = "UPDATE lop SET MALOP='$malop1' WHERE MALOP = '$malop'";
					echo $sql;
					if ( !mysql_query($sql, $con) )
					{
						echo "<script>alert(\"Lớp đang được sử dụng! Không xóa được!\"); location.href = \"capnhatdslop_canbo.php\";</script>";
					}
	}else{
		echo "<script>alert(\"Mã lớp đã tồn tại !\"); location.href = \"capnhatdslop_canbo.php\";</script>";
	}
	}
		
		echo "<script>alert(\"Sửa thành công !\"); location.href = \"capnhatdslop_canbo.php\";</script>"
?>