<?php
include "connectmysql.php";
$noujian = $_POST['noujian'];
//cek duplikasi nomor ujian
$cek = "select noujian from peserta where noujian='$noujian'";
$cek_q = mysql_query($cek);
$cek_r = mysql_fetch_array($cek_q);
if ($cek_r[0] <> "") {
    header("Location: list-peserta.php?pesan=NOMOR UJIAN YANG ANDA MASUKKAN SUDAH TERDAFTAR");
    exit;
}
$nama = $_POST['nama'];
$gel = $_POST['gel'];
$jurusan = $_POST['jurusan'];
//cari paket
$pak = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J");
$hp = rand(1, 9);
$paket = $pak[$hp];
$masuk = "insert into peserta values('$noujian','$nama','$gel','$jurusan','0','$paket')";
mysql_query($masuk);
header("Location: list-peserta.php?pesan=Data Berhasil di Simpan");
?>

