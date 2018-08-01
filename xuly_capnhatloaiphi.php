<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$tenphi= $_POST['tenphi'];

	$cnt1=0;
	$maphi1 = "LP000".$cnt1;
	$sql = "SELECT * FROM loaiphi";
	$result2 = mysql_query($sql, $con);
	while($row2 = mysql_fetch_array( $result2 ))
	{
	$maphi1 = $row2['MAPHI'];
	}

	$string = $maphi1;
	$cnt= substr($string, 2, 4);
	$cnt=(int)$cnt;

	$cnt=$cnt+1;
	if($cnt < 10)
		{
			$maphi = "LP000".$cnt;
		}
		else if(($cnt >= 10) & ($cnt < 100))
		{
			$maphi = "LP00".$cnt;
		}
		else if(($cnt >= 100) & ($cnt < 1000))
		{
			$maphi = "LP0".$cnt;
		}
		else $maphi = "LP".$cnt;

	$sql = "INSERT INTO loaiphi (MAPHI,DIENGIAI)
				VALUES('$maphi','$tenphi')";


		if ( !mysql_query($sql, $con) )
		die("khong chen duoc");		
		mysql_close($con);
		echo "<script>alert(\"Cập nhật thành công !\"); location.href = \"qlphi_canbo.php\";</script>";
?>