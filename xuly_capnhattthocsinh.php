<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	$hoten= $_POST['hoten'];

	$ngay= $_POST['ngay'];

	$thang= $_POST['thang'];

	$nam= $_POST['nam'];

	$ngaysinh=$nam."/".$thang."/".$ngay;

	$gioitinh = $_POST['sex'];

	$malop= $_POST['lop'];

	$maph= $_POST['phuhuynh'];

	$namhoc = $_POST['namhoc'];
	
	$hocki = $_POST['hocki'];
	
	$cnt = 0;
	$mahs1 = $malop."0".$cnt;
	$sql = "SELECT * FROM hocsinh WHERE LEFT(MAHS,3) = '$malop'";
	$result1 = mysql_query($sql,$con);
	while($row1 = mysql_fetch_array($result1))
	{
		
		$mahs1 = $row1['MAHS'];
	}
		$string = $mahs1;
		$cnt= substr($string, 3, 2);
		$cnt=(int)$cnt;
		$cnt=$cnt+1;
		if($cnt < 10)
		{
			$mahs = $malop."0".$cnt;		
		}
		else $mahs = $malop.$cnt;

	$sql = "INSERT INTO hocsinh (MAHS,HOTEN,NGAYSINH,GIOITINH,MAPH)
				VALUES('$mahs','$hoten', '$ngaysinh' ,'$gioitinh','$maph')";
	

		if ( !mysql_query($sql, $con) )
		die("khong chen duoc");
		else 
			{
			$sql = "INSERT INTO hoc (MAHS,MALOP,NAMHOC,HOCKI)
						VALUES ('$mahs','$malop','$namhoc','$hocki')";
			if ( !mysql_query($sql, $con) )
			die("khong chen duoc");
			}

		mysql_close($con);
		echo "<script>alert(\"Cập nhật thành công !\"); location.href = \"capnhattthocsinh_canbo.php\";</script>";
?>