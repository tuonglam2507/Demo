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
			<form action="<?php echo "xuly_suatthocsinh.php?a=".$mahs."&malop=".$malopcu."&hocki=".$hockicu."&namhoc=".$namhoccu; ?>" onsubmit="return hocsinh();" method="post" enctype="multipart/data-form" name="hocsinh">
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
						<div id="capnhatthocsinh">
						<h2>CẬP NHẬT THÔNG TIN HỌC SINH</h2>
						
							<table>
								<tr>
								<td>
								<table>
								<?php
								
									$sql = "SELECT * FROM hocsinh WHERE MAHS = '$mahs'";
									$result2 = mysql_query($sql, $con);
									$row2 = mysql_fetch_array( $result2 );
									$string= $row2['NGAYSINH'];
									$nam = substr($string, 0, 4);
									$thang = substr($string, 5,2 );
									$ngay = substr($string, 8,2); 
									$gioitinh= $row2['GIOITINH'];
									
									$sql = "SELECT * FROM hoc WHERE MAHS = '$mahs'";
									$result3 = mysql_query($sql, $con);
									$row3 = mysql_fetch_array( $result3 );
								?>
								<tr>
									<td class="td"><i><b>Họ và tên:</b></i></td><td> <input type="text"  value="<?php echo $row2['HOTEN'] ;?>" style="width: 175px;" name="hoten"/> </td>
								</tr>
								<tr>
									<td class="td"><i><b>Ngày sinh:</b></i></td>
									<td>
													<select name="ngay">
														<option value="<?php echo $ngay;?>"><?php echo $ngay?></option>
														<?php
															$ngay1=0;
															while($ngay1<=30)
															{ $ngay1++;
															if($ngay1 <=9) $ngay1 = "0".$ngay1;
																else $ngay1 = $ngay1;
															if($ngay1 != $ngay){
														?>
															<option value="<?php echo $ngay1; ?>"><?php echo $ngay1; ?></option>
														<?php
														 }
														 }
														?>
													</select>
								
									
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select name="thang">
														<option value="<?php echo $thang;?>"><?php echo $thang;?></option>
														<?php
															$thang1=0;
															while($thang1<=11)
															{ $thang1++;
																if($thang1 <=9) $thang1 = "0".$thang1;
																else $thang1 = $thang1;
																if($thang1 != $thang){
														?>
															<option value="<?php echo $thang1; ?>"><?php echo $thang1; ?></option>
														<?php
														 }
														 }
														?>
													</select>
											
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="nam">
														<option value="<?php echo $nam; ?>"><?php echo $nam; ?></option>
														<?php
															$nam1=2000;
															while($nam1<=2007)
															{ $nam1++;
															if($nam1 != $nam){
														?>
															<option value="<?php echo $nam1; ?>"><?php echo $nam1; ?></option>
														<?php
														 }
														 }
														?>
													</select>
									</td>
									<td>
										
									</td>
								</tr>			
								<tr>
									<td class='td'><i><b>Giới tính:</b></i></td>
									<td>
									<?php 
									if($row2['GIOITINH']=='Nam'){
									?>
									<input type='radio' name='sex' value='Nam' checked='checked'/>Nam
									<?php
									}
									else
									{?>
									<input type='radio' name='sex' value='Nam'/>Nam
									<?php
									}
									if($row2['GIOITINH']=='Nữ')
									{?>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='sex' value='Nữ' checked='checked'/>Nữ
									<?php
									}
									else
									{
									?>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='sex' value='Nữ'/>Nữ
									<?php
									}
									if($row2['GIOITINH']=='Khác') 
									{
									?>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='sex' value='Khác' checked='checked'/>Khác
									<?php
									}
									else
									{
									?>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='sex' value='Khác'/>Khác
									<?php
									}
									?>
									</td>
								</tr>
								</table>
							</td>
							<td>
							<div id="capnhattphuhuynh1">
							<table>
								<tr>
									<td > <b><i>Lớp:</i></b> </td>
									<td> 
										<select name="lop">
											<option value="<?php echo $row3['MALOP'];?>"><?php echo $row3['MALOP'];?></option>
											<?php 
												$sql = "SELECT * FROM lop WHERE MALOP != '$row3[MALOP]'";
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
										<td > <b><i>Phụ huynh:</i></b> </td>
									<td> 
									<?php 
												$sql = "SELECT * FROM phuhuynh WHERE MAPH = '$row2[MAPH]'";
												$result4  = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
												$row4 = mysql_fetch_array($result4);
												$tenph = $row4['TENPH'];
									?>
										<select name="phuhuynh">
											<option value="<?php echo $row2['MAPH'];?>"><?php echo $row2['MAPH'];echo "-"; echo $tenph?></option>
											<?php 
												$sql = "SELECT * FROM phuhuynh WHERE MAPH != '$row2[MAPH]'";
												$result  = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
												while($row = mysql_fetch_array($result))
												{
													$maph1 = $row['MAPH'];
													$tenph1 = $row['TENPH'];
											?>
											<option value="<?php echo $maph1; ?>">
											<?php 
												echo $maph1; echo "-"; echo $tenph1;
											?>
											</option>
											<?php
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td > <b><i>Năm học:</i></b> </td>
									<td> 
										<select name="namhoc">
											<option value="<?php echo $row3['NAMHOC'];?>"><?php echo $row3['NAMHOC'];?></option>
											<?php 
												$sql = "SELECT * FROM namhoc WHERE NAMHOC != '$row3[NAMHOC]'";
												$result  = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
												while($row = mysql_fetch_array($result))
												{
													$namhoc = $row['NAMHOC'];				
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
									<td > <b><i>Học Kì:</i></b> </td>
									<td> 
										<select name="hocki">
											<option value="<?php echo $row3['HOCKI'];?>"><?php echo $row3['HOCKI'];?></option>
											<?php 
												$sql = "SELECT * FROM hocki WHERE HOCKI != '$row3[HOCKI]'";
												$result  = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
												while($row = mysql_fetch_array($result))
												{
													$hocki = $row['HOCKI'];				
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
								</div>
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
										<a href="<?php echo "suatthocsinh_canbo.php?a=".$row1['MAHS']."&malop=".$row2['MALOP']."&hocki=".$row2['HOCKI']."&namhoc=".$row2['NAMHOC']; ?>">
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