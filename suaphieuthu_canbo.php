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
	function xoa(a,maphi,sotien) {
		if (confirm('Bạn có chắc muốn xóa thông tin này không ?' )) {
			document.location = 'xoaphieuthu_canbo.php?a='+a+'&maphi='+maphi+'&sotien='+sotien;
			return;
		}
	}
</script>	
<script>
					function wopen(url, name, w, h){
				  w += 32;
				  h += 96;
				  wleft = (screen.width - w) / 2;
				  wtop = (screen.height - h) / 2;
				  
				  if (wleft < 0) {
					w = screen.width;
					wleft = 0;
				  }
				  if (wtop < 0) {
					h = screen.height;
					wtop = 0;
				  }
				  var win = window.open(url,
					name,
					'width=' + w + ', height=' + h + ', ' +
					'left=' + wleft + ', top=' + wtop + ', ' +
					'location=no, menubar=no, ' +
					'status=no, toolbar=no, scrollbars=yes, resizable=no');
				  // Just in case width and height are ignored
				  win.resizeTo(w, h);
				  // Just in case left and top are ignored
				  win.moveTo(wleft, wtop);
				  win.focus();
			}
			function printTL(Maphieuthu){
				wopen('Inphieuthu.php?Maphieuthu='+Maphieuthu,'','780','580');
			}
			function printTL1(Maphieuthu){
				wopen('Xuatphieuthu.php?Maphieuthu='+Maphieuthu,'','780','580');
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
			<form action="<?php echo "xuly_suaphieuthu.php?a=".$mapt."&maphi=".$maphicu."&sotien=".$sotiencu;?>" onsubmit="return phieuthu();" method="post" enctype="multipart/data-form" name="phieuthu1">
			<table>
				<tr>
					<td>
						<div id="qlphi">
							<table>
								<tr>
									<td>
										<a href="qlphi_canbo.php"><i><b>Cập nhật loại phí</b></i></a>
									</td>
									<td>
										<a href="capnhatphieuthu_canbo.php"><i><b>Cập nhật phiếu thu</b></i></a>
									</td>
									<td>
										<a href="capnhatphieuchi_canbo.php"><i><b>Cập nhật phiếu chi</b></i></a>
									</td>
								</tr>
							</table>
						</div><!--end div cap nhat-->
						<div id="capnhatphieuthu">
						<h2>CẬP NHẬT PHIẾU THU</h2>
						
							<table>
								<tr>
								<td>
								<table>
								<?php
								
									$sql = "SELECT * FROM phieuthu WHERE MAPT = '$mapt'";
									$result2 = mysql_query($sql, $con);
									$row2 = mysql_fetch_array( $result2 );
									$string= $row2['NGAYTHU'];
									$nam = substr($string, 0, 4);
									$thang = substr($string, 5,2 );
									$ngay = substr($string, 8,2); 
									$mahs = $row2['MAHS'];
									
									$sql = "SELECT * FROM thanhtien WHERE MAPT = '$mapt'";
									$result3 = mysql_query($sql, $con);
									$row3 = mysql_fetch_array( $result3 );
									$maphi = $row3['MAPHI'];
									
									$sql = "SELECT * FROM hocsinh WHERE MAHS = '$mahs'";
									$result4 = mysql_query($sql, $con);
									$row4 = mysql_fetch_array( $result4 );
									
									$sql = "SELECT * FROM loaiphi WHERE MAPHI = '$maphi'";
									$result5 = mysql_query($sql, $con);
									$row5 = mysql_fetch_array( $result5 );
								?>
								<tr>
									<td class="td"><i><b>Tên phiếu thu:</b></i></td><td> <input type="text"  value="<?php echo $row2['TENPT'] ;?>" style="width: 175px;" name="tenpt"/> </td>
								</tr>
								<tr>
									<td class="td" > <b><i>Chọn Học Sinh:</i></b> </td>
									<td> 
										<select name="hocsinh">
											<option value="<?php echo $row4['MAHS'];?>"><?php echo $row4['MAHS'];echo "-";echo $row4['HOTEN'];?></option>
											<?php 
												$sql = "SELECT * FROM hocsinh WHERE MAHS != '$row2[MAHS]'";
												$result1 = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
												while($row1 = mysql_fetch_array($result1))
												{
													$mahs = $row1['MAHS'];
													$tenhs = $row1['HOTEN'];
											?>
											<option value="<?php echo $mahs; ?>">
											<?php 
												echo $mahs;echo"-";echo $tenhs;
											?>
											</option>
											<?php
												}
											?>
										</select>
									</td>
								</tr>	
								<tr>
									<td class="td"><i><b>Chọn Ngày:</b></i></td>
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
															$now= getdate();
															$year= $now["year"];
															while($nam1<=$year)
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
								</tr>
								</table>
							</td>
							<td>
								<div id="capnhatphieuthu1">
									<table>								
										<tr>
									<td class="td" > <b><i>Chọn Loại Phí:</i></b> </td>
									<td> 
										<select name="maphi">
											<option value="<?php echo $row5['MAPHI'];?>"><?php echo $row5['MAPHI'];echo "-";echo $row5['DIENGIAI'];?></option>
											<?php 
												$sql = "SELECT * FROM loaiphi WHERE MAPHI != '$maphi'";
												$result1 = mysql_query($sql,$con) or die ('Error !!!'.mysql_error());
												while($row1 = mysql_fetch_array($result1))
												{
													$maph = $row1['MAPHI'];
													$tenph = $row1['DIENGIAI'];
											?>
											<option value="<?php echo $maph; ?>">
											<?php 
												echo $maph;echo"-";echo $tenph;
											?>
											</option>
											<?php
												}
											?>
										</select>
									</td>
								</tr>
										<tr>
											<td class="td"><i><b>Số tiền:</b></i></td><td> <input type="text"  value="<?php echo $row3['SOTIEN'] ;?>" style="width: 175px;" name="sotien"/> </td>
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
						
						</div>
						<div id="capnhatttphuhuynh2">
						<h2>DANH SÁCH PHIẾU THU</h2>
							
						
						</div>
						<div id="capnhatttphuhuynh3">
							<table>
								<tr>
									<th width="10" rowspan="2">
										STT
									</th>
									<th width="80" rowspan="2">Mã Phiếu Thu</th>
									<th width="180" rowspan="2">Tên Phiếu Thu</th>
									<th width="200" rowspan="2">Tên học sinh</th>
									<th width="180" rowspan="2">Loại phí</th>
									<th width="150" rowspan="2">Số tiền</th>
									<th width="150" rowspan="2">Ngay thu</th>
									<th colspan="2">Cập nhật</th>
									<th colspan="2">In/xuất</th>
								</tr>
								<tr>
									<th width="80">Sửa</th>
									<th width="80">Xóa</th>
									<th width="80">In</th>
									<th width="80">Xuất</th>
								</tr>
								
								<?php 
									$cnt=0;
									$sql = "SELECT * FROM phieuthu INNER JOIN hocsinh ON phieuthu.mahs = hocsinh.mahs
																	INNER JOIN thanhtien ON phieuthu.mapt = thanhtien.mapt";
									$result2 = mysql_query($sql, $con);
									while($row2 = mysql_fetch_array( $result2 ))
									{ $cnt++;
								?>
								<tr>
									<td width="10" align="center">
										<?php echo $cnt; ?>
									</td>
									<td width="80" align="center"><?php echo $row2['MAPT']; ?></td>
									<td width="180">&nbsp;<?php echo $row2['TENPT']; ?></td>
									<td width="200" align="center"><?php echo $row2['HOTEN']; ?></td>
									<td width="180" align="center"><?php 
																			$sql = "SELECT * FROM thanhtien INNER JOIN loaiphi ON thanhtien.maphi = loaiphi.maphi";
																			$result3 = mysql_query($sql, $con);
																			$row3 = mysql_fetch_array( $result3 );
																			echo $row3['DIENGIAI']; ?></td>
									<td width="150" align="center"><?php echo $row2['SOTIEN']; ?></td>
									<td width="150" align="center"><?php echo $row2['NGAYTHU']; ?></td>
									<td align="center">
										<a href="<?php echo "suaphieuthu_canbo.php?a=".$row2['MAPT']."&maphi=".$row3['MAPHI']."&sotien=".$row3['SOTIEN']; ?>">
											<img src="Img/sua1.png" title="Sửa" alt="SUA" width="25" height="25"></a></td>
									<td align="center">
										<a href="javascript:xoa('<?php echo $row2['MAPT'] ?>','<?php echo $row3['MAPHI'] ?>','<?php echo $row3['SOTIEN'] ?>');">
												<img src="Img/xoa.png" alt="XOA" title="Xóa" width="25" height="25"></a>
									</td>
									<td td align="center">
										<input type="button" name="infile" id="infile" value="In" style="text-align: center;
										width: 50px;
										height: 25px;
										background: url(Img/xanhnen2.png);
										color: white;
										font-size:15px;
										font-style: italic" 
										onclick="javascript:printTL('<?php echo $row2['MAPT']; ?>');" >
										
									</td>
									<td align="center">
										<input type="button" name="xuatfile" id="xuatfile" value="Xuất" style="text-align: center;
										width: 50px;
										height: 25px;
										background: url(Img/xanhnen2.png);
										color: white;
										font-size:15px;
										font-style: italic" 
										onclick="javascript:printTL1('<?php echo $row2['MAPT']; ?>');" >
										
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