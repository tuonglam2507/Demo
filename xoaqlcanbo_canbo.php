<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$macb= $_GET['a'];
	$malop= $_GET['malop'];
	echo $malop;
	$hocki= $_GET['hocki'];
	$namhoc= $_GET['namhoc'];
	$sql = "SELECT * FROM canbo WHERE MACB = '$macb'";
	$result1 = mysql_query($sql, $con);
	$row1 = mysql_fetch_array( $result1 );
	if ($row1['CHUCVU']	== "Bảo mẫu")
		{
			
				$sql = "DELETE FROM baomau WHERE MACB= '$macb' AND MALOP ='$malop' AND HOCKI= '$hocki' AND NAMHOC ='$namhoc'";	
				if ( !mysql_query($sql, $con) )
				die("khong sua duoc");	
				
		}
	else 
		{
			$sql = "DELETE FROM chunhiem WHERE MACB= '$macb' AND MALOP ='$malop' AND HOCKI= '$hocki' AND NAMHOC ='$namhoc'";	
				echo $sql;
				if ( !mysql_query($sql, $con) )
				die("khong sua duoc");	
				
		}
		
			
		mysql_close($con);
		echo "<script>alert(\"xóa thành công !\"); location.href = \"capnhatqlcanbo_canbo.php\";</script>";
?>