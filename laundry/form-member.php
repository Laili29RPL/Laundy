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
    <title>Form Member</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-secondary">
                <h4 class="text-white">Form Member</h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id"])) {
                    include "connection.php";
                    $id = $_GET["id"];
                    $sql = "select * from member where id='$id'";
                    $hasil = mysqli_query($connect, $sql);
                    $member = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process-member.php" method="post"
                    onsubmit="return comfirm('Apakah anda yakin untuk mengubah data ini?')">
                    ID Member
                    <input type="text" name="id" 
                    class="form-control mb-2" required
                    value="<?=$member["id_member"];?>" />

                    Nama Member
                    <input type="text" name="nama" 
                    class="form-control mb-2" required
                    value="<?=$member["nama"];?>" />

                    Alamat Member
                    <input type="text" name="alamat" 
                    class="form-control mb-2" required
                    value="<?=$member["alamat"];?>" />

                    tlp
                    <input type="number" name="tlp" 
                    class="form-control mb-2" required
                    value="<?=$member["tlp"];?>"/>

                    Jenis Kelamin
                    <select name="jenis_kelamin" class="form-control mb-2" required>
                        <option value="<?=$member["jenis_kelamin"]?>" selected>
                           <?=$member["jenis_kelamin"]?>
                        </option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>

                    <button type="submit" class="btn btn-success btn-block"
                    name="edit_member">
                        Simpan
                    </button>
                    </form>
                    <?php
                }else{
                    // jika false, maka form member digunakan untuk insert
                    ?>
                    <form action="process-member.php" method="post">
                    ID Member
                    <input type="text" name="id_member" 
                    class="form-control mb-2" required />

                    Nama Member
                    <input type="text" name="nama" 
                    class="form-control mb-2" required />

                    Alamat Member
                    <input type="text" name="alamat" 
                    class="form-control mb-2" required />

                    tlp
                    <input type="text" name="tlp" 
                    class="form-control mb-2" required />

                    
                    Jenis Kelamin
                    <select name="jenis_kelamin" class="form-control mb-2" required>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>

                    <button type="submit" class="btn btn-success btn-block"
                    name="simpan_member">
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