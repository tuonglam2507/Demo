﻿<?php
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
	<script>	
	function xoa(a) {
		if (confirm('Bạn có chắc muốn xóa thông tin này không ?' )) {
			document.location = 'xoangay_canbo.php?a='+a;
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
			<form action="xuly_capnhatngay.php" onsubmit="return mangay();" method="post" enctype="multipart/data-form" name="mangay1">
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
						<h2>CẬP NHẬT MÓN ĂN TRONG NGÀY</h2>
						
							<table>
								<tr>
								<td>
								<table>
								<tr>
									<td class="td"><i><b>Chọn ngày:</b></i></td>
									<td>
										<select name="ngay">
											<option value="Ngay">Ngày</option>
											<?php
												$ngay=0;
												while($ngay<=30)
												{ $ngay++;
													if($ngay <=9) $ngay = "0".$ngay;
													else $ngay = $ngay;
											?>
												<option value="<?php echo $ngay; ?>"><?php echo $ngay; ?></option>
											<?php
												}
											?>
										</select>
								
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select name="thang">
											<option value="Thang">Tháng</option>
											<?php
												$thang=0;
												while($thang<=11)
												{ $thang++;
													if($thang <=9) $thang = "0".$thang;
													else $thang = $thang;
											?>
												<option value="<?php echo $thang; ?>"><?php echo $thang; ?></option>
											<?php
											 }
											?>
										</select>
									
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="nam">
											<option value="Nam">Năm</option>
											<?php
												$nam=2000;
												$now= getdate();
												$year= $now["year"];
												while($nam<=$year)
												{ $nam++;
											?>
												<option value="<?php echo $nam; ?>"><?php echo $nam; ?></option>
											<?php
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td class="td" > <b><i>Chọn món:</i></b> </td>
												<td> 
													<select name="mamon">
														<option value="Chọn món">Món ăn</option>
														<?php 
															$sql = "SELECT * FROM monan";
															$result1  = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
															while($row1 = mysql_fetch_array($result1))
															{
																$mamon = $row1['MAMON'];
																$tenmon = $row1['TENMON'];
																														
														?>
														<option value="<?php echo $mamon; ?>">
														<?php 
															echo $mamon;echo "-";echo $tenmon;
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
							<input type="submit"  name="save" value="THÊM"
							style="text-align: center;
							width: 70px;
							height: 25px;
							background: url(Img/xanhnen2.png);
							color: white;
							font-style: italic" 
							 />
							 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset"  name="reset" value="LÀM LẠI"
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
						<h2>DANH SÁCH MÓN ĂN TRONG NGÀY</h2>
							
						
						</div>
						<div id="capnhattp3">
							<table>
								<tr>
									<th width="10" rowspan="2">
										STT
									</th>
									<th width="80" rowspan="2">Ngày</th>
									<th width="200" rowspan="2">Tên món</th>								
									<th colspan="2" width="100">Cập nhật</th>
								</tr>
								<tr>
									<th width="80">Sửa</th>
									<th width="80">Xóa</th>
								</tr>
								
								<?php 
									$cnt=0;
									$sql = "SELECT * FROM ngay INNER JOIN monan ON ngay.mamon = monan.mamon";
									$result2 = mysql_query($sql, $con);
									while($row2 = mysql_fetch_array( $result2 ))
									{ $cnt++;
									  
								?>
								<tr>
									<td width="10" align="center">
										<?php echo $cnt; ?>
									</td>
									<td width="120" align="center"><?php echo $row2['NGAY']; ?></td>
									<td width="180">&nbsp;<?php echo $row2['TENMON']; ?></td>
									<td align="center">
										<a href="<?php echo "suangay_canbo.php?a=".$row2['NGAY']; ?>">
											<img src="Img/sua1.png" title="Sửa" alt="SUA" width="25" height="25"></a></td>
									<td align="center">
										<a href="javascript:xoa('<?php echo $row2['NGAY'] ?>');">
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