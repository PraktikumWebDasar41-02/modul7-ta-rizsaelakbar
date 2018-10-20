<?php
$x = $_GET['nim'];
include('koneksi.php');
$sql = mysqli_query($conn, "SELECT * FROM data WHERE nim='$x'");
$data = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Input</title>
</head>
<body>
<form method="post" action="">
	<input type="text" name="nama" placeholder="Nama" value="<?php echo $data['nama']; ?>"><br>
	<!-- <input type="text" name="nim" placeholder="NIM" ><br> -->
	<input type="date" name="lahir"><br>
	Jenis Kelamin :<br>
	<select name="jk">
		<option value="Pria" <?php if ($data['jk'] == 'Pria') {echo "selected";} ?>>Pria</option>
		<option value="Wanita" <?php if ($data['jk'] == 'Wanita') {echo "selected";} ?>>Wanita</option>
	</select><br>
	Prodi :<br>
	<select name="prodi">
		<option value="D3MI"  <?php if ($data['prodi'] == 'D3MI') {echo "selected";} ?>>D3MI</option>
		<option value="D3TK"  <?php if ($data['prodi'] == 'D3TK') {echo "selected";} ?>>D3TK</option>
		<option value="D3IF"  <?php if ($data['prodi'] == 'D3IF') {echo "selected";} ?>>D3IF</option>
		<option value="D3TT"  <?php if ($data['prodi'] == 'D3TT') {echo "selected";} ?>>D3TT</option>
		<option value="D4SM"  <?php if ($data['prodi'] == 'D4SM') {echo "selected";} ?>>D4SM</option>
		<option value="D3KA"  <?php if ($data['prodi'] == 'D3KA') {echo "selected";} ?>>D3KA</option>
	</select><br>
	Fakultas :<br>
	<input type="radio" name="fakultas" value="FIT" <?php if ($data['fakultas'] == 'FIT') {echo "checked";} ?>>FIT<br>
	<input type="radio" name="fakultas" value="FIK" <?php if ($data['fakultas'] == 'FIK') {echo "checked";} ?>>FIK<br>
	<input type="radio" name="fakultas" value="FEB" <?php if ($data['fakultas'] == 'FEB') {echo "checked";} ?>>FEB<br>
	<input type="radio" name="fakultas" value="FIF" <?php if ($data['fakultas'] == 'FIF') {echo "checked";} ?>>FIF<br>
	<input type="text" name="asal" placeholder="Asal"  value="<?php echo $data['asal']; ?>"><br>
	<textarea name="moto" placeholder="Tulis Moto Hidup..."><?php echo $data['moto']; ?></textarea><br>
	<input type="submit" name="submit">
</form>
<br>
<a href="view.php">Lihat Data</a>
</body>
</html>
<?php
include('koneksi.php');
if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$nim = $_POST['nim'];
	$lahir = $_POST['lahir'];
	$jk = $_POST['jk'];
	$prodi = $_POST['prodi'];
	$fakultas = $_POST['fakultas'];
	$asal = $_POST['asal'];
	$moto = $_POST['moto'];

	if (empty($nama)) {
		$cek3 = 'f';
		echo "NAMA KOSONG<br>";
	}else{$cek3 = 't';}

	if ($jk == 'null') {
		$cek4 = 'f';
		echo "JENIS KELAMIN HARUS DIISI<br>";
	}else{$cek4 = 't';}

	if ($prodi == 'null') {
		$cek5 = 'f';
		echo "PRODI HARUS DIISI<br>";
	}else{$cek5 = 't';}

	if ($cek3 == 't' && $cek4 == 't' && $cek5 == 't') {
		if (!empty($lahir)) {
						$sql = "UPDATE data SET nama='$nama', lahir='$lahir', jk='$jk', prodi='$prodi', fakultas='$fakultas', asal='$asal', moto='$moto'  WHERE nim = '$x'";

					if ($conn->query($sql) === TRUE) {
					    header("Location:view.php");
					} else {
					    echo "Error: " . $sql . "<br>" . $conn->error;
								}
		}else {
				$sql = "UPDATE data SET nama = '$nama', jk = '$jk', prodi = '$prodi', fakultas = '$fakultas', asal = '$asal', moto = '$moto' WHERE nim = '$x'";

			if ($conn->query($sql) === TRUE) {
					header("Location:view.php");
			} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
						}
			}
}
$conn->close();
}
?>
