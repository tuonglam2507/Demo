<?php
	session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	
	$mapt = $_GET['a'];
	
	$maphicu = $_GET['maphi'];

	$sotiencu = $_GET['sotien'];
	
	$tenpt= $_POST['tenpt'];
	$ngay= $_POST['ngay'];
	$thang= $_POST['thang'];
	$nam= $_POST['nam'];
	$ngaythu=$nam."/".$thang."/".$ngay;
	$mahs = $_POST['hocsinh'];
	$maphi= $_POST['maphi'];
	$sotien= $_POST['sotien'];
	
	$sql = "DELETE FROM thanhtien WHERE MAPT= '$mapt' AND MAPHI = '$maphicu'";

	if ( !mysql_query($sql, $con) )
		{
			die("khong xoa duoc");
		}
	else
		{
			$sql = "UPDATE phieuthu SET MAHS = '$mahs', TENPT='$tenpt', NGAYTHU='$ngaythu' WHERE MAPT = '$mapt'";

				if ( !mysql_query($sql, $con) )
					{
						$sql =  "INSERT INTO thanhtien (MAPT,MAPHI,SOTIEN)
									VALUES ('$mapt','$maphicu','$sotiencu')";

						if ( !mysql_query($sql, $con) )
						die("khong sua duoc");
						echo "<script>alert(\"Phieu thu này đang được sử dụng !\"); location.href = \"capnhatphieuthu_canbo.php\";</script>";
					
					}
				else
					{
						$sql =  "INSERT INTO thanhtien (MAPT,MAPHI,SOTIEN)
									VALUES ('$mapt','$maphi','$sotien')";

						if ( !mysql_query($sql, $con) )
						die("khong insert duoc");
					}
				}

			echo "<script>alert(\"Sửa thành công !\"); location.href = \"capnhatphieuthu_canbo.php\";</script>";
?>