<?php
include("connection.php");

if (isset($_POST["simpan_member"])) {
    // tampung data input anggota dari user
    
    $id_member = $_POST["id_member"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tlp = $_POST["tlp"];

    //membuat perintah sql untuk insert data ke table anggota
    $sql = "insert into member values
    ('$id_member','$nama','$alamat','$tlp','$jenis_kelamin')";

    //eksekusi perintah sql
    

    //direct ke halaman list-anggota
    if (mysqli_query($connect, $sql)) {
        header('Location:list-member.php');
    } else {
        printf('Gagal'.mysqli_error($connect));
        exit();
    }

# untuk update

}else if(isset($_POST["edit_member"])){
        # menampung dulu data yang akan di update
        $id_member = $_POST["id_member"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $tlp = $_POST["tlp"];
        
        $sql = "update member set id_member='$id_member',
        nama='$nama', alamat='$alamat',
        tlp='$tlp', jenis_kelamin='$jenis_kelamin'
        where id_member='$id_member'";
        
        if (mysqli_query($connect, $sql)) {
            header('Location:list-member.php');
        } else {
            printf('Gagal'.mysqli_error($connect));
            exit();
        }
    } 

?>