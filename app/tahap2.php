<?php

namespace App;

use mysqli;
use exception;

class tahap2
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

    public function tahap2()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //Laki
        $sqlL = "select nim from coass_mhs2 where lp = 'L'";
        $resultL = mysqli_query($conn, $sqlL);
        $arrayL = array();
        if ($resultL->num_rows > 0) {
            // output data of each row
            echo "Laki<br>";
            while ($row = $resultL->fetch_assoc()) {
                $arrayL[] = $row["nim"];
                echo $row["nim"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        //Perempuan
        $sqlP = "select nim from coass_mhs2 where lp = 'P'";
        $resultP = mysqli_query($conn, $sqlP);
        $arrayP = array();
        if ($resultP->num_rows > 0) {
            // output data of each row
            echo "Perempuan<br>";
            while ($row = $resultP->fetch_assoc()) {
                $arrayP[] = $row["nim"];
                echo $row["nim"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        $arrayidmhsL = $this->partition($arrayL, 4);
        $arrayidmhsP = $this->partition($arrayP, 4);

        $konfigurasi_pembagian = [ //periode 1
            [1],    //dibagi menjadi 1 sama besar
            [1],    //dibagi menjadi 1 sama besar
            [1],    //dibagi menjadi 1 sama besar
            [3]     //dibagi menjadi 3 sama besar
        ];
        $konfigurasi_pembagian2 = [ //periode 2
            [1],    //dibagi menjadi 1 sama besar
            [1],    //dibagi menjadi 1 sama besar
            [3],    //dibagi menjadi 3 sama besar
            [1]     //dibagi menjadi 1 sama besar
        ];
        $konfigurasi_pembagian3 = [ //periode 3
            [1],    //dibagi menjadi 1 sama besar
            [3],    //dibagi menjadi 3 sama besar
            [1],    //dibagi menjadi 1 sama besar
            [1]     //dibagi menjadi 1 sama besar
        ];
        $konfigurasi_pembagian4 = [ //periode 4
            [3],    //dibagi menjadi 3 sama besar
            [1],    //dibagi menjadi 1 sama besar
            [1],    //dibagi menjadi 1 sama besar
            [1]     //dibagi menjadi 1 sama besar
        ];

        $hasilL = [];
        $hasilP = [];
        $hasilL2 = [];
        $hasilP2 = [];
        $hasilL3 = [];
        $hasilP3 = [];
        $hasilL4 = [];
        $hasilP4 = [];

        //1
        foreach ($arrayidmhsL as $bagian_ke => $bagian_array) { //function L
            $konfigurasi = $konfigurasi_pembagian[$bagian_ke];
            $bagian_hasil = $bagian_array;

            foreach ($konfigurasi as $level => $jumlah) {
                $bagian_hasil = $this->partition($bagian_hasil, $jumlah);
            }
            $hasilL[$bagian_ke] = $bagian_hasil;
        }
        foreach ($arrayidmhsP as $bagian_ke => $bagian_array) { //function P
            $konfigurasi = $konfigurasi_pembagian[$bagian_ke];
            $bagian_hasil = $bagian_array;

            foreach ($konfigurasi as $level => $jumlah) {
                $bagian_hasil = $this->partition($bagian_hasil, $jumlah);
            }
            $hasilP[$bagian_ke] = $bagian_hasil;
        }
        //2
        foreach ($arrayidmhsL as $bagian_ke => $bagian_array) { //function L
            $konfigurasi = $konfigurasi_pembagian2[$bagian_ke];
            $bagian_hasil = $bagian_array;

            foreach ($konfigurasi as $level => $jumlah) {
                $bagian_hasil = $this->partition($bagian_hasil, $jumlah);
            }

            $hasilL2[$bagian_ke] = $bagian_hasil;
        }
        foreach ($arrayidmhsP as $bagian_ke => $bagian_array) { //function P
            $konfigurasi = $konfigurasi_pembagian2[$bagian_ke];
            $bagian_hasil = $bagian_array;

            foreach ($konfigurasi as $level => $jumlah) {
                $bagian_hasil = $this->partition($bagian_hasil, $jumlah);
            }

            $hasilP2[$bagian_ke] = $bagian_hasil;
        }
        //3
        foreach ($arrayidmhsL as $bagian_ke => $bagian_array) { //function L
            $konfigurasi = $konfigurasi_pembagian3[$bagian_ke];
            $bagian_hasil = $bagian_array;

            foreach ($konfigurasi as $level => $jumlah) {
                $bagian_hasil = $this->partition($bagian_hasil, $jumlah);
            }

            $hasilL3[$bagian_ke] = $bagian_hasil;
        }
        foreach ($arrayidmhsP as $bagian_ke => $bagian_array) { //function P
            $konfigurasi = $konfigurasi_pembagian3[$bagian_ke];
            $bagian_hasil = $bagian_array;

            foreach ($konfigurasi as $level => $jumlah) {
                $bagian_hasil = $this->partition($bagian_hasil, $jumlah);
            }

            $hasilP3[$bagian_ke] = $bagian_hasil;
        }
        //4
        foreach ($arrayidmhsL as $bagian_ke => $bagian_array) { //function L
            $konfigurasi = $konfigurasi_pembagian4[$bagian_ke];
            $bagian_hasil = $bagian_array;

            foreach ($konfigurasi as $level => $jumlah) {
                $bagian_hasil = $this->partition($bagian_hasil, $jumlah);
            }

            $hasilL4[$bagian_ke] = $bagian_hasil;
        }
        foreach ($arrayidmhsP as $bagian_ke => $bagian_array) { //function P
            $konfigurasi = $konfigurasi_pembagian4[$bagian_ke];
            $bagian_hasil = $bagian_array;

            foreach ($konfigurasi as $level => $jumlah) {
                $bagian_hasil = $this->partition($bagian_hasil, $jumlah);
            }

            $hasilP4[$bagian_ke] = $bagian_hasil;
        }

        // Menampilkan hasil
        //L
        echo "L<br>";
        foreach ($hasilL as $bagian_ke => $bagian_hasil) {
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
                    $insertSql = "INSERT INTO tabel2_tugas (nim, kode_tugas) VALUES ('$nim', '$kode_tugas')";
                    if ($conn->query($insertSql) === TRUE) {
                        echo "Data nim dan kode tugas berhasil disimpan.<br>";
                    } else {
                        echo "Error: " . $insertSql . "<br>" . $conn->error;
                    }
                }
            }
        }
        //P
        echo "P<br>";
        foreach ($hasilP as $bagian_ke => $bagian_hasil) {
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
                    $insertSql = "INSERT INTO tabel2_tugas (nim, kode_tugas) VALUES ('$nim', '$kode_tugas')";
                    if ($conn->query($insertSql) === TRUE) {
                        echo "Data nim dan kode tugas berhasil disimpan.<br>";
                    } else {
                        echo "Error: " . $insertSql . "<br>" . $conn->error;
                    }
                }
            }
        }
        // Menampilkan hasil 2
        //L
        echo "L<br>";
        foreach ($hasilL2 as $bagian_ke => $bagian_hasil) {
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
                    $insertSql = "INSERT INTO tabel2_tugas2 (nim, kode_tugas2) VALUES ('$nim', '$kode_tugas2')";
                    if ($conn->query($insertSql) === TRUE) {
                        echo "Data nim dan kode tugas berhasil disimpan.<br>";
                    } else {
                        echo "Error: " . $insertSql . "<br>" . $conn->error;
                    }
                }
            }
        }
        //P
        echo "P<br>";
        foreach ($hasilP2 as $bagian_ke => $bagian_hasil) {
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
                    $insertSql = "INSERT INTO tabel2_tugas2 (nim, kode_tugas2) VALUES ('$nim', '$kode_tugas2')";
                    if ($conn->query($insertSql) === TRUE) {
                        echo "Data nim dan kode tugas berhasil disimpan.<br>";
                    } else {
                        echo "Error: " . $insertSql . "<br>" . $conn->error;
                    }
                }
            }
        }
        // Menampilkan hasil 3
        //L
        echo "L<br>";
        foreach ($hasilL3 as $bagian_ke => $bagian_hasil) {
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
                    $insertSql = "INSERT INTO tabel2_tugas3 (nim, kode_tugas3) VALUES ('$nim', '$kode_tugas3')";
                    if ($conn->query($insertSql) === TRUE) {
                        echo "Data nim dan kode tugas berhasil disimpan.<br>";
                    } else {
                        echo "Error: " . $insertSql . "<br>" . $conn->error;
                    }
                }
            }
        }
        //P
        echo "P<br>";
        foreach ($hasilP3 as $bagian_ke => $bagian_hasil) {
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
                    $insertSql = "INSERT INTO tabel2_tugas3 (nim, kode_tugas3) VALUES ('$nim', '$kode_tugas3')";
                    if ($conn->query($insertSql) === TRUE) {
                        echo "Data nim dan kode tugas berhasil disimpan.<br>";
                    } else {
                        echo "Error: " . $insertSql . "<br>" . $conn->error;
                    }
                }
            }
        }
        // Menampilkan hasil 4
        //L
        echo "L<br>";
        foreach ($hasilL4 as $bagian_ke => $bagian_hasil) {
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
                    $insertSql = "INSERT INTO tabel2_tugas4 (nim, kode_tugas4) VALUES ('$nim', '$kode_tugas4')";
                    if ($conn->query($insertSql) === TRUE) {
                        echo "Data nim dan kode tugas berhasil disimpan.<br>";
                    } else {
                        echo "Error: " . $insertSql . "<br>" . $conn->error;
                    }
                }
            }
        }
        //P
        echo "P<br>";
        foreach ($hasilP4 as $bagian_ke => $bagian_hasil) {
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
                    $insertSql = "INSERT INTO tabel2_tugas4 (nim, kode_tugas4) VALUES ('$nim', '$kode_tugas4')";
                    if ($conn->query($insertSql) === TRUE) {
                        echo "Data nim dan kode tugas berhasil disimpan.<br>";
                    } else {
                        echo "Error: " . $insertSql . "<br>" . $conn->error;
                    }
                }
            }
        }
        foreach ($hasilL as $bagian_ke => $bagian_hasil) {
            echo "Bagian ke-$bagian_ke: <br>";
            foreach ($bagian_hasil as $level => $bagian) {
                echo "Level $level: ";
                print_r($bagian);
                echo "<br>";
                // Simpan nim dan kode tugas ke dalam tabel
                foreach ($bagian as $nim) {
                    // Simpan nim dan kode tugas ke dalam tabel
                    $insertSql = "INSERT INTO coass_olah2_test (nim) VALUES ('$nim')";
                    if ($conn->query($insertSql) === TRUE) {
                        echo "Data nim berhasil disimpan.<br>";
                    } else {
                        echo "Error: " . $insertSql . "<br>" . $conn->error;
                    }
                }
            }
        }
        foreach ($hasilP as $bagian_ke => $bagian_hasil) {
            echo "Bagian ke-$bagian_ke: <br>";
            foreach ($bagian_hasil as $level => $bagian) {
                echo "Level $level: ";
                print_r($bagian);
                echo "<br>";
                // Simpan nim dan kode tugas ke dalam tabel
                foreach ($bagian as $nim) {
                    // Simpan nim dan kode tugas ke dalam tabel
                    $insertSql = "INSERT INTO coass_olah2_test (nim) VALUES ('$nim')";
                    if ($conn->query($insertSql) === TRUE) {
                        echo "Data nim berhasil disimpan.<br>";
                    } else {
                        echo "Error: " . $insertSql . "<br>" . $conn->error;
                    }
                }
            }
        }
    }

    function updateTable2()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $conn->autocommit(false); // Memulai transaksi

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        try {
            $query = "UPDATE `coass_olah2_test` O SET O.kode_tugas=(SELECT kode_tugas FROM tabel2_tugas WHERE nim=O.nim)";
            $conn->query($query);

            $query = "UPDATE `coass_olah2_test` O SET O.kode_tugas2=(SELECT kode_tugas2 FROM tabel2_tugas2 WHERE nim=O.nim)";
            $conn->query($query);

            $query = "UPDATE `coass_olah2_test` O SET O.kode_tugas3=(SELECT kode_tugas3 FROM tabel2_tugas3 WHERE nim=O.nim)";
            $conn->query($query);

            $query = "UPDATE `coass_olah2_test` O SET O.kode_tugas4=(SELECT kode_tugas4 FROM tabel2_tugas4 WHERE nim=O.nim)";
            $conn->query($query);

            $query = "UPDATE `coass_olah2_test` O SET O.`1`=(SELECT `1` FROM kode2_stase WHERE kode=O.kode_tugas)";
            $conn->query($query);
            $query = "UPDATE `coass_olah2_test` O SET O.`2`=(SELECT `2` FROM kode2_stase WHERE kode=O.kode_tugas)";
            $conn->query($query);
            $query = "UPDATE `coass_olah2_test` O SET O.`3`=(SELECT `3` FROM kode2_stase WHERE kode=O.kode_tugas)";
            $conn->query($query);
            $query = "UPDATE `coass_olah2_test` O SET O.`4`=(SELECT `4` FROM kode2_stase WHERE kode=O.kode_tugas2)";
            $conn->query($query);
            $query = "UPDATE `coass_olah2_test` O SET O.`5`=(SELECT `5` FROM kode2_stase WHERE kode=O.kode_tugas2)";
            $conn->query($query);
            $query = "UPDATE `coass_olah2_test` O SET O.`6`=(SELECT `6` FROM kode2_stase WHERE kode=O.kode_tugas2)";
            $conn->query($query);
            $query = "UPDATE `coass_olah2_test` O SET O.`7`=(SELECT `7` FROM kode2_stase WHERE kode=O.kode_tugas3)";
            $conn->query($query);
            $query = "UPDATE `coass_olah2_test` O SET O.`8`=(SELECT `8` FROM kode2_stase WHERE kode=O.kode_tugas3)";
            $conn->query($query);
            $query = "UPDATE `coass_olah2_test` O SET O.`9`=(SELECT `9` FROM kode2_stase WHERE kode=O.kode_tugas3)";
            $conn->query($query);
            $query = "UPDATE `coass_olah2_test` O SET O.`10`=(SELECT `10` FROM kode2_stase WHERE kode=O.kode_tugas4)";
            $conn->query($query);
            $query = "UPDATE `coass_olah2_test` O SET O.`11`=(SELECT `11` FROM kode2_stase WHERE kode=O.kode_tugas4)";
            $conn->query($query);
            $query = "UPDATE `coass_olah2_test` O SET O.`12`=(SELECT `12` FROM kode2_stase WHERE kode=O.kode_tugas4)";
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

    function builduptahap2()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        for ($i = 1; $i <= 12; $i++) {
            $sql = "insert into coass_olah_2(nim, id_stase,id_minggu) select nim, `$i`, $i from coass_olah2_test where (`$i`<>null or `$i`<>0);";
            $result = $conn->query($sql);
            echo "$sql <br />";
        }
    }

    function updateCoassOlah2()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $conn->autocommit(false); // Memulai transaksi
        try {
            $query = "UPDATE `coass_olah_2` O SET O.`id_mhs`=(select id from coass_mhs2 where nim=O.nim)";
            $conn->query($query);
            $query = "UPDATE `coass_olah_2` O SET O.`id_mk`=(select id_mk from coass_stase_2 where id=O.id_stase)";
            $conn->query($query);
            $query = "UPDATE `coass_olah_2` O SET O.`lama`=(select hari from coass_stase_2 where id=O.id_stase)";
            $conn->query($query);
            $query = "UPDATE `coass_olah_2` O SET O.`tanggal_mulai`=(select tanggal from coass_tanggal_2 where id=O.id_minggu)";
            $conn->query($query);
            $query = "UPDATE `coass_olah_2` O SET `tanggal_akhir`=(SELECT DATE_ADD(tanggal_mulai, INTERVAL lama-1 day))";
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

    function deleteTable2()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $conn->autocommit(false); // Memulai transaksi
        try {
            $query = "DELETE FROM coass_mhs2";
            $conn->query($query);
            $query = "DELETE FROM coass_olah_2";
            $conn->query($query);
            $query = "DELETE FROM coass_olah2_test";
            $conn->query($query);
            $query = "DELETE FROM tabel2_tugas";
            $conn->query($query);
            $query = "DELETE FROM tabel2_tugas2";
            $conn->query($query);
            $query = "DELETE FROM tabel2_tugas3";
            $conn->query($query);
            $query = "DELETE FROM tabel2_tugas4";
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
