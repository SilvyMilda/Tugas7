<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<h1>Isi Data Baru</h1>
<!-- Make pegawai form -->
<form method="POST" action="#">
  <table width="400" cellpadding="2" cellspacing="2">
    <tr>
      <td width="130">ID Pegawai</td>
      <td><input type="text" name="id_pegawai" required></td>
    </tr>
    <tr>
      <td width="130">Nama</td>
      <td><input type="text" name="nama" required></td>
    </tr>
    <tr>
      <td width="130">Jenis Kelamin</td>
      <td><input type="text" name="jenis_kelamin" required></td>
    </tr>
    <tr>
      <td width="130">Alamat</td>
      <td><input type="text" name="alamat" required></td>
    </tr>
    <tr>
      <td width="130">Telpon</td>
      <td><input type="text" name="no_telp" required></td>
    </tr>
    <tr>
      <td width="130">Jabatan</td>
      <td><input type="text" name="jabatan" required></td>
    </tr>
    <tr>
      <td width="130">Gaji</td>
      <td><input type="text" name="gaji'" required></td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="tmblSimpan" value="simpan">
        <input type="reset" name="tmblReset" value="reset">
      </td>
    </tr>
  </table>
</form>
<!-- When click batal button move to soal3simpanhapus.php -->
<form action="simpanhapus.php">
    <input type="submit" value="Batal" />
</form>
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

// If clicl tmblSimpan 
if(isset($_POST['tmblSimpan'])){

  // Create record
  $sql= "INSERT INTO data_pegawai(ID Pegawai, Nama, Jenis Kelamin, Alamat, Telpon, Jabatan, Gaji) VALUES ('$_POST[id_pegawai]', '$_POST[nama]', '$_POST[jenis_kelamin]', '$_POST[alamat]', '$_POST[no_telp]', '$_POST[jabatan]', '$_POST[gaji]' '1')";
  if(mysqli_query($conn, $sql)){
    echo "New record created succesfully";
    // Move to soal3simpanhapus.php
    echo "<meta HTTP-EQUIV='REFRESH' content='1; url=soal3simpanhapus.php'>";
  } else{
    echo "Error: ". $sql ."<br>". mysqli_error($conn);
  }
  // Close Connection
  mysqli_close($conn);  
}

?>