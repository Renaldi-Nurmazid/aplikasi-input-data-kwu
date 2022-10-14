<div class="container">
<h1>Tambah Data</h1>
<form action="kwu-tambah.php" method="POST">
    <label for="kodebarang">KODE BARANG : </label>
    <input class="form-control" type="number" name="kodebarang" placeholder="EX. 123456789" /><br>

    <label for="tanggal">TANGGAL :</label>
    <input class="form-control" type="date" name="tanggal" /><br>


    <label for="pembeli">PEMBELI :</label>
    <input class="form-control" type="text" name="pembeli" placeholder=" Ex . DAVID LUTPI" /><br>


    <label for="namabarang">NAMA BARANG :</label>
    <input class="form-control" type="text" name="namabarang" placeholder=" BENGBENG " /><br>

    <label for="qty">QTY :</label>
    <input class="form-control" type="number" name="qty" placeholder=" Rp 180000 " /><br>
    
    <label for="hargabeli">HARGA BELI :</label>
    <input class="form-control" type="number" name="hargabeli" placeholder=" Rp 180000 " /><br>
    
    <label for="hargajual">HARGA JUAL :</label>
    <input class="form-control" type="number" name="hargajual" placeholder="Rp 180000 " /><br>

    <input class='btn btn-sm btn-success' type="submit" name="simpan" value="Simpan Data" />
    <input class='btn btn-sm btn-secondary' type="reset" name="reset" value="Reset Input" />
    <a class="btn btn-sm btn-primary" href="kwu.php">Kembali</a>
</form>
<?php
 include('./kwu_config.php');
 if ( $_SESSION["login"] != TRUE) {
     header('location:login.php');
 }
  if ( $_SESSION["role"] != "admin" ) {
    echo "
    <script>
        alert('Akses tidak diberikan, Kamu Bukan Admin');
        window.location='kwu.php';
    </script>
    ";
  }
  
  //Process
if(isset($_POST["simpan"]))
{
//deklarasi Variabel
 $kodebarang = $_POST["kodebarang"];
 $tanggal = $_POST["tanggal"];
 $pembeli = $_POST["pembeli"];
 $namabarang = $_POST["namabarang"];
 $qty = $_POST["qty"];
 $hargabeli = $_POST["hargabeli"];
 $hargajual = $_POST["hargajual"];
 //CREATE -Menambahkan Data ke Database
 $query = "
 INSERT INTO transaksi VALUES 
 ('$kodebarang','$tanggal','$pembeli','$namabarang','$qty','$hargabeli','$hargajual');";

 include ('./kwu_config.php');
 $insert = mysqli_query($mysqli, $query);

 if ($insert)
 {
    echo"
    <script>
         alert('Data berhasil ditambahkan');
         window.location='kwu.php';
    </script>";
 }
}
?>