<?php
	if(!isset($_SESSION['Username'])){
		echo '
		<script language="javascript">
			alert("Anda harus Login!");
			document.location="../index.php";
		</script>';
	}
?>