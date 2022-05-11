<!DOCTYPE html>
<html>
<head>
  <title>Data Pegawai</title>
</head>
<body>
<center><h1>Data Pegawai</h1></center>
<?php
// Declaration servername, username, password, and database
$servername="localhost";
$username="root";
$password="";
$dbname="pegawai1";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check Connection
if(!$conn){
  die("Connection failed: ". mysqli_connect_error());
}

// take allrecord in pegawaitable
$sql= "SELECT * FROM data_pegawai";
$result= mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
  // Output
  //'?key=$row[NIK]' used for write selected NIK and show to url
  while ($row = mysqli_fetch_assoc($result)) {
    echo "================================";
    echo "<br>";
    echo "ID Pegawai: ". $row["ID Pegawai"] ."<br>Nama: ". $row["Nama"] ."<br>Jenis Kelamin : ". $row["Jenis Kelamin"] ."<br>Alamat: ". $row["Alamat"] ."<br>Telpon: ". $row["Telpon"] ."<br>Jabatan: ". $row["Jabatan"] ."<br>Gaji: ". $row["Gaji"] ."<br>";
    echo "<tr>
    <td><a href='editdata.php?key=$row[ID Pegawai]'>ubah</a></td>
    &emsp;|&emsp;
    <td><a href='?key=$row[ID Pegawai]'>Hapus</a></td>
    </tr><br>";
  }
} else{
  echo "Empty";
}
// To go next page
echo"<br><br><form action='tambahdata.php'><input type='submit' name='btnTambah' value='Tambah Data'></form>";

mysqli_close($conn);
?>
</body>
</html>
<?php
// Declaration servername, username, password, and database
$servername="localhost";
$username="root";
$password="";
$dbname="pegawai1";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check Connection
if(!$conn){
  die("Connection failed: ". mysqli_connect_error());
}

if(isset($_GET['key'])){

  // Delete record pegawai depend on selected id_pegawai
  $sql= "DELETE FROM data_pegawai WHERE id_pegawai='$_GET[key]'";
  if(mysqli_query($conn, $sql)){
    echo "Data berhasil dihapus";
    // Re-open simpanhapus.php
    echo "<meta HTTP-EQUIV='REFRESH' content='1; url=simpanhapus.php'>";
  } else{
    echo "Error: ". $sql ."<br>". mysqli_error($conn);
  }
  // Close Connection
  mysqli_close($conn);  
}

?>