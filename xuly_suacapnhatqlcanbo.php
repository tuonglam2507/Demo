<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	$macbcu= $_GET['a'];
	$sql = "SELECT * FROM canbo WHERE MACB='$macbcu'";
	$result7 = mysql_query($sql, $con);
	$row7 = mysql_fetch_array( $result7 );
	$chucvu=$row7['CHUCVU'];
	if($chucvu == "Bảo mẫu")
	{
	$sql = "SELECT * FROM baomau WHERE MACB='$macbcu'";
	$result8 = mysql_query($sql, $con);
	$row8 = mysql_fetch_array( $result8);
	$hockycu = $row8['HOCKI'];
	$namhoccu = $row8['NAMHOC'];
	$malopcu = $row8['MALOP'];
	}else{
	$sql = "SELECT * FROM chunhiem WHERE MACB='$macbcu'";
	$result9 = mysql_query($sql, $con);
	$row9 = mysql_fetch_array( $result9);
	$hockycu = $row9['HOCKI'];
	$namhoccu = $row9['NAMHOC'];
	$malopcu = $row9['MALOP'];
	}
	
	$macb= $_POST['canbo'];
	$namhoc= $_POST['nam'];
	$hocky= $_POST['hocky'];
	$malop = $_POST['lop'];

	$sql = "SELECT * FROM canbo WHERE MACB = '$macbcu'";
	$result1 = mysql_query($sql, $con);
	$row1 = mysql_fetch_array( $result1 );
	if ($row1["CHUCVU"]	== "Bảo mẫu")
		{
			if($macbcu == $macb & $malopcu==$malop & $hockycu == $hocky & $namhoccu == $namhoc){
					$sql = "UPDATE baomau SET MALOP = '$malop',HOCKI='$hocky', NAMHOC='$namhoc' WHERE MACB= '$macb'";
					if ( !mysql_query($sql, $con) )
					die("khong sua duoc");
					else echo "thanh cong";
			}
			else if($malop == $malopcu){
				$sql = "SELECT * FROM baomau WHERE MACB = '$macb' AND HOCKI = '$hocky' AND NAMHOC = '$namhoc'";
				echo $sql;
				$result2 = mysql_query($sql, $con);
				if(!$row2 = mysql_fetch_array( $result2 )){
					$sql = "UPDATE baomau SET MALOP = '$malop',HOCKI='$hocky', NAMHOC='$namhoc' WHERE MACB= '$macb'";
					
					if ( !mysql_query($sql, $con) )
					die("khong sua duoc");
				}else{
					echo "<script>alert(\"Bảo mẫu này đã nhận nhiệm vụ trong học kì - năm học này!\"); location.href = \"capnhatqlcanbo_canbo.php\";</script>";
					
					}
			}else{
				$sql = "SELECT * FROM baomau WHERE  MALOP = '$malop' AND NAMHOC = '$namhoc'";
				$result3 = mysql_query($sql, $con);
				if(!$row3 = mysql_fetch_array( $result3 )){
					$sql = "UPDATE baomau SET MALOP = '$malop',HOCKI='$hocky', NAMHOC='$namhoc' WHERE MACB= '$macb'";
					if ( !mysql_query($sql, $con) )
					die("khong sua duoc");
				}else{
					echo "<script>alert(\"Lớp này đã có bảo mẫu!\"); location.href = \"capnhatqlcanbo_canbo.php\";</script>";
					
				}
			}
			
		}
	else if($row1["CHUCVU"]	== "GVCN")
		{
			if($macbcu == $macb & $malopcu==$malop & $hockycu == $hocky & $namhoccu == $namhoc){
					$sql = "UPDATE baomau SET MALOP = '$malop',HOCKI='$hocky', NAMHOC='$namhoc' WHERE MACB= '$macb'";
					if ( !mysql_query($sql, $con) )
					die("khong sua duoc");
					else echo "thanh cong";
			}
			else if($malop == $malopcu){
				$sql = "SELECT * FROM chunhiem WHERE MACB = '$macb'  AND NAMHOC = '$namhoc'";
				echo $sql;
				$result2 = mysql_query($sql, $con);
				if(!$row2 = mysql_fetch_array( $result2 )){
					$sql = "UPDATE chunhiem SET MALOP = '$malop',HOCKI='$hocky', NAMHOC='$namhoc' WHERE MACB= '$macb'";
					
					if ( !mysql_query($sql, $con) )
					die("khong sua duoc");
				}else{
					echo "<script>alert(\"chủ nhiệm này đã nhận nhiệm vụ trong  năm học này!\"); location.href = \"capnhatqlcanbo_canbo.php\";</script>";
					
					}
			}else{
				$sql = "SELECT * FROM chunhiem WHERE  MALOP = '$malop' AND NAMHOC = '$namhoc'";
				//echo $sql;
				$result3 = mysql_query($sql, $con);
				if(!$row3 = mysql_fetch_array( $result3 )){
					$sql = "UPDATE chunhiem SET MALOP = '$malop', HOCKI='$hocky', NAMHOC='$namhoc' WHERE MACB= '$macb'";
					if ( !mysql_query($sql, $con) )
					die("khong sua duoc");
				}else{
					echo "<script>alert(\"Lớp này đã có chu nhiem!\"); location.href = \"capnhatqlcanbo_canbo.php\";</script>";
					
				}
			}
		}
		
			
		mysql_close($con);
		echo "<script>alert(\"Sửa thành công !\"); location.href = \"capnhatqlcanbo_canbo.php\";</script>";
?>