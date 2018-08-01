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
		#content_in1{
		background: white;
		width: 500px;
		margin: 0px auto;
		}
		#content_in1 table{
		background: white;
		width: 500px;
		margin: 0px auto;
		border-collapse: collapse;
		}
		#content_in1 td{
		
		padding: 3px 0px 3px 0px;
		
		}
		#content_in1 th{
		
		padding: 3px 0px 3px 0px;
		
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
		width: 550px;
		margin: 10px 0px 10px  400px;
		padding: 0px 0px 0px 0px;
		background: white;
		text-align: center;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;

		}
		#inkhht7 table{
		width: 550px;
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
		text-align:right;
		font-size:16px;
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
		width: 1000px;
		margin: 0px 0px 0px 0px;
		padding: 0px 0px 0px 0px;
		background: white;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
		height:40px;
		}
		#xacnhan{
		width: 1000px;
		margin: 10px 0px 10px  0px;
		padding: 0px 0px 0px 0px;
		background: white;
		text-align: center;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;

		}
		#xacnhan table{
		width: 1000px;
		margin: 0px 0px 0px 0px;
		padding: 0px 4px 0px 4px;
		text-align: center;
		}
		#xacnhan td a{

		width:300px;
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
	<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>
<script src="tableToExcel.js"></script>
</head>
<body>
	<div id="content_in">
		<table>
				<tr>
					<td>
					<div id="in">
						<table>
							<tr>
								<td>									
									<img src="Img/excel.jpg" width="30" height="30" border="0" title="Xuất ra file excel" onclick="tableToExcel('testTable', 'W3C Example Table');"/>
								</td>
							</tr>
						</table>
					</div>
					<div id="content_in1">
						<table id="testTable">
							<tr>
								<th colspan="7">
									<b>TRƯỜNG TIỂU HỌC TRẦN QUỐC TOẢN</b>
								</th>
							</tr>
							
							<tr>
								<th colspan="7">
									<b>PHIẾU CHI</b>
								</th>
							</tr>
							<tr>
								<th colspan="7">
									
								</th>
							</tr>	
							<tr>
								<td width="100" colspan="3">
									<b>	Mã phiếu chi: </b>
								</td>
								<td colspan="4">
									<i><b><?php echo $mapc; ?></b></i>
								</td>
								
								
							</tr>
							<tr>
								<td colspan="3">
									<b>Tên phiếu chi: </b>
								</td>
								<td colspan="4">
									<i><b><?php echo $tenpc; ?></b></i>
								</td>
								
							</tr>
							<tr>
								<td colspan="3">
									<b>Số tiền: </b>
								</td>
								<td colspan="4">
									<i><b><?php echo $sotien; ?></b></i>
								</td>
								
							</tr>
							<tr>
								<td colspan="3">
									<b>Ngày chi: </b>
								</td>
								<td colspan="4">
									<i><b><?php echo $ngaychi; ?></b></i>
								</td>
							</tr>
							
							
							
						<tr>
							
							
							
							<th colspan="4">
								<b>Cần Thơ, Ngày......Tháng.......Năm......</b>
							</th>
							
						</tr>
						<tr>
							<th colspan="3">
								<i><b>Người lập phiếu</b></i>
							</th>
							<th>
							</th>
							<th colspan="3">
								<i><b>Người nhận</b></i>
							</th>
						</tr>
						
						<tr>
							<th colspan="3">
								
							</th>
							<th>
							</th>
							
						</tr>
					</table>
					
					
					
						
					</div>
					</td>
				</tr>
			</table>
	</div>
</body>

</html>	

			
