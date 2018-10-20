<?php
	session_start();
	$nim = $_SESSION['cari_nim'];
include('koneksi.php');
$sql = mysqli_query($conn, "SELECT * FROM data WHERE nim LIKE '%$nim%'");
echo "<table border='1'>";
		foreach ($sql as $row) {
			echo "<tr>";
				echo "<td>".$row['nim']."</td>";
				echo "<td>".$row['nama']."</td>";
				echo "<td>".$row['prodi']."</td>";
				echo "<td><a href='detail.php?nim=".$row['nim']."'>Hapus</a></td>";
			echo "</tr>";
		}
	echo "</table>";
session_destroy();
?>
<br>
<a href="view.php">Balik</a>