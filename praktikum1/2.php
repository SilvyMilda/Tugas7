<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pemweb_bukutamu";

//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO buku_tamu (NAMA, EMAIL, ISI) 
VALUES ('Tukinem', 'tukinem123@gmail.com', 'saudara')";

if (mysqli_query($conn, $sql)) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>