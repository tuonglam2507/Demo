<?php
session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	$kytu= $_POST['tim'];
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
			document.location = 'xoattcanbo_canbo.php?a='+a;
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
				<li><a href="dscanbo.php">Danh sách cán bộ</a>
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
			<form action="xuly_capnhatttcanbo.php" onsubmit="return canbo();" method="post" enctype="multipart/data-form" name="canbo1">
			<table>
				<tr>
					<td>
						<div id="qlgiangday">
							<table>
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
							
						</div><!--end div cap nhat-->
						<div id="capnhattphuhuynh">
						<h2>CẬP NHẬT THÔNG TIN CÁN BỘ</h2>
						
							<table>
								<tr>
								<td>
								<table>
								
								<tr>
									<td class="td"><i><b>Họ và tên:</b></i></td><td> <input type="text"  style="width: 175px;" name="username"/> </td>
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
															$nam=1920;
															while($nam<=1991)
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
								<tr>
												<td class="td" > <b><i>Chức vụ:</i></b> </td>
												<td> 
													<select name="chucvu">
														<option value="Chức vụ">Chức vụ</option>
														<option value="Cán bộ">Cán bộ</option>		
														<option value="GVCN">GVCN</option>														
														<option value="Bảo mẫu">Bảo mẫu</option>
													</select>
												</td>
								</tr>
								</table>
							</td>
							<td>
								<div id="capnhattphuhuynh1">
									<table>								
										<tr>
											<td class="td"><i><b>Địa chỉ:</b></i> </td> 
											<td><textarea rows="4" cols="30" name="diachi" ></textarea></td>
										</tr>
										<tr>
											<td class="td"><i><b>SDT:</b></i></td><td> <input type="text"  style="width: 175px;" name="sdt"/> </td>
										</tr>										
									</table>
								</div>
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
						<form action="timkiemttcanbo.php"   method="post" enctype="multipart/data-form" name="timkiem_ttcanbo">
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
						<h2>DANH SÁCH PHỤ HUYNH</h2>
						</div>
						
						<div id="capnhatttphuhuynh3">
							<table>
								<tr>
									<th width="10" rowspan="2">
										STT
									</th>
									<th width="80" rowspan="2">Mã PH</th>
									<th width="200" rowspan="2">Họ và tên</th>
									<th width="150" rowspan="2">Ngày sinh</th>
									<th rowspan="2">Giới tính</th>
									<th rowspan="2">Chức Vụ</th>
									<th width="300" rowspan="2">Địa chỉ</th>
									
									<th width="100" rowspan="2">SĐT</th>
									<th colspan="2" width="100">Cập nhật</th>
								</tr>
								<tr>
									<th width="80">Sửa</th>
									<th width="80">Xóa</th>
								</tr>
								
								<?php 
									$cnt=0;
									$sql = "SELECT * FROM canbo WHERE MACB like '%$kytu%' OR HOTEN  like '%$kytu%' OR GIOITINH_CB like '%$kytu%' OR CHUCVU like '%$kytu%' OR DIACHI like '%$kytu%' OR SDT like '%$kytu%'";
									$result1 = mysql_query($sql, $con);
									if($row1 = mysql_fetch_array( $result1 )){
									$sql = "SELECT * FROM canbo WHERE MACB like '%$kytu%' OR HOTEN  like '%$kytu%' OR GIOITINH_CB like '%$kytu%' OR CHUCVU like '%$kytu%' OR DIACHI like '%$kytu%' OR SDT like '%$kytu%'";
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
									<td width="80" align="center"><?php echo $row1['CHUCVU']; ?></td>
									<td width="250" >&nbsp;<?php echo $row1['DIACHI']; ?></td>
									
									<td width="150">&nbsp;<?php echo $row1['SDT']; ?></td>
									<td align="center">
										<a href="<?php echo "suattcanbo_canbo.php?a=".$row1['MACB']; ?>">
											<img src="Img/sua1.png" title="Sửa" alt="SUA" width="25" height="25"></a></td>
									<td align="center">
										<a href="javascript:xoa('<?php echo $row1['MACB'] ?>');">
												<img src="Img/xoa.png" alt="XOA" title="Xóa" width="25" height="25"></a>
									</td>
								</tr>
								<?php
										}
									}else{
									$sql = "SELECT NGAYSINH FROM canbo WHERE NGAYSINH like '%$kytu%'";
									$result1 = mysql_query($sql, $con);
									while($row1 = mysql_fetch_array( $result1 ))
									{ 
											$ngaysinh = $row1['NGAYSINH'];
											 $sql = "SELECT * FROM canbo WHERE NGAYSINH = '$ngaysinh'";
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
									<td width="80" align="center"><?php echo $row1['CHUCVU']; ?></td>
									<td width="250" >&nbsp;<?php echo $row1['DIACHI']; ?></td>
									
									<td width="150">&nbsp;<?php echo $row1['SDT']; ?></td>
									<td align="center">
										<a href="<?php echo "suattcanbo_canbo.php?a=".$row1['MACB']; ?>">
											<img src="Img/sua1.png" title="Sửa" alt="SUA" width="25" height="25"></a></td>
									<td align="center">
										<a href="javascript:xoa('<?php echo $row1['MACB'] ?>');">
												<img src="Img/xoa.png" alt="XOA" title="Xóa" width="25" height="25"></a>
									</td>
								</tr>
								<?php
											}
										}
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