<?php
session_start();
# jika saat load halaman ini, pastikan telah login sbg user
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Form User </title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-secondary">
                <h4 class="text-white">Form User</h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id_user"])){                                
                    
                    //memeriksa ketersediaan variabel
                    # mengakses data user dari id_user yg dikirim
                    include "connection.php";
                    $id_user = $_GET["id_user"];
                    $sql = "select * from user where id_user='$id_user'";
                    // eksekusi perintah SQL/melakukan query pada database
                    $hasil = mysqli_query($connect, $sql);
                    # konversi hasil query ke bentuk array/mengambil data mysql
                    $user = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process-user.php" method="post"
                    onsubmit="return confirm ('Are u sure want to edit this?')">

                    ID User
                    <input type="text" name="id_user" 
                    class="form-control mb-2" required
                    value="<?=$user["id_user"];?>" readonly />

                    Nama user
                    <input type="text" name="nama_user" 
                    class="form-control mb-2" required
                    value="<?=$user["nama_user"];?>" />

                    Username
                    <input type="text" name="username" 
                    class="form-control mb-2" required
                    value="<?=$user["username"];?>" />

                    Password
                    <input type="password" name="password" 
                    class="form-control mb-2" />

                    Role
                    <select name="role" class="form-control mb-2" required>
                        <option value="<?=$user["Role"]?>" selected>
                           <?=$user["role"]?>
                        </option>
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                    </select>

                    <button type="submit" class="btn btn-secondary btn-block"
                    name="edit_user">
                        Simpan
                    </button>
                    </form>
                    <?php
                }else{
                    // jika false, maka form petugas digunakan untuk insert
                    ?>
                    <form action="process-user.php" method="post">
                    ID User
                    <input type="text" name="id_user" 
                    class="form-control mb-2" required />

                    Nama User
                    <input type="text" name="nama_user" 
                    class="form-control mb-2" required/>

                    Username
                    <input type="text" name="username" 
                    class="form-control mb-2" required />

                    Password
                    <input type="password" name="password" 
                    class="form-control mb-2"  />

                    Role
                    <select name="role" class="form-control mb-2" required>
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                    </select>

                    <button type="submit" class="btn btn-secondary btn-block"
                    name="simpan_user">
                        Simpan
                    </button>
                    </form>
                    <?php
                }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>