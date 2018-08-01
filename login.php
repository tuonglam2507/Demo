
<?php 
	session_start();
	include('connect.php');
	if ( $_POST['submit'] ) {
			$username = $_POST['username'];
			$password = $_POST['password'];

		$sql = "SELECT * FROM canbo WHERE MACB='$username'
						AND PASS='$password'";
		$result = mysql_query($sql, $con);
		$numrows = mysql_num_rows( $result );
		if ($numrows == 1)
		{
					
			$_SESSION['USERNAME'] = $username;
			$_SESSION['PASSWORD'] = $password;
			
			header("location: trangchucanbo.php");
		
		}
		else 
		{
		echo"
			<script>alert(\"Bạn đã nhập sai mã số cán bộ hoặc mật khẩu!\");
					location.href = \"Index.php\";</script>
		";
		}
	}
	else {
		echo "error !!!";
		
		 }
		 
		
?>