<?php
session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Website Quản Lý Bán Trú</title>
    <meta http-equiv="Content-Language" content="English" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	<script src="java.js" type="text/javascript"></script>
	<script>	
	function thoat() {
		if (confirm('Bạn có chắc muốn thoát không ?' )) {
			document.location = 'thoat.php';
			return;
		}
	}
</script>	
</head>
<body>
	<div id="wrap">
		<div id="title">
		</div> <!--end div title-->
		<div id="xinchao">
			<table>
				<tr>
					<td>
						<b>Xin chào,</b> <i><b><?php  echo $row['HOTEN']; ?> (<?php echo $row['MACB']; ?>)</b></i><a class="white" href="javascript:thoat();"><b> || Thoát</b></a>
					</td>
				</tr>
			</table>
		</div><!--end div title-->
		<div id="menu">
			<ul>
				<li><a href="Index.php">Trang chủ</a></li>
				<li><a href="lichbantru_canbo.php">Lịch bán trú</a>				
				</li>
				<li><a href="dscanbo_canbo.php">Danh sách cán bộ</a>
				</li>
				<li><a href="#">Quản lý</a>
					<ul>
						<li><a href="capnhatttphuhuynh_canbo.php">Quản lý giảng dạy</a></li>
						<li><a href="qlbantru_canbo.php">Quản lý bán trú</a></li>
						<li><a href="qlphi_canbo.php">Quản lý phí</a></li>
					</ul>
				</li>
			<ul>
		</div> <!--end div menu-->
		<div id="content">
			<h2>DANH SÁCH CÁN BỘ</h2>
				<div id="capnhatttphuhuynh3">
					<table>
						<tr>
							<td width="10"><center><b>STT</b></center></td>
							<td width="80"><center><b>Mã CB</b></center></td>
							<td width="200"><center><b>Họ và tên</b></center></td>
							<td width="150"><center><b>Ngày sinh</b></center></td>
							<td width="100"><center><b>Giới tính</b></center></td>
							<td width="300"><center><b>Địa chỉ</b></center></td>
							<td width="100"><center><b>SĐT</b></center></td>
							<td width="100"><center><b>Chức Vụ</b></center></td>
						</tr>
									
							<?php 
								$cnt=0;
								$sql = "SELECT * FROM canbo";
								$result1 = mysql_query($sql, $con);
								while($row1 = mysql_fetch_array( $result1 ))
								{ $cnt++;
								?>
								<tr>
									<td width="10" align="center">
										<?php echo $cnt; ?>
									</td>
									<td width="80" align="center"><?php echo $row1['MACB']; ?></td>
									<td width="180">&nbsp;<?php echo $row1['HOTEN']; ?></td>
									<td width="120" align="center"><?php echo $row1['NGAYSINH']; ?></td>
									<td width="80" align="center"><?php echo $row1['GIOITINH_CB']; ?></td>
									<td width="80" align="center"><?php echo $row1['DIACHI']; ?></td>
									<td width="250" >&nbsp;<?php echo $row1['SDT']; ?></td>
									
									<td width="150">&nbsp;<?php echo $row1['CHUCVU']; ?></td>
								</tr>
								<?php
									}
								?>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</div><!--end div content-->
			
		<div id="end">
			<table>
				<tr><td>Trường Tiểu học Trần Quốc Toản</td></tr>
				<tr><td>Đường P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ.</td>
				<tr><td>Điện thoại: (0710)3825383</td></tr>
			</table>
		</div><!--div id end-->
	</div><!--end div wrap-->	
</body>
</html>