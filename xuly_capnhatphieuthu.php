<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$tenpt= $_POST['tenpt'];

	$ngay= $_POST['ngay'];

	$thang= $_POST['thang'];

	$nam= $_POST['nam'];

	$ngaythu=$nam."/".$thang."/".$ngay;

	$mahs = $_POST['hocsinh'];

	$sotien= $_POST['sotien'];
	
	$maphi = $_POST['maphi'];

	$cnt1=0;
	$mapt1 = "PT000".$cnt1;
	$sql = "SELECT * FROM phieuthu";
	$result2 = mysql_query($sql, $con);
	while($row2 = mysql_fetch_array( $result2 ))
	{
	$mapt1 = $row2['MAPT'];
	}

	$string = $mapt1;
	$cnt= substr($string, 2, 4);
	$cnt=(int)$cnt;

	$cnt=$cnt+1;
	if($cnt < 10)
		{
			$mapt = "PT000".$cnt;
		}
		else if(($cnt >= 10) & ($cnt < 100))
		{
			$mapt = "PT00".$cnt;
		}
		else if(($cnt >= 100) & ($cnt < 1000))
		{
			$mapt = "PT0".$cnt;
		}
		else $mapt = "PT".$cnt;

	$sql = "INSERT INTO phieuthu (MAPT,TENPT,NGAYTHU,MAHS)
				VALUES('$mapt','$tenpt', '$ngaythu' ,'$mahs')";


		if ( !mysql_query($sql, $con) )
		die("khong chen duoc");
		else
		{
			$sql = "INSERT INTO thanhtien (MAPT,MAPHI,SOTIEN)
				VALUES('$mapt','$maphi', '$sotien')";
			if ( !mysql_query($sql, $con) )
			die("khong chen duoc");
		}
		mysql_close($con);
		echo "<script>alert(\"Cập nhật thành công !\"); location.href = \"capnhatphieuthu_canbo.php\";</script>";
?>