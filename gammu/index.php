<?php

// jumlah maksimum modem yg bisa diset
$maxmodem = 8;

error_reporting(E_COMPILE_ERROR|E_RECOVERABLE_ERROR|E_ERROR|E_CORE_ERROR);
include 'function.php';
?>

<html>
<head>
	<style type="text/css"> 
	
	h1 {
		font-family: Verdana;
	}
	
	body {
		font-family: Verdana;
		font-size: 12px;
	}	
	
	</style> 
</head>
<body>

<?php
include 'header.php';
?>

<?php

for($i=1; $i<=$maxmodem; $i++)
{
	if (is_file('smsdrc'.$i))
	{
		exec("gammu-smsd -n ".getParam('id', $i)." -k");
	}	
}

?>

</body>
</html>
