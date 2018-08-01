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
	$ngay = $_GET['ngay'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Website Lập KHHT</title>
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
	<script>	
	function xoa(a,ngay) {
		if (confirm('Bạn có chắc muốn xóa thông tin này không ?' )) {
			document.location = 'xoadkkhongan_canbo.php?a='+a+'&ngay='+ngay;
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
				<li><a href="trangchucanbo.php">Trang chủ</a></li>
				<li><a href="lichbantru_canbo.php">Lịch bán trú</a>				
				</li>
				<li><a href="dscanbo_canbo.php">Danh sách cán bộ</a>
				</li>

				<li><a href="#.php">Quản lý</a>
					<ul>
						<li><a href="capnhatttphuhuynh_canbo.php">Quản lý giảng dạy</a></li>
						<li><a href="qlbantru_canbo.php">Quản lý bán trú</a></li>
						<li><a href="qlphi_canbo.php">Quản lý phí</a></li>
					</ul>
				</li>
				
			<ul>
		</div> <!--end div menu-->
		<div id="content">
			<form action="<?php echo "xuly_suadkkhongan.php?a=".$mahs."&ngay=".$ngay; ?>" onsubmit="return thucpham();" method="post" enctype="multipart/data-form" name="thucpham1">
			<table>
				<tr>
					<td>
						<div id="qlbantru">
							<table>
								<tr>
									<td>
										<a href="qlbantru_canbo.php"><i><b>CN thực phẩm</b></i></a>
									</td>
									<td>
										<a href="capnhatmonan_canbo.php"><i><b>CN món ăn</b></i></a>
									</td>
									<td>
										<a href="capnhatdkkhongan_canbo.php"><i><b>CN đk không ăn</b></i></a>
									</td>
									<td>
										<a href="capnhatngay_canbo.php"><i><b>CN món trong ngày</b></i></a>
									</td>								
								</tr>
							</table>							
						</div><!--end div cap nhat-->
						<div id="capnhattp">
						<h2>CẬP NHẬT ĐĂNG KÝ</h2>
						
							<table>
							<tr>
								<td>
									<table>
										<tr>
											<td class="td" > <b><i>Chọn học sinh:</i></b> </td>
											<td> 
											<?php
												/*$sql = "SELECT * FROM dangkyan WHERE MAHS = '$mahs' AND NGAY = '$ngay'";
												$result1 = mysql_query($sql, $con);
												$row1 = mysql_fetch_array( $result1 );
												$mahs1 = $row1['MAHS'];
												$ngay1 = $row1['NGAY']; */
												
												$sql = "SELECT * FROM hocsinh WHERE MAHS = '$mahs'";
												$result1 = mysql_query($sql, $con);
												$row1 = mysql_fetch_array( $result1 );
												$tenhs = $row1['HOTEN']; 
											?>	
														<select name="mahs">
															<option value="<?php echo $mahs;?>"><?php echo $mahs; echo "-"; echo $tenhs?></option>
															<?php 
																$sql = "SELECT * FROM hocsinh WHERE MAHS != '$mahs'";
																$result2  = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
																while($row2 = mysql_fetch_array($result2))
																{
																	$mahs1 = $row2['MAHS'];
																	$tenhs1 = $row2['HOTEN'];
																	
															?>
															<option value="<?php echo $mahs1; ?>">
															<?php 
																echo $mahs1;echo "-";echo $tenhs1;
															?>
															</option>
															<?php
																}
															?>
														</select>
											</td>
										</tr>
										<tr>
											<td class="td" > <b><i>Chọn ngày:</i></b> </td>
											<td> 
											<?php
												/*$sql = "SELECT * FROM dangkyan WHERE MAHS = '$mahs' AND NGAY = '$ngay'";
												$result1 = mysql_query($sql, $con);
												$row1 = mysql_fetch_array( $result1 );
												$mahs1 = $row1['MAHS'];
												$ngay1 = $row1['NGAY']; */
												
												$sql = "SELECT * FROM hocsinh WHERE MAHS = '$mahs'";
												$result1 = mysql_query($sql, $con);
												$row1 = mysql_fetch_array( $result1 );
												$tenhs = $row1['HOTEN']; 
											?>	
														<select name="ngay">
															<option value="<?php echo $ngay;?>"><?php echo $ngay;?></option>
															<?php 
																$sql = "SELECT * FROM ngay WHERE NGAY != '$ngay'";
																$result3  = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
																while($row3 = mysql_fetch_array($result3))
																{
																	$ngay1 = $row3['NGAY'];	
															?>
															<option value="<?php echo $ngay1; ?>">
															<?php 
																echo $ngay1;
															?>
															</option>
															<?php
																}
															?>
														</select>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="center">
									<input type="submit"  name="save" value="LƯU"
									style="text-align: center;
									width: 70px;
									height: 25px;
									background: url(Img/xanhnen2.png);
									color: white;
									font-style: italic" 
									 />
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="reset"  name="reset" value="LÀM LẠI"
									style="text-align: center;
									width: 70px;
									height: 25px;
									background: url(Img/xanhnen2.png);
									color: white;
									font-style: italic" 
									 />
								</td>						
							</tr>
							</table>
						
						</div>
						
						<div id="capnhattp2">
						<h2>DANH SÁCH ĐĂNG KÝ</h2>
						</div>
						<div id="capnhattp3">
							<table>
								<tr>
									<th width="10" rowspan="2">
										STT
									</th>
									<th width="80" rowspan="2">Mã HS</th>
									<th width="180" rowspan="2">Tên Học Sinh</th>
									<th width="120" rowspan="2">Ngày</th>
									<th colspan="2" width="100">Cập nhật</th>
								</tr>
								<tr>
									<th width="80">Sửa</th>
									<th width="80">Xóa</th>
								</tr>
								
								<?php 
									$cnt=0;
									$sql = "SELECT * FROM dangkyan INNER JOIN hocsinh ON dangkyan.mahs = hocsinh.mahs";
									$result3 = mysql_query($sql, $con);
									while($row3 = mysql_fetch_array( $result3))
									{ $cnt++;
								?>
								<tr>
									<td width="10" align="center">
										<?php echo $cnt; ?>
									</td>
									<td width="80" align="center"><?php echo $row3['MAHS']; ?></td>
									<td width="180">&nbsp;<?php echo $row3['HOTEN']; ?></td>
									<td width="120" align="center"><?php echo $row3['NGAY']; ?></td>
									<td align="center">
										<a href="<?php echo "suadkkhongan_canbo.php?a=".$row3['MAHS']."&ngay=".$row3['NGAY']; ?>">
											<img src="Img/sua1.png" title="Sửa" alt="SUA" width="25" height="25"></a></td>
									<td align="center">
										<a href="javascript:xoa('<?php echo $row3['MAHS'] ?>','<?php echo $row3['NGAY'] ?>');">
												<img src="Img/xoa.png" alt="XOA" title="Xóa" width="25" height="25"></a>
									</td>
								</tr>
								<?php
									}
								?>
							</table>
						</div>
					</td>
				</tr>
			</table>
			</form>
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