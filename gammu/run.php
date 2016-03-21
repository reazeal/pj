<?php

include 'koneksi.php';

// menampilkan semua sms di inbox
if($_GET['x']=='terima') {
	$query = "SELECT * FROM inbox ORDER BY ReceivingDateTime DESC";
	$hasil= mysqli_query($mysqli,$query);

	echo "<table border='1'>";
	echo "<tr><th>Pesan SMS</th><th>Pengirim</th><th>Waktu</th><th>Modem</th></tr>";		
	while ($data = mysqli_fetch_array($hasil,MYSQLI_ASSOC))
	{
		$nohp = $data['SenderNumber'];
		$modem = $data['RecipientID']; 
		$time = $data['ReceivingDateTime'];
		$text = $data['TextDecoded'];
		echo "<tr><td>".$text."</td><td>".$nohp."</td><td>".$time."</td><td>".$modem."</td></tr>";
	}	
	echo "</table>";
}
else {

	
	// menampilkan semua sms di sentitems

	$query = "SELECT * FROM sentitems ORDER BY SendingDateTime DESC";
	$hasil= mysqli_query($mysqli,$query);

	echo "<table border='1'>";
	echo "<tr><th>Pesan SMS</th><th>Tujuan</th><th>Waktu</th><th>Modem</th></tr>";		
	while ($data =mysqli_fetch_array($hasil,MYSQLI_ASSOC))
	{
		$nohp = $data['DestinationNumber'];
		$modem = $data['SenderID']; 
		$time = $data['SendingDateTime'];
		$text = $data['TextDecoded'];
		echo "<tr><td>".$text."</td><td>".$nohp."</td><td>".$time."</td><td>".$modem."</td></tr>";
	}	
	echo "</table>";
}
?>