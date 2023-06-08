<?php

namespace App;

use mysqli;
use Exception;

class tahap1
{
    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $dbname = "dbkoas";

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

    public function tahap1()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
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
        $arrayidmhs = $this->partition($array, 5);

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
                $bagian_hasil = $this->partition($bagian_hasil, $jumlah);
            }

            $hasil[$bagian_ke] = $bagian_hasil;
        }
        //2
        foreach ($arrayidmhs as $bagian_ke => $bagian_array) {
            $konfigurasi = $konfigurasi_pembagian_2[$bagian_ke];
            $bagian_hasil = $bagian_array;

            foreach ($konfigurasi as $level => $jumlah) {
                $bagian_hasil = $this->partition($bagian_hasil, $jumlah);
            }

            $hasil2[$bagian_ke] = $bagian_hasil;
        }
        //3
        foreach ($arrayidmhs as $bagian_ke => $bagian_array) {
            $konfigurasi = $konfigurasi_pembagian_3[$bagian_ke];
            $bagian_hasil = $bagian_array;

            foreach ($konfigurasi as $level => $jumlah) {
                $bagian_hasil = $this->partition($bagian_hasil, $jumlah);
            }

            $hasil3[$bagian_ke] = $bagian_hasil;
        }
        //4
        foreach ($arrayidmhs as $bagian_ke => $bagian_array) {
            $konfigurasi = $konfigurasi_pembagian_4[$bagian_ke];
            $bagian_hasil = $bagian_array;

            foreach ($konfigurasi as $level => $jumlah) {
                $bagian_hasil = $this->partition($bagian_hasil, $jumlah);
            }

            $hasil4[$bagian_ke] = $bagian_hasil;
        }
        //5
        foreach ($arrayidmhs as $bagian_ke => $bagian_array) {
            $konfigurasi = $konfigurasi_pembagian_5[$bagian_ke];
            $bagian_hasil = $bagian_array;

            foreach ($konfigurasi as $level => $jumlah) {
                $bagian_hasil = $this->partition($bagian_hasil, $jumlah);
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
                    $kode_tugas = $this->generateKodeTugas($bagian_ke, $level);
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
                    $kode_tugas2 = $this->generateKodeTugas2($bagian_ke, $level);
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
                    $kode_tugas3 = $this->generateKodeTugas3($bagian_ke, $level);
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
                    $kode_tugas4 = $this->generateKodeTugas4($bagian_ke, $level);
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
                    $kode_tugas5 = $this->generateKodeTugas5($bagian_ke, $level);
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
    }

    function updateTable()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $conn->autocommit(false); // Memulai transaksi

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        try {
            $query = "UPDATE `coass_olah1_test` O SET O.kode_tugas=(SELECT kode_tugas FROM tabel_tugas WHERE nim=O.nim)";
            $conn->query($query);

            $query = "UPDATE `coass_olah1_test` O SET O.kode_tugas2=(SELECT kode_tugas2 FROM tabel_tugas2 WHERE nim=O.nim)";
            $conn->query($query);

            $query = "UPDATE `coass_olah1_test` O SET O.kode_tugas3=(SELECT kode_tugas3 FROM tabel_tugas3 WHERE nim=O.nim)";
            $conn->query($query);

            $query = "UPDATE `coass_olah1_test` O SET O.kode_tugas4=(SELECT kode_tugas4 FROM tabel_tugas4 WHERE nim=O.nim)";
            $conn->query($query);

            $query = "UPDATE `coass_olah1_test` O SET O.kode_tugas5=(SELECT kode_tugas5 FROM tabel_tugas5 WHERE nim=O.nim)";
            $conn->query($query);

            $query = "UPDATE `coass_olah1_test` O SET O.`1`=(SELECT `1` FROM kode_stase WHERE kode=O.kode_tugas)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`2`=(SELECT `2` FROM kode_stase WHERE kode=O.kode_tugas)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`3`=(SELECT `3` FROM kode_stase WHERE kode=O.kode_tugas)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`4`=(SELECT `4` FROM kode_stase WHERE kode=O.kode_tugas)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`5`=(SELECT `5` FROM kode_stase WHERE kode=O.kode_tugas)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`6`=(SELECT `6` FROM kode_stase WHERE kode=O.kode_tugas)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`7`=(SELECT `7` FROM kode_stase WHERE kode=O.kode_tugas)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`8`=(SELECT `8` FROM kode_stase WHERE kode=O.kode_tugas)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`9`=(SELECT `9` FROM kode_stase WHERE kode=O.kode_tugas2)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`10`=(SELECT `10` FROM kode_stase WHERE kode=O.kode_tugas2)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`11`=(SELECT `11` FROM kode_stase WHERE kode=O.kode_tugas2)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`12`=(SELECT `12` FROM kode_stase WHERE kode=O.kode_tugas2)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`13`=(SELECT `13` FROM kode_stase WHERE kode=O.kode_tugas2)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`14`=(SELECT `14` FROM kode_stase WHERE kode=O.kode_tugas2)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`15`=(SELECT `15` FROM kode_stase WHERE kode=O.kode_tugas2)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`16`=(SELECT `16` FROM kode_stase WHERE kode=O.kode_tugas2)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`17`=(SELECT `17` FROM kode_stase WHERE kode=O.kode_tugas3)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`18`=(SELECT `18` FROM kode_stase WHERE kode=O.kode_tugas3)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`19`=(SELECT `19` FROM kode_stase WHERE kode=O.kode_tugas3)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`20`=(SELECT `20` FROM kode_stase WHERE kode=O.kode_tugas3)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`21`=(SELECT `21` FROM kode_stase WHERE kode=O.kode_tugas3)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`22`=(SELECT `22` FROM kode_stase WHERE kode=O.kode_tugas3)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`23`=(SELECT `23` FROM kode_stase WHERE kode=O.kode_tugas3)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`24`=(SELECT `24` FROM kode_stase WHERE kode=O.kode_tugas3)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`25`=(SELECT `25` FROM kode_stase WHERE kode=O.kode_tugas4)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`26`=(SELECT `26` FROM kode_stase WHERE kode=O.kode_tugas4)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`27`=(SELECT `27` FROM kode_stase WHERE kode=O.kode_tugas4)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`28`=(SELECT `28` FROM kode_stase WHERE kode=O.kode_tugas4)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`29`=(SELECT `29` FROM kode_stase WHERE kode=O.kode_tugas4)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`30`=(SELECT `30` FROM kode_stase WHERE kode=O.kode_tugas4)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`31`=(SELECT `31` FROM kode_stase WHERE kode=O.kode_tugas4)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`32`=(SELECT `32` FROM kode_stase WHERE kode=O.kode_tugas4)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`33`=(SELECT `33` FROM kode_stase WHERE kode=O.kode_tugas5)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`34`=(SELECT `34` FROM kode_stase WHERE kode=O.kode_tugas5)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`35`=(SELECT `35` FROM kode_stase WHERE kode=O.kode_tugas5)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`36`=(SELECT `36` FROM kode_stase WHERE kode=O.kode_tugas5)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`37`=(SELECT `37` FROM kode_stase WHERE kode=O.kode_tugas5)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`38`=(SELECT `38` FROM kode_stase WHERE kode=O.kode_tugas5)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`39`=(SELECT `39` FROM kode_stase WHERE kode=O.kode_tugas5)";
            $conn->query($query);
            $query = "UPDATE `coass_olah1_test` O SET O.`40`=(SELECT `40` FROM kode_stase WHERE kode=O.kode_tugas5)";
            $conn->query($query);
            $conn->commit(); // Menyimpan perubahan dalam transaksi
            echo "Data updated successfully.";
        } catch (Exception $e) {
            $conn->rollback(); // Membatalkan perubahan jika terjadi kesalahan
            echo "Error updating data: " . $e->getMessage();
        }

        $conn->autocommit(true); // Mengaktifkan mode autocommit kembali setelah selesai
        $conn->close();
    }

    function builduptahap1()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        for ($i = 1; $i <= 40; $i++) {
            $sql = "INSERT INTO coass_olah(nim, id_stase,id_minggu) SELECT nim, `$i`, $i FROM coass_olah1_test WHERE (`$i`<>NULL OR `$i`<>0);";
            $conn->query($sql);
            echo "$sql <br />";
        }
    }

    function updateCoassOlah()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $conn->autocommit(false); // Memulai transaksi
        try {
            $query = "UPDATE `coass_olah` O SET O.`id_mhs`=(select id from coass_mhs where nim=O.nim)";
            $conn->query($query);
            $query = "UPDATE `coass_olah` O SET O.`id_mk`=(select id_mk from coass_stase where id=O.id_stase)";
            $conn->query($query);
            $query = "UPDATE `coass_olah` O SET O.`lama`=(select hari from coass_stase where id=O.id_stase)";
            $conn->query($query);
            $query = "UPDATE `coass_olah` O SET O.`tanggal_mulai`=(select tanggal from coass_tanggal where id=O.id_minggu)";
            $conn->query($query);
            $query = "UPDATE `coass_olah` O SET `tanggal_akhir`=(SELECT DATE_ADD(tanggal_mulai, INTERVAL lama-1 day))";
            $conn->query($query);
            $conn->commit();
            echo "Data updated successfully.";
        } catch (Exception $e) {
            $conn->rollback(); // Membatalkan perubahan jika terjadi kesalahan
            echo "Error updating data: " . $e->getMessage();
        }
        $conn->autocommit(true); // Mengaktifkan mode autocommit kembali setelah selesai
        $conn->close();
    }

    function deleteTable()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $conn->autocommit(false); // Memulai transaksi
        try {
            $query = "DELETE FROM coass_mhs";
            $conn->query($query);
            $query = "DELETE FROM coass_olah";
            $conn->query($query);
            $query = "DELETE FROM coass_olah1_test";
            $conn->query($query);
            $query = "DELETE FROM tabel_tugas";
            $conn->query($query);
            $query = "DELETE FROM tabel_tugas2";
            $conn->query($query);
            $query = "DELETE FROM tabel_tugas3";
            $conn->query($query);
            $query = "DELETE FROM tabel_tugas4";
            $conn->query($query);
            $query = "DELETE FROM tabel_tugas5";
            $conn->query($query);
            echo "Data deleted successfully.";
        } catch (Exception $e) {
            $conn->rollback(); // Membatalkan perubahan jika terjadi kesalahan
            echo "Error updating data: " . $e->getMessage();
        }
        $conn->autocommit(true); // Mengaktifkan mode autocommit kembali setelah selesai
        $conn->close();
    }
}
