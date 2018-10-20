<a href="input.php"><input type="button" name="input" value="INPUT"></a>
<?php
include('koneksi.php');
$sql = mysqli_query($conn, "SELECT * FROM data");
	echo "<form method='post' action=''>";
	echo "<table border='1'>";
		foreach ($sql as $row) {
			echo "<tr>";
				echo "<td>".$row['nim']."</td>";
				echo "<td>".$row['nama']."</td>";
				echo "<td>".$row['prodi']."</td>";
				echo "<td><a href='detail.php?nim=".$row['nim']."'>Hapus</a></td>";
				echo "<td><a href='edit.php?nim=".$row['nim']."'>Edit</a></td>";
			echo "</tr>";
		}
	echo "</table>";
	echo "<br>
		  <input type='text' name='cari_nim' placeholder='Cari...'>";
	echo "<input type='submit' name='cari' value='Cari'>";
	if (isset($_POST['cari_nim'])) {
		session_start();
		$_SESSION['cari_nim'] = $_POST['cari_nim'];
		header("Location:detail2.php");
	}
	echo "</form>";

?>
