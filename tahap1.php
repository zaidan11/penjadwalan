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

$sql = "SELECT nim FROM coass_mhs";
$result = mysqli_query($conn, $sql);
$array = array();

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $array[] = $row["nim"];
        echo $row["nim"] . "<br>";
    }
} else {
    echo "0 results";
}

function partition($list, $p)
{
    $listlen = count($list);
    $partlen = floor($listlen / $p);
    $partrem = $listlen % $p;
    $partition = array();
    $mark = 0;
    for ($px = 0; $px < $p; $px++) {
        $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
        $partition[$px] = array_slice($list, $mark, $incr);
        $mark += $incr;
    }
    return $partition;
}

$arrayidmhs = partition($array, 5);

$konfigurasi_pembagian = [ //periode 1
  [4],    // Bagian pertama dibagi menjadi 4 sama besar
  [8],    // Bagian kedua dibagi menjadi 8 sama besar
  [2],    // Bagian ketiga dibagi menjadi 2 sama besar
  [8],    // Bagian keempat dibagi menjadi 8 sama besar
  [2]     // Bagian kelima dibagi menjadi 2 sama besar
];
$konfigurasi_pembagian_2 = [ //periode 2
  [8],    //dibagi menjadi 8 sama besar
  [2],    //dibagi menjadi 2 sama besar
  [8],    //dibagi menjadi 8 sama besar
  [2],    //dibagi menjadi 2 sama besar
  [4]     //dibagi menjadi 4 sama besar
];
$konfigurasi_pembagian_3 = [ //periode 3
  [2],    //dibagi menjadi 2 sama besar
  [8],    //dibagi menjadi 8 sama besar
  [2],    //dibagi menjadi 2 sama besar
  [4],    //dibagi menjadi 4 sama besar
  [8]     //dibagi menjadi 8 sama besar
];
$konfigurasi_pembagian_4 = [ //periode 4
  [8],    //dibagi menjadi 8 sama besar
  [2],    //dibagi menjadi 2 sama besar
  [4],    //dibagi menjadi 4 sama besar
  [8],    //dibagi menjadi 8 sama besar
  [2]     //dibagi menjadi 2 sama besar
];
$konfigurasi_pembagian_5 = [ //periode 5
  [2],    //dibagi menjadi 2 sama besar
  [4],    //dibagi menjadi 4 sama besar
  [8],    //dibagi menjadi 8 sama besar
  [2],    //dibagi menjadi 2 sama besar
  [8]     //dibagi menjadi 8 sama besar
];

$hasil = [];
$hasil2 = [];
$hasil3 = [];
$hasil4 = [];
$hasil5 = [];

//1
foreach ($arrayidmhs as $bagian_ke => $bagian_array) {
  $konfigurasi = $konfigurasi_pembagian[$bagian_ke];
  $bagian_hasil = $bagian_array;

  foreach ($konfigurasi as $level => $jumlah) {
      $bagian_hasil = partition($bagian_hasil, $jumlah);
  }

  $hasil[$bagian_ke] = $bagian_hasil;
}
//2
foreach ($arrayidmhs as $bagian_ke => $bagian_array) {
  $konfigurasi = $konfigurasi_pembagian_2[$bagian_ke];
  $bagian_hasil = $bagian_array;

  foreach ($konfigurasi as $level => $jumlah) {
      $bagian_hasil = partition($bagian_hasil, $jumlah);
  }

  $hasil2[$bagian_ke] = $bagian_hasil;
}
//3
foreach ($arrayidmhs as $bagian_ke => $bagian_array) {
  $konfigurasi = $konfigurasi_pembagian_3[$bagian_ke];
  $bagian_hasil = $bagian_array;

  foreach ($konfigurasi as $level => $jumlah) {
      $bagian_hasil = partition($bagian_hasil, $jumlah);
  }

  $hasil3[$bagian_ke] = $bagian_hasil;
}
//4
foreach ($arrayidmhs as $bagian_ke => $bagian_array) {
  $konfigurasi = $konfigurasi_pembagian_4[$bagian_ke];
  $bagian_hasil = $bagian_array;

  foreach ($konfigurasi as $level => $jumlah) {
      $bagian_hasil = partition($bagian_hasil, $jumlah);
  }

  $hasil4[$bagian_ke] = $bagian_hasil;
}
//5
foreach ($arrayidmhs as $bagian_ke => $bagian_array) {
  $konfigurasi = $konfigurasi_pembagian_5[$bagian_ke];
  $bagian_hasil = $bagian_array;

  foreach ($konfigurasi as $level => $jumlah) {
      $bagian_hasil = partition($bagian_hasil, $jumlah);
  }

  $hasil5[$bagian_ke] = $bagian_hasil;
}

