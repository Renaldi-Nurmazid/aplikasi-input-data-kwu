<?php
    if ( isset($_GET["kodebarang"]) ){
        $kodebarang = $_GET["kodebarang"];
        $check_kodebarang = "SELECT * FROM transaksi WHERE kodebarang = '$kodebarang';";
        include('./kwu_config.php');
        $querry = mysqli_query($mysqli, $check_kodebarang);
        $row = mysqli_fetch_array($querry);
    }
?>
<div class="container">
<h1>Edit Data</h1>
<form action="kwu-edit.php" method="POST">
    <label for="kodebarang"> KODE BARANG :</label>
    <input class="form-control" value="<?php echo $row["kodebarang"]; ?>" readonly type="number" name="kodebarang" placeholder="Ex. 12001142" /><br>

    <label for="tanggal"> TANGGAL :</label>
    <input class="form-control" value="<?php echo $row["tanggal"]; ?>" type="date" name="tanggal" /><br>

    <label for="pembeli"> PEMBELI :</label>
    <input class="form-control" value="<?php echo $row["pembeli"]; ?>" type="text" name="pembeli" placeholder=" Ex. DAVID" /><br>

    <label for="namabarang"> NAMA BARANG :</label>
    <input class="form-control" value="<?php echo $row["namabarang"]; ?>" type="text" name="namabarang" /><br>

    <label for="qty"> QTY :</label>
    <input class="form-control" value="<?php echo $row["qty"]; ?>" type="number" name="qty" placeholder="RP 180000" /><br>

    <label for="hargabeli"> HARGA BELI :</label>
    <input class="form-control" value="<?php echo $row["hargabeli"]; ?>" type="number" name="hargabeli" placeholder="RP 180000" /><br>

    <label for="hargajual"> HARGA JUAL :</label>
    <input class="form-control" value="<?php echo $row["hargajual"]; ?>" type="number" name="hargajual" placeholder="RP 180000" /><br>


    <input class="btn btn-sm btn-success" type="submit" name="simpan" value="Simpan Data" />
    <a class="btn btn-sm btn-primary" href="kwu.php">kembali</a>
</form>
<?php
    if ( isset($_POST["simpan"])) {
        $kodebarang = $_POST["kodebarang"];
        $tanggal = $_POST["tanggal"];
        $pembeli = $_POST["pembeli"];
        $namabarang = $_POST["namabarang"];
        $qty = $_POST["qty"];
        $hargabeli = $_POST["hargabeli"];
        $hargajual = $_POST["hargajual"];

        //Edit - Memperbarui Data 
        $query ="
            UPDATE transaksi SET 
                tanggal = '$tanggal',
                pembeli = '$pembeli',
                namabarang = '$namabarang',
                qty = '$qty',
                hargabeli = '$hargabeli',
                hargajual = '$hargajual'
            WHERE kodebarang = '$kodebarang';
        ";
        include ('./kwu_config.php');
        $update = mysqli_query($mysqli, $query);

        if($update){
            echo "
                <script>
                    alert('Data Berhasil Diperbaharui');
                    window.location='kwu.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data Gagal diperbaharui');
                window.location='kwu-edit.php?kodebarang=$kodebarang';
            </script>
            ";
        }
    }
?>