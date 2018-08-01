<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	$hoten= $_POST['username'];

	$ngay= $_POST['ngay'];

	$thang= $_POST['thang'];

	$nam= $_POST['nam'];

	$ngaysinh=$nam."/".$thang."/".$ngay;

	$gioitinh = $_POST['sex'];

	$vaitro= $_POST['vaitro'];

	$diachi= $_POST['diachi'];
	$sdt = $_POST['sdt'];


	$cnt=0;
	$maph1 = "PH000".$cnt;
	$sql = "SELECT * FROM phuhuynh";
	$result2 = mysql_query($sql, $con);
	while($row2 = mysql_fetch_array( $result2 ))
	{
	$maph1 = $row2['MAPH'];
	}

	$string = $maph1;
	$cnt= substr($string, 2, 4);
	$cnt=(int)$cnt;

	$cnt=$cnt+1;
	if($cnt < 10)
		{
			$maph = "PH000".$cnt;
		}
		else if(($cnt >= 10) & ($cnt < 100))
		{
			$maph = "PH00".$cnt;
		}
		else if(($cnt >= 100) & ($cnt < 1000))
		{
			$maph = "PH0".$cnt;
		}
		else $maph = "PH".$cnt;

	$sql = "INSERT INTO phuhuynh (MAPH,TENPH,NGAYSINH,DIACHI,SODT,VAITRO,GIOITINH_PH)
											VALUES('$maph','$hoten', '$ngaysinh' ,'$diachi','$sdt','$vaitro','$gioitinh')";


		if ( !mysql_query($sql, $con) )
		die("khong chen duoc");		
		mysql_close($con);
		echo "<script>alert(\"Cập nhật thành công !\"); location.href = \"capnhatttphuhuynh_canbo.php\";</script>";
?>