// Menampilkan hasil
foreach ($hasil as $bagian_ke => $bagian_hasil) {
  echo "Bagian ke-$bagian_ke: <br>";
  foreach ($bagian_hasil as $level => $bagian) {
      echo "Level $level: ";
      print_r($bagian);
      echo "<br>";
      // Simpan nim dan kode tugas ke dalam tabel
      foreach ($bagian as $nim) {
      // Ubah kode_tugas sesuai dengan kebutuhan Anda
      $kode_tugas = generateKodeTugas($bagian_ke, $level);
      // Simpan nim dan kode tugas ke dalam tabel
      $insertSql = "INSERT INTO tabel_tugas (nim, kode_tugas) VALUES ('$nim', '$kode_tugas')";
      if ($conn->query($insertSql) === TRUE) {
          echo "Data nim dan kode tugas berhasil disimpan.<br>";
      } else {
          echo "Error: " . $insertSql . "<br>" . $conn->error;
      }
  }
  }
}
// Menampilkan hasil 2
foreach ($hasil2 as $bagian_ke => $bagian_hasil) {
  echo "Bagian ke-$bagian_ke: <br>";
  foreach ($bagian_hasil as $level => $bagian) {
      echo "Level $level: ";
      print_r($bagian);
      echo "<br>";
      // Simpan nim dan kode tugas ke dalam tabel
      foreach ($bagian as $nim) {
      // Ubah kode_tugas sesuai dengan kebutuhan Anda
      $kode_tugas2 = generateKodeTugas2($bagian_ke, $level);
      // Simpan nim dan kode tugas ke dalam tabel
      $insertSql = "INSERT INTO tabel_tugas2 (nim, kode_tugas2) VALUES ('$nim', '$kode_tugas2')";
      if ($conn->query($insertSql) === TRUE) {
          echo "Data nim dan kode tugas berhasil disimpan.<br>";
      } else {
          echo "Error: " . $insertSql . "<br>" . $conn->error;
      }
  }
  }
}
// Menampilkan hasil 3
foreach ($hasil3 as $bagian_ke => $bagian_hasil) {
  echo "Bagian ke-$bagian_ke: <br>";
  foreach ($bagian_hasil as $level => $bagian) {
      echo "Level $level: ";
      print_r($bagian);
      echo "<br>";
      // Simpan nim dan kode tugas ke dalam tabel
      foreach ($bagian as $nim) {
      // Ubah kode_tugas sesuai dengan kebutuhan Anda
      $kode_tugas3 = generateKodeTugas3($bagian_ke, $level);
      // Simpan nim dan kode tugas ke dalam tabel
      $insertSql = "INSERT INTO tabel_tugas3 (nim, kode_tugas3) VALUES ('$nim', '$kode_tugas3')";
      if ($conn->query($insertSql) === TRUE) {
          echo "Data nim dan kode tugas berhasil disimpan.<br>";
      } else {
          echo "Error: " . $insertSql . "<br>" . $conn->error;
      }
  }
  }
}
// Menampilkan hasil 4
foreach ($hasil4 as $bagian_ke => $bagian_hasil) {
  echo "Bagian ke-$bagian_ke: <br>";
  foreach ($bagian_hasil as $level => $bagian) {
      echo "Level $level: ";
      print_r($bagian);
      echo "<br>";
      // Simpan nim dan kode tugas ke dalam tabel
      foreach ($bagian as $nim) {
      // Ubah kode_tugas sesuai dengan kebutuhan Anda
      $kode_tugas4 = generateKodeTugas4($bagian_ke, $level);
      // Simpan nim dan kode tugas ke dalam tabel
      $insertSql = "INSERT INTO tabel_tugas4 (nim, kode_tugas4) VALUES ('$nim', '$kode_tugas4')";
      if ($conn->query($insertSql) === TRUE) {
          echo "Data nim dan kode tugas berhasil disimpan.<br>";
      } else {
          echo "Error: " . $insertSql . "<br>" . $conn->error;
      }
  }
  }
}
// Menampilkan hasil 5
foreach ($hasil5 as $bagian_ke => $bagian_hasil) {
  echo "Bagian ke-$bagian_ke: <br>";
  foreach ($bagian_hasil as $level => $bagian) {
      echo "Level $level: ";
      print_r($bagian);
      echo "<br>";
      // Simpan nim dan kode tugas ke dalam tabel
      foreach ($bagian as $nim) {
      // Ubah kode_tugas sesuai dengan kebutuhan Anda
      $kode_tugas5 = generateKodeTugas5($bagian_ke, $level);
      // Simpan nim dan kode tugas ke dalam tabel
      $insertSql = "INSERT INTO tabel_tugas5 (nim, kode_tugas5) VALUES ('$nim', '$kode_tugas5')";
      if ($conn->query($insertSql) === TRUE) {
          echo "Data nim dan kode tugas berhasil disimpan.<br>";
      } else {
          echo "Error: " . $insertSql . "<br>" . $conn->error;
      }
  }
  }
}
// Mengisi coass_olah1_test
foreach ($hasil as $bagian_ke => $bagian_hasil) {
  echo "Bagian ke-$bagian_ke: <br>";
  foreach ($bagian_hasil as $level => $bagian) {
      echo "Level $level: ";
      print_r($bagian);
      echo "<br>";
      // Simpan nim dan kode tugas ke dalam tabel
      foreach ($bagian as $nim) {
      // Simpan nim dan kode tugas ke dalam tabel
      $insertSql = "INSERT INTO coass_olah1_test (nim) VALUES ('$nim')";
      if ($conn->query($insertSql) === TRUE) {
          echo "Data nim berhasil disimpan.<br>";
      } else {
          echo "Error: " . $insertSql . "<br>" . $conn->error;
      }
  }
  }
}

