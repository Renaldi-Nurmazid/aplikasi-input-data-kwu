<div class="container">
<h1 class="text-center">Form Daftar</h1>
<form action="registrasi.php" method="POST" class="w-50 mx-auto">
    <label>Akun ID</label><br/>
	<input class="form-control" type="text" name="akun_id" placeholder="Ex.1" readonly/>
    <br>
    <label>Nama Akun</label>
    <input class="form-control" type="text" name="nama" placeholder="Ex. ---" required/>
    <br>
    <label >Username</label><br>
    <input class="form-control" type="text" name="username" placeholder="Ex. renldnrmzd" required/>
    <br>
    <label>password</label><br>
    <input class="form-control" type="password" name="password" placeholder="Ex. ---" required/>
    <br>
    <label>Pilih Role :</label><br>
    <input type="radio" name="role" value="Admin" <?php if (isset($_POST['role']) && $_POST['role']=="Admin") echo "checked";?>> Admin<br>

    <input type="radio" name="role" value="teler" <?php if (isset($_POST['role']) && $_POST['role']=="teler")  echo "checked";?>> Teler<br>
    <a href="login.php"><p class="text-center" >Sudah punya akun</p></a>
    <input class="form-control btn btn-primary" type="submit" name="simpan" value="Submit" />
</form>

<?php
include("./kwu_config.php");
if(isset($_POST["simpan"]))
{
//deklarasi Variabel
 $akun_id = $_POST["akun_id"];
 $username = $_POST["username"];
 $password =md5($_POST["password"]);
 $nama = $_POST["nama"];
 $role = $_POST["role"];

 //membuat kode otomatis

 //CREATE -Menambahkan Data ke Database
 $query = "
 INSERT INTO akun VALUES 
 ('$akun_id','$username','$password','$nama','$role');";

 include ('./kwu_config.php');
 $insert = mysqli_query($mysqli, $query);

 if ($insert)
 {
    echo"
    <script>
         alert('Data berhasil ditambahkan');
         window.location='login.php';
    </script>";
 }
}