<?php
	include "koneksi.php";
	if(isset($_SESSION['Username'])){
	header("location:media_admin.php?module=home");}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Pembayaran Listrik Pasca Bayar</title>
		<link rel="stylesheet" href="css/style_login.css" type="text/css"/>
	</head>
	<body>
		<div class="formlogin">
		    <form action="cek_login.php" method="POST" onsubmit="return validasi(this)">
		    	<table border="0">
			        <tr>
			        	<td>User Name</td>
			        	<td>
			        		<input type="text" name="inputusername">
			        	</td>
			    	</tr>
			    	<tr>
			       		<td>Password</td>
			        	<td>
			        		<input type="password" name="inputpassword">
			        	</td>
			        </tr>
			        <tr>
			        	<td></td>
			        	<td>
			        		<input type="submit" value="Login" name="login">
			        	</td>
			        	<td></td>
		        	</tr>
		    	</table>
		    </form>
		</div>
	</body>
	<script type="text/javascript">
		function validasi(form){
			if(form.inputusername.value == ""){
				alert("Anda belum mengisikan Username");
				form.inputusername.focus();
				return false;
			}
			if(form.inputpassword.value == ""){
				alert("Anda belum mengisikan Password.");
				form.inputpassword.focus();
				return false;
			}
			return true;
		}
	</script>
</html>