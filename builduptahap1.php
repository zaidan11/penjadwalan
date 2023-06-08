<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dbkoas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

for ($i=1;$i<=40;$i++)
{
$sql= "insert into coass_olah(nim, id_stase,id_minggu) select nim, `$i`, $i from coass_olah1_test where (`$i`<>null or `$i`<>0);";
$result = $conn->query($sql);
echo "$sql <br />";
}

/*
$sql = "update seleksi set diterima_prop=0;";
//====================================
//ambil daftar prodi kuota jateng
//====================================
$sql = "SELECT kode_prodi, jateng FROM daya_tampung where kode_prodi is not null";
$result = $conn->query($sql);

$prodi=array();
$kuota=array();
if ($result->num_rows > 0) 
{
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
    $prodi[]=$row["kode_prodi"];
	$kuota[]=$row["jateng"];
  }
} 
else 
{
  echo "0 results";
}
print_r($prodi);
print_r($kuota);
$j=0;


	
for ($j==0;$j<70;$j++)
{
  echo "Prodi $prodi[$j] Kuota $kuota[$j] </br>";
//sorting kuota
  $sql = "SELECT nomor_pendaftaran FROM seleksi where kode_prodi=$prodi[$j] and kode_provinsi=30000 order by score desc limit 0,$kuota[$j]";
  $result = $conn->query($sql);
  echo "$sql </br>";

  $nomor=array();
  if ($result->num_rows > 0) 
  {
// output data of each row
    while($row = $result->fetch_assoc()) 
	{
    $nomor[]=$row["nomor_pendaftaran"];
    }
  } 
  else 
  {
    echo "0 results";
  }
  print_r($nomor);
  $i=0;
//update hasilnya
  for($i==0;$i<$kuota[$j];$i++)
  {
    $sql = "update seleksi set diterima_prop=1 where nomor_pendaftaran=$nomor[$i] and kode_prodi=$prodi[$j];";
    $result = $conn->query($sql);
    echo "$sql <br />";
  }
}
//====================================
//ambil daftar prodi kuota non jateng
//====================================
$sql = "SELECT kode_prodi, non FROM daya_tampung where kode_prodi is not null";
$result = $conn->query($sql);

$prodi=array();
$kuota=array();
if ($result->num_rows > 0) 
{
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
    $prodi[]=$row["kode_prodi"];
	$kuota[]=$row["non"];
  }
} 
else 
{
  echo "0 results";
}
print_r($prodi);
print_r($kuota);
$j=0;

for ($j==0;$j<70;$j++)
{
  echo "Prodi $prodi[$j] Kuota $kuota[$j] </br>";
//sorting kuota
  $sql = "SELECT nomor_pendaftaran FROM seleksi where kode_prodi=$prodi[$j] and kode_provinsi <>30000 order by score desc limit 0,$kuota[$j]";
  $result = $conn->query($sql);
  echo "$sql </br>";

  $nomor=array();
  if ($result->num_rows > 0) 
  {
// output data of each row
    while($row = $result->fetch_assoc()) 
	{
    $nomor[]=$row["nomor_pendaftaran"];
    }
  } 
  else 
  {
    echo "0 results";
  }
  print_r($nomor);
  $i=0;
//update hasilnya
  for($i==0;$i<$kuota[$j];$i++)
  {
    $sql = "update seleksi set diterima_prop=1 where nomor_pendaftaran=$nomor[$i] and kode_prodi=$prodi[$j];";
    $result = $conn->query($sql);
    echo "$sql <br />";
  }
}
*/
$conn->close();
?> 