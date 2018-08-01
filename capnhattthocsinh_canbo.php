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
<script>	
	function xoa(a,malop,hocki,namhoc) {
		if (confirm('Bạn có chắc muốn xóa thông tin này không ?' )) {
			document.location = 'xoatthocsinh_canbo.php?a='+a+'&malop='+malop+'&hocki='+hocki+'&namhoc='+namhoc;
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
			<form action="xuly_capnhattthocsinh.php" onsubmit="return hocsinh();" method="post" enctype="multipart/data-form" name="hocsinh1">
			<table>
				<tr>
					<td>
						<div id="qlgiangday">
							<table>
								<tr>
									<tr>
									<td>
										<a href="capnhatttphuhuynh_canbo.php"><i><b>CN TT Phụ Huynh</b></i></a>
									</td>
									<td>
										<a href="capnhattthocsinh_canbo.php"><i><b>CN TT Học Sinh</b></i></a>
									</td>									
									<td>
										<a href="capnhatdslop_canbo.php"><i><b>CN Lớp</b></i></a>
									</td>
									<td>
										<a href="capnhatttcanbo_canbo.php"><i><b>CN TT Cán Bộ</b></i></a>
									</td>		
									<td>
										<a href="capnhatqlcanbo_canbo.php"><i><b>CN quản lý</b></i></a>
									</td>	
								</tr>
							</table>
							
						</div><!--end div qlgiangday-->
						<div id="capnhatthocsinh">
						<h2>CẬP NHẬT THÔNG TIN HỌC SINH</h2>
						
							<table>
								<tr>
									<td>
										<table>
											<tr>
												<td class="td"><i><b>Họ và tên:</b></i></td><td> <input type="text"  style="width: 175px;" name="hoten"/> </td>
											</tr>
											<tr>
												<td class="td"><i><b>Ngày sinh:</b></i></td>
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
															while($nam<=2007)
															{ $nam++;
														?>
															<option value="<?php echo $nam; ?>"><?php echo $nam; ?></option>
														<?php
														 }
														?>
													</select>
												</td>
												<td>
										
												</td>
											</tr>			
											<tr>
												<td class="td"><i><b>Giới tính:</b></i></td><td><input type="radio" name="sex" value="Nam"/>Nam
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sex" value="Nữ">Nữ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sex" value="Khác"/>Khác</td>
											</tr>
										</table>
									</td>
									<td>
									<div id="capnhattphuhuynh1">
										<table>
											<tr>
												<td class="td" > <b><i>Lớp:</i></b> </td>
												<td> 
													<select name="lop">
														<option value="Chọn lớp">Lớp</option>
														<?php 
															$sql = "SELECT * FROM lop";
															$result  = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
															while($row = mysql_fetch_array($result))
															{
																$malop = $row['MALOP'];
																
														?>
														<option value="<?php echo $malop; ?>">
														<?php 
															echo $malop;
														?>
														</option>
														<?php
															}
														?>
													</select>
												</td>
											</tr>
											<tr>
												<td class="td" > <b><i>Phụ huynh:</i></b> </td>
												<td> 
													<select name="phuhuynh">
														<option value="Chọn PH">Phụ huynh</option>
														<?php 
															$sql = "SELECT * FROM phuhuynh";
															$result1  = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
															while($row1 = mysql_fetch_array($result1))
															{
																$maph = $row1['MAPH'];
																$tenph = $row1['TENPH'];
														?>
														<option value="<?php echo $maph; ?>">
														<?php 
															echo $maph; echo "-"; echo $tenph;
														?>
														</option>
														<?php
															}
														?>
													</select>
												</td>
											</tr>
											<tr>
												<td class="td" > <b><i>Năm học:</i></b> </td>
												<td> 
													<select name="namhoc">
														<option value="Chọn NH">Năm học</option>
														<?php 
															$sql = "SELECT * FROM namhoc";
															$result1  = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
															while($row1 = mysql_fetch_array($result1))
															{
																$namhoc = $row1['NAMHOC'];															
														?>
														<option value="<?php echo $namhoc; ?>">
														<?php 
															echo $namhoc;
														?>
														</option>
														<?php
															}
														?>
													</select>
												</td>
											</tr>
											<tr>
												<td class="td" > <b><i>Học kì:</i></b> </td>
												<td> 
													<select name="hocki">
														<option value="Chọn HK">Học kì</option>
														<?php 
															$sql = "SELECT * FROM hocki";
															$result1  = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
															while($row1 = mysql_fetch_array($result1))
															{
																$hocki = $row1['HOCKI'];															
														?>
														<option value="<?php echo $hocki; ?>">
														<?php 
															echo $hocki;
														?>
														</option>
														<?php
															}
														?>
													</select>
												</td>
											</tr>
										</table>
									<div>
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
							</form>
						</div>
						<div id="capnhatttcanbo1">
						<form action="timkiemtthocsinh.php"   method="post" enctype="multipart/data-form" name="timkiem_tthocsinh">
							<table>
								<tr>
									<td>
										<i><b>Tìm kiếm:</b></i>
									</td>
									<td> <input type="text"  style="width: 200px;" name="tim"/> </td>
									<td>
									<input type="submit"  name="search" value=""
							style="text-align: center;
							width: 40px;
							height: 40px;
							background: url(Img/search1.png);
							color: white;
							font-style: italic" 
							 />
							 </td>
								</tr>
							</table>
						</div>
						<div id="capnhatttphuhuynh2">
						<h2>DANH SÁCH HỌC SINH</h2>
						</div>
						
						<div id="capnhatttphuhuynh3">
							<table>
								<tr>
									<th width="10" rowspan="2">
										STT
									</th>
									<th width="80" rowspan="2">Mã HS</th>
									<th width="200" rowspan="2">Họ và tên</th>
									<th width="100" rowspan="2">Ngày sinh</th>
									<th rowspan="2">Giới tính</th>
									<th rowspan="2">Lớp</th>
									<th rowspan="2">Phụ Huynh</th>
									<th colspan="2" width="100">Cập nhật</th>
								</tr>
								<tr>
									<th width="80">Sửa</th>
									<th width="80">Xóa</th>
								</tr>
								
								<?php 
									$cnt=0;
									$sql = "SELECT * FROM hocsinh";
									$result1 = mysql_query($sql, $con);
									while($row1 = mysql_fetch_array( $result1 ))
									{ $cnt++;
								?>
								<tr>
									<td width="10" align="center">
										<?php echo $cnt; ?>
									</td>
									<td width="80" align="center"><?php echo $row1['MAHS']; ?></td>
									<td width="180">&nbsp;<?php echo $row1['HOTEN']; ?></td>
									<td width="100" align="center"><?php echo $row1['NGAYSINH']; ?></td>
									<td width="80" align="center"><?php echo $row1['GIOITINH']; ?></td>
									<td width="80" align="center"><?php $sql = "SELECT * FROM HOC WHERE MAHS = '$row1[MAHS]'";
																		$result2 = mysql_query($sql, $con);
																		$row2 = mysql_fetch_array( $result2 );
																		echo $row2['MALOP']; ?></td>
									<td width="150" align="center"><?php $sql = "SELECT * FROM PHUHUYNH WHERE MAPH = '$row1[MAPH]'";
																		$result3 = mysql_query($sql, $con);
																		$row3 = mysql_fetch_array( $result3 );
																		echo $row3['TENPH']; ?></td>
									<td align="center">
										<a href="<?php echo "suatthocsinh_canbo.php?a=".$row1['MAHS']."&malop=".$row2['MALOP']."&hocki=".$row2['HOCKI']."&namhoc=".$row2['NAMHOC']; ; ?>">
											<img src="Img/sua1.png" title="Sửa" alt="SUA" width="25" height="25"></a></td>
									<td align="center">
										<a href="javascript:xoa('<?php echo $row1['MAHS'] ?>','<?php echo $row2['MALOP'] ?>','<?php echo $row2['HOCKI'] ?>','<?php echo $row2['NAMHOC'] ?>');">
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