<?php
$servername = "localhost";
$username = "root";
$password = "";

//membuat koneksi dengan serverlokal
$conn = mysqli_connect($servername, $username, $password);
//cek koneksi
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

//mmebuat database 
$sql = "CREATE DATABASE pemweb_bukutamu";
if (mysqli_query($conn, $sql)) {
	echo "Database created successfully";
} else {
	echo "Error createing database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>