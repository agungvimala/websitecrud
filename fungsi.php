<?php
    include 'koneksi.php';

    function tambah_data($data){
        $nama_tamu = $data['nama_tamu'];
        $alamat = $data['alamat'];
        $email = $data['email'];
        $nomor_telepon = $data['nomor_telepon'];
        $pesan = $data['pesan'];

        $query = "INSERT INTO tb_tamu VALUES(null, '$nama_tamu', '$alamat', '$email', '$nomor_telepon', '$pesan');";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function ubah_data($data){
        $id_tamu = $data['id_tamu'];
        $nama_tamu = $data['nama_tamu'];
        $alamat = $data['alamat'];
        $email = $data['email'];
        $nomor_telepon = $data['nomor_telepon'];
        $pesan = $data['pesan'];

        $query = "UPDATE tb_tamu SET nama_tamu='$nama_tamu', alamat='$alamat', email='$email', nomor_telepon='$nomor_telepon', pesan='$pesan' WHERE id_tamu='$id_tamu';";

        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function hapus_data($data){
        $id_tamu = $data['hapus'];
        $query = "DELETE FROM tb_tamu WHERE id_tamu = '$id_tamu';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

?>