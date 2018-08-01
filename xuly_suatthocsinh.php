<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$mahs = $_GET['a'];
	$malopcu = $_GET['malop'];

	$hockicu = $_GET['hocki'];

	$namhoccu = $_GET['namhoc'];

	
	$hoten= $_POST['hoten'];
	$ngay= $_POST['ngay'];
	$thang= $_POST['thang'];
	$nam= $_POST['nam'];
	$ngaysinh=$nam."/".$thang."/".$ngay;
	$gioitinh = $_POST['sex'];
	$lop= $_POST['lop'];
	$phuhuynh= $_POST['phuhuynh'];
	$namhoc= $_POST['namhoc'];
	$hocki= $_POST['hocki'];
	
	$string = $mahs;
	$cnt= substr($string, 3, 2);
	$cnt=(int)$cnt;
		if($cnt < 10)
		{
			$mahs1 = $lop."0".$cnt;
		}
		else $mahs1 = $lop.$cnt;
		
	$sql = "DELETE FROM hoc WHERE MAHS= '$mahs'";

	if ( !mysql_query($sql, $con) )
		{
			die("khong xoa duoc");
		}
	else
		{
			$sql = "UPDATE hocsinh SET MAHS = '$mahs1', HOTEN='$hoten', NGAYSINH='$ngaysinh', GIOITINH='$gioitinh',MAPH='$phuhuynh' WHERE MAHS = '$mahs'";

				if ( !mysql_query($sql, $con) )
					{
						$sql =  "INSERT INTO hoc (MAHS,MALOP,HOCKI,NAMHOC)
									VALUES ('$mahs','$malopcu','$hockicu','$namhoccu')";

						if ( !mysql_query($sql, $con) )
						die("khong sua duoc");
						echo "<script>alert(\"Mã học sinh này đang được sử dụng !\"); location.href = \"capnhattthocsinh_canbo.php\";</script>";
					
					}
				else
					{
						$sql =  "INSERT INTO hoc (MAHS,MALOP,HOCKI,NAMHOC)
									VALUES ('$mahs1','$lop','$hocki','$namhoc')";

						if ( !mysql_query($sql, $con) )
						die("khong insert duoc");
					}
				}

			echo "<script>alert(\"Sửa thành công !\"); location.href = \"capnhattthocsinh_canbo.php\";</script>";
?>