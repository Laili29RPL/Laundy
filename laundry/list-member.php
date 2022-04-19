<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>List member</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white text-center">
                    Daftar member
                </h4>
            </div>

            <div class="card-body">
                <form action="list-member.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-2" placeholder="Pencarian" />
                </form>

                <ul class="list-group">
                    <?php
                    include "connection.php";
                    if (isset($_GET["search"])) {
                        $search = $_GET["search"];
                        $sql = "select * from member
                        where nama_member like '%$search%'
                        or tlp like '%$search%'
                        or alamat like '%$search%'";
                    } else {
                        $sql =" select * from member";
                    }

                    $hasil = mysqli_query($connect, $sql);
                    while ($member = mysqli_fetch_array($hasil)) {
                        ?>
                        <li class="list-group-item mb-2">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h4>
                                       ID: <?=($member["id_member"])?>
                                    </h4>
                                    <h5>
                                       Nama: <?=($member["nama"])?>
                                    </h5>
                                    <h6>Jenis Kelamin: <?=($member["jenis_kelamin"])?></h6>
                                    <h6>Tlp: <?=($member["tlp"])?></h6>
                                    <h6>Alamat: <?=($member["alamat"])?></h6>
                                </div>
                                <div class="col-lg-3">
                                <a href="form-member.php?id_member=<?php echo $member["id_member"];?>">
                                        <button class="btn btn-info btn-block mb-2">
                                            Edit
                                        </button>
                                </a>

                                </a>
                                
                                    <a href="delete.php?id_member=<?=$member["id_member"]?>"
                                    onClick="return confirm('Apakah Anda Yakin?')">

                                <button class="btn btn-block btn-danger">
                                    Hapus
                                </button>
                                </a>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    
                </ul>

                <!-- button tambah data -->
                <a href="form-member.php">
                    <button class="btn btn-success">
                        Tambah Data member                  
                     </button>
                </a>

                <a href="home.php">
                    <button class="btn btn-warning">
                        Back to home
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>