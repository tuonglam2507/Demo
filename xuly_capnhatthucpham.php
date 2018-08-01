<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$mamon= $_POST['mamon'];
	$tentp= $_POST['tentp'];
	
	$cnt1=0;
	$matp1 = "TP000".$cnt1;
	$sql = "SELECT * FROM thucpham";
	$result2 = mysql_query($sql, $con);
	while($row2 = mysql_fetch_array( $result2 ))
	{
	$matp1 = $row2['MATP'];
	}

	$string = $matp1;
	$cnt= substr($string, 2, 4);
	$cnt=(int)$cnt;

	$cnt=$cnt+1;
	if($cnt < 10)
		{
			$matp = "TP000".$cnt;
		}
		else if(($cnt >= 10) & ($cnt < 100))
		{
			$matp = "TP00".$cnt;
		}
		else if(($cnt >= 100) & ($cnt < 1000))
		{
			$matp = "TP0".$cnt;
		}
		else $matp = "TP".$cnt;

	$sql = "INSERT INTO thucpham (MATP,MAMON,TENTP)
				VALUES('$matp','$mamon','$tentp')";


		if ( !mysql_query($sql, $con) )
		die("khong chen duoc");
		else echo "thanhcong";		
		mysql_close($con);
		echo "<script>alert(\"Cập nhật thành công !\"); location.href = \"qlbantru_canbo.php\";</script>";
?>