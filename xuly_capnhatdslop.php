<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	$malop= $_POST['malop'];
	echo $malop;
	
	$sql = "INSERT INTO lop (MALOP)
				VALUES('$malop')";

		echo $sql;
		if ( !mysql_query($sql, $con) )
		die("khong chen duoc");
		else echo "thanhcong";		
		mysql_close($con);
		header("location: capnhatdslop_canbo.php");
		
?>