<?php
session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	$macb = $_GET['a'];

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
			<form action="<?php echo "xuly_suattcanbo.php?a=".$macb; ?>" onsubmit="return canbo();" method="post" enctype="multipart/data-form" name="canbo">
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
							
						</div><!--end div qlgiangday-->
						<div id="capnhattphuhuynh">
						<h2>CẬP NHẬT THÔNG TIN CÁN BỘ</h2>
						
							<table>
								<tr>
								<td>
								<table>
								<?php
								
									$sql = "SELECT * FROM canbo WHERE MACB = '$macb'";
									$result2 = mysql_query($sql, $con);
									$row2 = mysql_fetch_array( $result2 );
									$string= $row2['NGAYSINH'];
									//echo $string;
									$nam = substr($string, 0, 4);
									//echo $nam;
									$thang = substr($string, 5,2 );
									//echo $thang;
									$ngay = substr($string, 8,2); 
									//echo $ngay;
									$gioitinh= $row2['GIOITINH_CB'];
									//echo $gioitinh;
								?>
								<tr>
									<td class="td"><i><b>Họ và tên:</b></i></td><td> <input type="text"  value="<?php echo $row2['HOTEN'] ;?>" style="width: 175px;" name="username"/> </td>
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
															$nam1=1920;
															while($nam1<=1991)
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
									if($row2['GIOITINH_CB']=='Nam'){
									?>
									<input type='radio' name='sex' value='Nam' checked='checked'/>Nam
									<?php
									}
									else
									{?>
									<input type='radio' name='sex' value='Nam'/>Nam
									<?php
									}
									if($row2['GIOITINH_CB']=='Nữ')
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
									if($row2['GIOITINH_CB']=='Khác') 
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
								<tr>
												<td > <b><i>Chức Vụ:</i></b> </td>
												<td> 
													<select name="chucvu">
														<option value="<?php echo $row2['CHUCVU'];?>"><?php echo $row2['CHUCVU'];?></option>
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
										<td><textarea rows="4" cols="30" name="diachi" ><?php echo $row2['DIACHI']?></textarea></td>
								</tr>
									<tr>
									<td class="td"><i><b>SDT:</b></i></td><td> <input type="text"  style="width: 175px;" name="sdt" value="<?php echo $row2['SDT']?>"/> </td>
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
						</div><!--end div capnhattphuhuynh-->
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