<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$tenmon= $_POST['tenmon'];

	$cnt1=0;
	$mamon1 = "MA000".$cnt1;
	$sql = "SELECT * FROM monan";
	$result2 = mysql_query($sql, $con);
	while($row2 = mysql_fetch_array( $result2 ))
	{
	$mamon1 = $row2['MAMON'];
	}

	$string = $mamon1;
	$cnt= substr($string, 2, 4);
	$cnt=(int)$cnt;

	$cnt=$cnt+1;
	if($cnt < 10)
		{
			$mamon = "MA000".$cnt;
		}
		else if(($cnt >= 10) & ($cnt < 100))
		{
			$mamon = "MA00".$cnt;
		}
		else if(($cnt >= 100) & ($cnt < 1000))
		{
			$mamon = "MA0".$cnt;
		}
		else $mamon = "MA".$cnt;

	$sql = "INSERT INTO monan (MAMON,TENMON)
				VALUES('$mamon','$tenmon')";


		if ( !mysql_query($sql, $con) )
		die("khong chen duoc");
		else echo "thanhcong";		
		mysql_close($con);
		echo "<script>alert(\"Cập nhật thành công !\"); location.href = \"capnhatmonan_canbo.php\";</script>";
?>