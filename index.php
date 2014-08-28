<?php
	header("Content-Type:text/html; charset=utf-8");
@	$stringQRCODE = $_POST['qrcode'];
	$ethIP = "192.168.111.1";
?>

<form name="form1" method="post" action="getQR.php">
	<label>請輸入 QRCode:</label>
	<input name="qrcode" type="text" value="" />
	<input name="Submit" type="submit" value="產生" />
</form>

<?php

if ($stringQRCODE) {
	require 'phpqrcode/qrlib.php';
	
	$filename = "temp/" . md5($stringQRCODE) . ".png";
	QRcode::png($stringQRCODE, $filename, 'H', 8, 1);
	
	echo "<p><img src='$filename' /></p>";
	echo "<p>http://$ethIP/qrcode/$filename</p>";
}

?>
