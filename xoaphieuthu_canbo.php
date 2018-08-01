<?php
session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$mapt = $_GET['a'];
	$maphi = $_GET['maphi'];
	$sotien = $_GET['sotien'];
	
	$sql = "DELETE FROM thanhtien WHERE MAPT= '$mapt' AND MAPHI = '$maphi'";

	if ( !mysql_query($sql, $con) )
	{
    die("khong xoa duoc");
	}
	else
	{
		$sql = "DELETE FROM phieuthu WHERE MAPT= '$mapt'";

		if ( !mysql_query($sql, $con) )
		{
			$sql =  "INSERT INTO thanhtien (MAPT,MAPHI,SOTIEN)
						VALUES ('$mapt','$maphi','$sotien')";
				
			if ( !mysql_query($sql, $con) )
			die("khong chen duoc");
		}
	}
	mysql_close($con);
	echo "<script>alert(\"Xóa thành công !\"); location.href = \"capnhatphieuthu_canbo.php\";</script>";
?>