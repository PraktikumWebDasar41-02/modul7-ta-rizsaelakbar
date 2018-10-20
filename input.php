<!DOCTYPE html>
<html>
<head>
	<title>Input</title>
</head>
<body>
<form method="post" action="">
	<input type="text" name="nama" placeholder="Nama"><br>
	<input type="text" name="nim" placeholder="NIM"><br>
	<input type="date" name="lahir"><br>
	Jenis Kelamin :<br>
	<select name="jk">
		<option value="null">Pilih...</option>
		<option value="Pria">Pria</option>
		<option value="Wanita">Wanita</option>
	</select><br>
	Prodi :<br>
	<select name="prodi">
		<option value="null">Pilih...</option>
		<option value="D3MI">D3MI</option>
		<option value="D3TK">D3TK</option>
		<option value="D3IF">D3IF</option>
		<option value="D3TT">D3TT</option>
		<option value="D4SM">D4SM</option>
		<option value="D3KA">D3KA</option>
	</select><br>
	Fakultas :<br>
	<input type="radio" name="fakultas" value="FIT">FIT<input type="radio" name="fakultas" value="null" checked="checked" hidden="hidden"><br>
	<input type="radio" name="fakultas" value="FIK">FIK<br>
	<input type="radio" name="fakultas" value="FEB">FEB<br>
	<input type="radio" name="fakultas" value="FIF">FIF<br>
	<input type="text" name="asal" placeholder="Asal"><br>
	<textarea name="moto" placeholder="Tulis Moto Hidup..."></textarea><br>
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

	if (empty($nim)) {
		$cek = 'f';
		echo "NIM KOSONG<br>";
	}else{$cek = 't';}

	if (!is_numeric($nim)) {
		$cek2 = 'f';
		echo "NIM HARUS ANGKA<br>";
	}else{$cek2 = 't';}

	if ($jk == 'null') {
		$cek4 = 'f';
		echo "JENIS KELAMIN HARUS DIISI<br>";
	}else{$cek4 = 't';}

	if ($prodi == 'null') {
		$cek5 = 'f';
		echo "PRODI HARUS DIISI<br>";
	}else{$cek5 = 't';}

	if ($cek == 't' && $cek2 == 't' && $cek3 == 't' && $cek4 == 't' && $cek5 == 't') {	
	$sql = "INSERT INTO data (nama, nim, lahir, jk, prodi, fakultas, asal, moto)
VALUES ('$nama', '$nim', '$lahir', '$jk', '$prodi', '$fakultas', '$asal', '$moto')";

if ($conn->query($sql) === TRUE) {
    header("Location:view.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
}
?>