$conn->close();

// Fungsi untuk menghasilkan kode tugas
//1
function generateKodeTugas($bagian_ke, $level)
{
    // Ubah logika berikut sesuai dengan kebutuhan Anda
    $kode_tugas = "BT" . $bagian_ke . "-L" . $level . "-P1";

    return $kode_tugas;
}
//2
function generateKodeTugas2($bagian_ke, $level)
{
    // Ubah logika berikut sesuai dengan kebutuhan Anda
    $kode_tugas2 = "BT" . $bagian_ke . "-L" . $level . "-P2";

    return $kode_tugas2;
}
//3
function generateKodeTugas3($bagian_ke, $level)
{
    // Ubah logika berikut sesuai dengan kebutuhan Anda
    $kode_tugas3 = "BT" . $bagian_ke . "-L" . $level . "-P3";

    return $kode_tugas3;
}
//4
function generateKodeTugas4($bagian_ke, $level)
{
    // Ubah logika berikut sesuai dengan kebutuhan Anda
    $kode_tugas4 = "BT" . $bagian_ke . "-L" . $level . "-P4";

    return $kode_tugas4;
}
//5
function generateKodeTugas5($bagian_ke, $level)
{
    // Ubah logika berikut sesuai dengan kebutuhan Anda
    $kode_tugas5 = "BT" . $bagian_ke . "-L" . $level . "-P5";

    return $kode_tugas5;
}

?>