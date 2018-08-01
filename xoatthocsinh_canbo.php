<?php
session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$mahs = $_GET['a'];
	$malop = $_GET['malop'];
	$hocki = $_GET['hocki'];
	$namhoc = $_GET['namhoc'];
	
	$sql = "DELETE FROM hoc WHERE MAHS= '$mahs'";

	if ( !mysql_query($sql, $con) )
	{
    die("khong xoa duoc");
	}
	else
	{
		$sql = "DELETE FROM hocsinh WHERE MAHS= '$mahs'";
		
		if ( !mysql_query($sql, $con) )
		{
			$sql =  "INSERT INTO hoc (MAHS,MALOP,HOCKI,NAMHOC)
						VALUES ('$mahs','$malop','$hocki','$namhoc')";
						
			if ( !mysql_query($sql, $con) )
			die("khong chen duoc");

			echo "<script>alert(\"Mã học sinh đang được sử dụng !\"); location.href = \"capnhattthocsinh_canbo.php\";</script>";
		}
	}
	mysql_close($con);
	echo "<script>alert(\"Xóa thành công !\"); location.href = \"capnhattthocsinh_canbo.php\";</script>";
?>