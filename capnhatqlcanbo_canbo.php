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
			document.location = 'xoaqlcanbo_canbo.php?a='+a+'&malop='+malop+'&hocki='+hocki+'&namhoc='+namhoc;
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
			<form action="xuly_capnhatqlcanbo.php" onsubmit="return qlcanbo();" method="post" enctype="multipart/data-form" name="qlcanbo1">
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
						<div id="capnhatqlcanbo">
						<h2>CẬP NHẬT CÁN BỘ QUẢN LÝ</h2>
						
							<table>
								<tr>
								<td>
								<table>
								<tr>
												<td class="td" > <b><i>Cán Bộ:</i></b> </td>
												<td> 
													<select name="canbo">
														<option value="Chọn CB">Cán Bộ</option>
														<?php 
															$sql = "SELECT * FROM canbo WHERE CHUCVU != 'Quản lý'";
															echo $sql;
															$result1  = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
															while($row1 = mysql_fetch_array($result1))
															{
																$macb = $row1['MACB'];
																$tencb = $row1['HOTEN'];
														?>
														<option value="<?php echo $macb; ?>">
														<?php 
															echo $macb; echo "-"; echo $tencb;
														?>
														</option>
														<?php
															}
														?>
													</select>
												</td>
											</tr>
								
								<tr>
									<td class="td"><i><b>Năm học:</b></i></td>
									<td> 
													<select name="nam">
														<option value="Chọn NH">Năm Học</option>
														<?php 
															$sql = "SELECT * FROM namhoc";
															//echo $sql;
															$result2  = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
															while($row2 = mysql_fetch_array($result2))
															{
																$namhoc = $row2['NAMHOC'];
																
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
								</table>
							</td>
							<td>
								<div id="capnhattphuhuynh1">
									<table>								
										<tr>
												<td class="td" > <b><i>Học Kì:</i></b> </td>
												<td> 
													<select name="hocky">
														<option value="Chọn HK">Học Kì</option>
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
						
						</div>
						<div id="capnhatttphuhuynh2">
						<h2>DANH SÁCH BẢO MẪU</h2>
							
						
						</div>
						<div id="capnhatttphuhuynh3">
							<table>
								<tr>
									<th width="10" rowspan="2">
										STT
									</th>
									<th width="80" rowspan="2">Mã CB</th>
									<th width="200" rowspan="2">Họ và tên</th>
									<th width="100" rowspan="2">Chức Vụ</th>
									<th width="80" rowspan="2">Học Kỳ</th>									
									<th width="80" rowspan="2">Năm Học</th>
									<th width="80" rowspan="2">Lớp</th>
									<th colspan="2" width="100">Cập nhật</th>
								</tr>
								<tr>
									<th width="80">Sửa</th>
									<th width="80">Xóa</th>
								</tr>
								
								<?php 
									$cnt=0;
									$sql = "SELECT * FROM baomau";
									$result1 = mysql_query($sql, $con);
									while($row1 = mysql_fetch_array( $result1 ))
									{ $cnt++;
								?>
								<tr>
									<td width="10" align="center">
										<?php echo $cnt; ?>
									</td>
									<td width="80" align="center"><?php echo $row1['MACB']; ?></td>
									<td width="200">&nbsp;<?php
										$sql = "SELECT * FROM canbo WHERE MACB = '$row1[MACB]'";
										$result4 = mysql_query($sql, $con);
										$row4 = mysql_fetch_array( $result4 );
										echo $row4['HOTEN']; 
									?></td>
									<td width="100" align="center"><?php echo $row4['CHUCVU']; ?></td>
									<td width="80" align="center"><?php echo $row1['HOCKI']; ?></td>
									<td width="80" align="center"><?php echo $row1['NAMHOC']; ?></td>
									<td width="80" align="center"><?php echo $row1['MALOP']; ?></td>
									<td align="center">
										<a href="<?php echo "suaqlcanbo_canbo.php?a=".$row1['MACB'];?>">
											<img src="Img/sua1.png" title="Sửa" alt="SUA" width="25" height="25"></a></td>
									<td align="center">
										<a href="javascript:xoa('<?php echo $row1['MACB'] ?>','<?php echo $row1['MALOP'] ?>','<?php echo $row1['HOCKI'] ?>','<?php echo $row1['NAMHOC'] ?>');">
												<img src="Img/xoa.png" alt="XOA" title="Xóa" width="25" height="25"></a>
									</td>
								</tr>
								<?php
									}
								?>
							</table>
						</div>
						<div id="capnhatttphuhuynh2">
						<h2>DANH SÁCH GVCN</h2>
							
						
						</div>
						<div id="capnhatttphuhuynh3">
							<table>
								<tr>
									<th width="10" rowspan="2">
										STT
									</th>
									<th width="80" rowspan="2">Mã CB</th>
									<th width="200" rowspan="2">Họ và tên</th>
									<th width="100" rowspan="2">Chức Vụ</th>
									<th width="80" rowspan="2">Học Kỳ</th>									
									<th width="80" rowspan="2">Năm Học</th>
									<th width="80" rowspan="2">Lớp</th>
									<th colspan="2" width="100">Cập nhật</th>
								</tr>
								<tr>
									<th width="80">Sửa</th>
									<th width="80">Xóa</th>
								</tr>
								
								<?php 
									$cnt=0;
									$sql = "SELECT * FROM chunhiem";
									$result2 = mysql_query($sql, $con);
									while($row2 = mysql_fetch_array( $result2 ))
									{ $cnt++;
								?>
								<tr>
									<td width="10" align="center">
										<?php echo $cnt; ?>
									</td>
									<td width="80" align="center"><?php echo $row2['MACB']; ?></td>
									<td width="200">&nbsp;<?php 
										$sql = "SELECT * FROM canbo WHERE MACB = '$row2[MACB]'";
										$result3 = mysql_query($sql, $con);
										$row3 = mysql_fetch_array( $result3 );
										echo $row3['HOTEN']; 
									?></td>
									<td width="100" align="center"><?php echo $row3['CHUCVU']; ?></td>
									<td width="80" align="center"><?php echo $row2['HOCKI']; ?></td>
									<td width="80" align="center"><?php echo $row2['NAMHOC']; ?></td>
									<td width="80" align="center"><?php echo $row2['MALOP']; ?></td>
									<td align="center">
										<a href="<?php echo "suaqlcanbo_canbo.php?a=".$row2['MACB']; ?>">
											<img src="Img/sua1.png" title="Sửa" alt="SUA" width="25" height="25"></a></td>
									<td align="center">
										<a href="javascript:xoa('<?php echo $row2['MACB'] ?>','<?php echo $row2['MALOP'] ?>','<?php echo $row2['HOCKI'] ?>','<?php echo $row2['NAMHOC'] ?>');">
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