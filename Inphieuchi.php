<?php
session_start();
	include('connect.php');
	if ( !isset($_SESSION['USERNAME']) )
	header("location: Index.php");
	$sql = "SELECT * FROM canbo WHERE MACB='$_SESSION[USERNAME]'
					AND PASS='$_SESSION[PASSWORD]'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	$mapc = $_GET['Maphieuchi'];
	$sql = "SELECT * FROM phieuchi WHERE MAPC = '$mapc'";
	$result = mysql_query($sql, $con);
	$row = mysql_fetch_array( $result );
	$tenpc= $row['TENPC'];
	$matp = $row['MATP'];
	$sotien = $row['SOTIEN'];
	$ngaychi = $row['NGAYCHI'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Website Quản Lý Bán Trú</title>
    <meta http-equiv="Content-Language" content="English" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<style type="text/css">
		body{
		background: white;
		}
		#content_in{
		background: white;
		width: 1000px;
		margin: 0px auto;
		}
		#inkhht4{
		width: 1000px;
		padding: 0px 0px 0px 0px;
		background: white;
		text-align: center;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
		height:32px;
		}
		#inkhht4 table{
		width: 1000px;
		height:30px;
		margin: 0px 0px 0px 0px;
		padding: 0px 4px 0px 4px;
		text-align: center;
		}
		#inkhht4 td a{
		color:black;
		font-family:"Verdana",Sans-serif;
		text-decoration: none;
		font-size:18px;
		}
		#inkhht{
		width: 1000px;
		margin: 0px 0px 10px 0px;
		padding: 0px 0px 0px 0px;
		background: white;
		text-align: center;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
		height:32px;
		}
		#inkhht table{
		width: 1000px;
		height:30px;
		margin: 0px 0px 0px 0px;
		padding: 0px 4px 0px 4px;
		text-align: center;
		}
		#inkhht td a{
		color:black;
		font-family:"Verdana",Sans-serif;
		text-decoration: none;
		font-size:17px;
		}
		#inkhht7{
		width: 300px;
		margin: 40px 0px 10px  360px;
		padding: 0px 0px 0px 0px;
		background: white;
		text-align: center;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;

		}
		#inkhht7 table{
		width: 300px;
		height:30px;
		margin: 0px 0px 0px 0px;
		padding: 0px 4px 0px 4px;
		text-align: center;
		}
		#inkhht7 td a{
		color:black;
		font-family:"Verdana",Sans-serif;
		text-decoration: none;
		font-size:17px;
		}
		#inkhht7 td{
		margin: 0px 0px 0px 0px;
		padding: 0px 4px 0px 4px;
		text-align:left;
		font-size:18px;
		}
		#inkhht5{
		width: 1000px;
		margin: 0px 0px 10px 0px;
		padding: 0px 0px 0px 0px;
		background: white;
		text-align: center;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
		height:32px;
		}
		#inkhht5 table{
		width: 1000px;
		height:30px;
		margin: 0px 0px 0px 0px;
		padding: 0px 4px 0px 4px;
		text-align: center;
		}
		#inkhht5 td a{
		color:black;
		font-family:"Verdana",Sans-serif;
		text-decoration: none;
		font-size:17px;
		}
		#inkhht1{
		width: 1000px;
		margin: 0px 0px 10px 0px;
		padding: 0px 0px 0px 0px;
		background: white;
		text-align: center;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
		}
		#inkhht1 table{
		width: 1000px;
		margin: 0px 0px 0px 0px;
		padding: 0px 4px 0px 4px;
		border:1px solid black;
		border-collapse: collapse;
		}
		#inkhht1 td a{
		color:black;
		font-family:"Verdana",Sans-serif;
		text-decoration: none;
		font-size:17px;
		}
		#inkhht1 td{
		border:1px solid black;
		font-size:17px;
		padding: 3px 0px 3px 0px;
		}
		#inkhht1 th{
		border:1px solid black;
		font-size:18px;
		padding: 3px 0px 3px 0px;
		}
		#tong{
		width: 1000px;
		margin: 0px 0px 10px 0px;
		padding: 0px 0px 0px 0px;
		background: white;
		text-align: left;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
		}
		#tong table{
		width: 1000px;
		margin: 0px 0px 0px 0px;
		padding: 0px 4px 0px 4px;
		border-collapse: collapse;
		}
		#tong td{
		font-size:17px;
		padding: 3px 0px 3px 0px;
		}
		#ruler{
		width: 1000px;
		margin: 10px 0px 10px 0px;
		padding: 0px 0px 0px 0px;
		}
		#ruler table{
		width: 1000px;
		margin: 0px 0px 0px 0px;
		}
		#ruler td{
		font-size:17px;
		padding: 0px 0px 0px 0px;
		text-align: center;
		}
		#in {
		width: 1000px;
		margin: 0px 0px 0px 0px;
		padding: 0px 0px 0px 0px;
		background: white;
		text-align: right;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
		}
		#in table{
		width: 1000px;
		margin: 0px 0px 0px 0px;
		padding: 0px 4px 0px 4px;
		text-align: right;
		}
		
		#xacnhan{
		width: 400px;
		margin: 10px 0px 10px  0px;
		padding: 0px 0px 0px 0px;
		background: white;
		text-align: center;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;

		}
		#xacnhan table{
		width: 400px;
		margin: 20px 0px 0px 200px;
		padding: 0px 4px 0px 4px;
		text-align: center;
		}
		#xacnhan td a{

		width:200px;
		color:black;
		font-family:"Verdana",Sans-serif;
		text-decoration: none;
		font-size:17px;
		}
		#xacnhan td{
		margin: 0px 0px 0px 0px;
		padding: 0px 4px 0px 4px;
		text-align:center;
		font-size:17px;
		}
    </style>
	
