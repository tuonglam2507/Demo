<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Website Quản Lý Bán Trú</title>
    <meta http-equiv="Content-Language" content="English" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	<script src="java.js" type="text/javascript"></script>
</head>
<body>
	<div id="wrap">
		<div id="title">
		</div> <!--end div title-->
		<div id="menu">
			<ul>
				<li><a href="Index.php">Trang chủ</a></li>
				<li><a href="lichbantru.php">Lịch bán trú</a>				
				</li>
				<li><a href="dscanbo.php">Danh sách cán bộ</a>
				</li>
				<li><a href="lienhe.php">Liên hệ</a>
				</li>
				
			<ul>
		</div> <!--end div menu-->
		<div id="content">
			<form action="login.php" onsubmit="return loginForm();" method="post" enctype="multipart/data-form" name="formlogin">
			<div id="login">

						<h2>Đăng nhập</h2>
							
								<div id="login1">
										<table>
											<tr>
												<td class="td"><i><b>Tên đăng nhập:</b></i></td>
											</tr>
											<tr>	
												<td> <input type="text"  style="width: 175px;" name="username"/> </td>
											</tr>
											<tr>
												<td class="td" > <b><i> Mật khẩu:</i></b> </td>
											</tr>
											<tr>	
												<td> <input type="password" style="width: 175px;" name="password"/> </td>
											</tr>
											<tr>
												<td>
													&nbsp;<input type="submit" name="submit" style="text-align: center;
															width: 90px;
															height: 28px;
															background: url(Img/xanhnen2.png);
															color: white;
															font-size: 15px;
															font-style: italic"  value="Đăng nhập"/>
														&nbsp;&nbsp;<input type="reset"  name="reset"  style="text-align: center;
															width: 80px;
															height: 28px;
															font-size: 15px;
															background: url(Img/xanhnen2.png);
															color: white;
															font-style: italic" value="Làm lại"/>
												</td>
											</tr>
										</table>
										
										
									</div><!--end divlogin1-->
							
			</div><!--end divlogin-->
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