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
// Take record in the url
$sql= "SELECT * FROM data_pegawai WHERE id_pegawai=$_GET[key]";
$result= mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<h1>Ubah Data</h1>
<!-- Make form to change record -->
<form method="POST" action="#">
  <table width="400" cellpadding="2" cellspacing="2">
    <tr>
      <td width="130">ID Pegawai</td>
      <td><input type="text" name="id_pegawai" value="<?php echo $row['ID Pegawai'] ?>" required></td>
    </tr>
    <tr>
      <td width="130">Nama</td>
      <td><input type="text" name="nama" value="<?php echo $row['Nama']?>" required></td>
    </tr>
    <tr>
      <td width="130">jenis Kelamin</td>
      <td><input type="text" name="jenis_kelamin" value="<?php echo $row['Jenis Kelamin']?>" required></td>
    </tr>
    <tr>
      <td width="130">Alamat</td>
      <td><input type="text" name="alamat" value="<?php echo $row['Alamat']?>" required></td>
    </tr>
    <tr>
      <td width="130">Telpon</td>
      <td><input type="text" name="no_telp" value="<?php echo $row['Telpon']?>" required></td>
    </tr>
    <tr>
      <td width="130">Jabatan</td>
      <td><input type="text" name="jabatan" value="<?php echo $row['Jabatan']?>" required></td>
    </tr>
    <tr>
      <td width="130">Gaji</td>
      <td><input type="text" name="gaji" value="<?php echo $row['Gaji']?>" required></td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="btnUbah" value="Ubah">
      </td>
    </tr>
  </table>
</form>
<!-- Turn back to soal3simpanhapus.php -->
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

if(isset($_POST['btnUbah'])){

  // Upgrade record
  $sql= "UPDATE pegawai SET ID Pegawai='$_POST[id_pegawai]', Nama='$_POST[nama]', Jenis Kelamin='$_POST[jenis_kelamin]', Alamat='$_POST[alamat]', Telpon='$_POST[no_telp]', Jabatan='$_POST[jabatan]', Gaji='$_POST[gaji]' WHERE ID Pegawai='$_GET[key]'";
  if(mysqli_query($conn, $sql)){
    echo "Data berhasil diubah";
    //Move to simpanhapus.php
    echo "<meta HTTP-EQUIV='REFRESH' content='1; url=simpanhapus.php'>";
  } else{
    echo "Error: ". $sql ."<br>". mysqli_error($conn);
  }
  // Close Connection
  mysqli_close($conn);  
}

?>