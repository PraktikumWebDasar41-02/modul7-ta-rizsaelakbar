<?php
$x = $_GET['nim'];
include('koneksi.php');
		
		$sql = mysqli_query($conn, "DELETE FROM data WHERE nim='$x'");
		$conn->query($sql) === TRUE;
		header("Location:view.php");

?>