<script src="tableToExcel.js"></script>
</head>
<body>
	<div id="content_in">
				<tr>
					<td>
					<div id="in">
						<table>
							<tr>
								<td>
									<a href="#" ><img src="Img/print2.png" width="40" height="40" border="0" title="In trang ke hoach hoc tap cua sinh vien" onclick="javascript:window.print();"/></a>
								</td>
							</tr>
						</table>
					</div>
					<div id="inkhht4">
						<table>
							<tr>
								<td>
									<a href="#"><b>TRƯỜNG TIỂU HỌC TRẦN QUỐC TOẢN</b></a>
								</td>
							</tr>
						</table>
					</div>
					<div id="inkhht">
						<table>
							<tr>
								<td>
									<a href="#"><b>PHIẾU CHI</b></a>
								</td>
							</tr>
						</table>
					</div>
					<div id="inkhht7">
						<table>
							<tr>
								
								<td>
									<b>	Mã phiếu chi: </b>
								</td>
								<td>
									<i><b><?php echo $mapc; ?></b></i>
								</td>
								
								
							</tr>
							<tr>
								
								<td>
									<b>Tên phiếu chi: </b>
								</td>
								<td>
									<i><b><?php echo $tenpc; ?></b></i>
								</td>
								
							</tr>
							<tr>
								
								<td>
									<b>Số tiền: </b>
								</td>
								<td>
									<i><b><?php echo $sotien; ?></b></i>
								</td>
								
							</tr>
							<tr>
								<td colspan="2">
								</td>
								<td>
									<b>Ngày chi: </b>
								</td>
								<td>
									<i><b><?php echo $ngaychi; ?></b></i>
								</td>
							</tr>
						</table>
					</div>
							
					
					
					
					<div id="xacnhan">
						<table>
						<tr>
							
							<td>
								<b>Cần Thơ, Ngày......Tháng.......Năm......</b>
							</td>
						</tr>
						<tr>
							<td >
								<i><b>Người lập phiếu</b></i>
							</td>
							<td>
								<i><b>Người nhận</b></i>
							</td>
						</tr>
						<tr>
							<td height="50">
								
							</td>
							<td  height="50">
								
							</td>
						</tr>
						<tr>
							<td >
								
							</td>
							
						</tr>
						</table>
					</div>
	
					</td>
				</tr>
			</table>
	</div>
</body>
</html>	
			
