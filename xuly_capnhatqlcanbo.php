<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$macb= $_POST['canbo'];

	$namhoc= $_POST['nam'];

	$hocky= $_POST['hocky'];
	
	$malop = $_POST['lop'];

	$sql = "SELECT * FROM canbo WHERE MACB = '$macb'";
	$result1 = mysql_query($sql, $con);
	$row1 = mysql_fetch_array( $result1 );
	$chucvu=$row1['CHUCVU'];

	if ($row1['CHUCVU']	== "Bảo mẫu")
		{
			
			$sql = "SELECT * FROM baomau WHERE MACB = '$macb' AND HOCKI = '$hocky' AND NAMHOC = '$namhoc'";
			$result2 = mysql_query($sql, $con);
			if(!$row2 = mysql_fetch_array( $result2 )){
				$sql = "SELECT * FROM baomau WHERE  MALOP = '$malop' AND NAMHOC = '$namhoc'";
				$result3 = mysql_query($sql, $con);
				if(!$row3 = mysql_fetch_array( $result3 )){
					$sql = "INSERT INTO baomau (MACB,MALOP,NAMHOC,HOCKI)
						VALUES('$macb','$malop','$namhoc', '$hocky')";
					
					
				}else{
					echo "<script>alert(\"Lớp này đã có bảo mẫu!\"); location.href = \"capnhatqlcanbo_canbo.php\";</script>";
				}
			}else{
				echo "<script>alert(\"Bảo mẫu này đã nhận nhiệm vụ trong học kì - năm học này!\"); location.href = \"capnhatqlcanbo_canbo.php\";</script>";
			}
		}
	else if ($row1['CHUCVU'] == "GVCN")
	{
			
			$sql = "SELECT * FROM chunhiem WHERE MACB = '$macb' AND NAMHOC = '$namhoc'";
			echo $sql;
			$result2 = mysql_query($sql, $con);
			if(!$row2 = mysql_fetch_array( $result2 )){
				$sql = "SELECT * FROM chunhiem WHERE  MALOP = '$malop' AND NAMHOC = '$namhoc'";
				echo $sql;
				$result3 = mysql_query($sql, $con);
				if(!$row3 = mysql_fetch_array( $result3 ))
				{
					$sql = "INSERT INTO chunhiem (MACB,MALOP,NAMHOC,HOCKI)
					VALUES('$macb','$malop','$namhoc', '$hocky')";
				}
				else
				{
					echo "<script>alert(\"Lớp này đã có chủ nhiệm!\"); location.href = \"capnhatqlcanbo_canbo.php\";</script>";
				}
			}
			else
			{
				echo "<script>alert(\"Chủ nhiệm này đã nhận nhiệm vụ trong năm học này!\"); location.href = \"capnhatqlcanbo_canbo.php\";</script>";
			}
	}
	else
	echo "<script>alert(\"Giáo Viên này không phải cán bộ quản lý!\"); location.href = \"capnhatqlcanbo_canbo.php\";</script>";
		
		if ( !mysql_query($sql, $con) )
		die("khong chen duoc");		
		mysql_close($con);
		echo "<script>alert(\"Cập nhật thành công !\"); location.href = \"capnhatqlcanbo_canbo.php\";</script>";
?>