<!DOCTYPE html>
<html>
    <head>
        <title>Data Buku</title>
    </head>
    <body>
        <center>
        <?php
            error_reporting(E_ALL ^ E_NOTICE);
            $conn = mysqli_connect("localhost","root","","informatika");
            
            $kodeLama = $_POST["kodeLama"];
            $kode = $_POST["kode_buku"];
            $nama = $_POST["nama_buku"];
            $jenis = $_POST["kode_jenis"];
            $namaJenis = $_POST["nama_jenis"];
            $ketJenis = $_POST["keterangan_jenis"];
            $Submit = $_POST["Submit"];
            $Ubah = $_POST["Ubah"];
            if ($Submit){
                if ($kode == ""){
                    echo "<h3>Kode tidak boleh kosong</h3>";
                } elseif ($nama == ""){
                    echo "<h3>Nama tidak boleh kosong</h3>";
                } elseif ($jenis == ""){
                    echo "<h3>Jenis tidak boleh kosong</h3>";
                } else{
                    $insert = "INSERT INTO buku (kode_buku, nama_buku, kode_jenis)
                                VALUES ('$kode','$nama','$jenis')
                            ";
                    mysqli_query($conn, $insert);
                    echo "<h3>Data Berhasil Dimasukkan</h3>";  
                }
            } elseif ($Ubah){
                if ($kode == ""){
                    echo "<h3>Kode tidak boleh kosong</h3>";
                } elseif ($nama == ""){
                    echo "<h3>Nama tidak boleh kosong</h3>";
                } elseif ($jenis == ""){
                    echo "<h3>Jenis tidak boleh kosong</h3>";
                } else{
                    $update = "UPDATE buku
                                SET kode_buku='$kode', nama_buku='$nama', kode_jenis='$jenis'
                                WHERE kode_buku='$kodeLama'
                            ";
                    mysqli_query($conn, $update);
                    echo "<h3>Data Berhasil Dimasukkan</h3>";  
            }
        }
            if ($_GET["hps"]) {
                $kode = $_GET["hps"]; 
                $hapus = "DELETE FROM buku WHERE kode_buku = '$kode'";
                mysqli_query($conn, $hapus);
                echo "<h3>Data berhasil di hapus</h3>";
        
       
            } elseif ($_GET["ubh"]) {
                $kode = $_GET["ubh"]; 
                $cari = "SELECT * FROM buku WHERE kode_buku='$kode'";
                $hasil = mysqli_query($conn, $cari);
                $dataBuku = mysqli_fetch_row($hasil); 
            }
        ?>
        <form method="POST" action="index.php">
            <table>
                <tr>
                    <td>Kode</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="kode_buku" value="<?php echo $dataBuku[0] ?>">
                        <input type="hidden" name="kodeLama" value="<?php echo $dataBuku[0] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="nama_buku" value="<?php echo $dataBuku[1] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td>:</td>
                    <td>
                        <select name="kode_jenis">
                        <?php
                                $sql = 'select*from jenis_buku';
                                $retval =  mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_array($retval)){
                                    echo "<option value='$row[kode_jenis]'>$row[nama_jenis]</option>";
                                }
                        ?>
                        </select>
                    </td>
                </tr>
            </table>
                    <?php
                            if($dataBuku){
                                echo "<input type='submit' name='Ubah' value='Ubah'>";
                            } else{
                                echo "<input type='submit' name='Submit' value='Submit'>";
                            }
                    ?>
        </form>

        <hr>

        <table border="1">
            <tr>
                <td>Kode</td>
                <td>Nama</td>
                <td>Keterangan</td>
                <td>Aksi</td>
            </tr>
            <?php
            $cari = "SELECT * FROM buku, jenis_buku 
                        WHERE buku.kode_jenis = jenis_buku.kode_jenis";
            $hasil = mysqli_query($conn, $cari);
            while ($data = mysqli_fetch_row($hasil)){
                echo "
                    <tr>
                        <td>$data[0]</td>
                        <td>$data[1]</td>
                        <td>$data[5]</td>
                        <td>
                            <a href='index.php?ubh=$data[0]'>Ubah</a>
                            <a href='index.php?hps=$data[0]'>Hapus</a>
                        </td>
                        </tr>";
            }
            ?>
        </table>

        </center>
    </body>
</html>