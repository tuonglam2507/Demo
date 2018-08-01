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

	$chucvu= $_POST['chucvu'];

	$diachi= $_POST['diachi'];
	$sdt = $_POST['sdt'];


	$cnt1=0;
	$macb1 = "CB00".$cnt1;
	$sql = "SELECT * FROM canbo";
	$result2 = mysql_query($sql, $con);
	while($row2 = mysql_fetch_array( $result2 ))
	{
	$macb1 = $row2['MACB'];
	}

	$string = $macb1;
	$cnt= substr($string, 2, 3);
	$cnt=(int)$cnt;

	$cnt=$cnt+1;
	if($cnt < 10)
		{
			$macb = "CB00".$cnt;
		}
		else if(($cnt >= 10) & ($cnt < 100))
		{
			$macb = "CB0".$cnt;
		}
		else $macb = "CB".$cnt;

		
	$sql = "INSERT INTO canbo (MACB,HOTEN,NGAYSINH,DIACHI,SDT,CHUCVU,GIOITINH_CB)
				VALUES('$macb','$hoten', '$ngaysinh' ,'$diachi','$sdt','$chucvu','$gioitinh')";

		if ( !mysql_query($sql, $con) )
		die("khong chen duoc");
		mysql_close($con);
		echo "<script>alert(\"Cập nhật thành công !\"); location.href = \"capnhatttcanbo_canbo.php\";</script>";
?>