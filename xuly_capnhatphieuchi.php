<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$tenpc= $_POST['tenpc'];

	$ngay= $_POST['ngay'];

	$thang= $_POST['thang'];

	$nam= $_POST['nam'];

	$ngaychi=$nam."/".$thang."/".$ngay;

	$thucpham = $_POST['thucpham'];

	$sotien= $_POST['sotien'];

	$cnt1=0;
	$mapc1 = "PC000".$cnt1;
	$sql = "SELECT * FROM phieuchi";
	$result2 = mysql_query($sql, $con);
	while($row2 = mysql_fetch_array( $result2 ))
	{
	$mapc1 = $row2['MAPC'];
	}

	$string = $mapc1;
	$cnt= substr($string, 2, 4);
	$cnt=(int)$cnt;

	$cnt=$cnt+1;
	if($cnt < 10)
		{
			$mapc = "PC000".$cnt;
		}
		else if(($cnt >= 10) & ($cnt < 100))
		{
			$mapc = "PC00".$cnt;
		}
		else if(($cnt >= 100) & ($cnt < 1000))
		{
			$mapc = "PC0".$cnt;
		}
		else $mapc = "PC".$cnt;

	$sql = "INSERT INTO phieuchi (MAPC,TENPC,SOTIEN,NGAYCHI,MATP)
				VALUES('$mapc','$tenpc', '$sotien' ,'$ngaychi','$thucpham')";


		if ( !mysql_query($sql, $con) )
		die("khong chen duoc");
		
		mysql_close($con);
		echo "<script>alert(\"Cập nhật thành công !\"); location.href = \"capnhatphieuchi_canbo.php\";</script>";
?>