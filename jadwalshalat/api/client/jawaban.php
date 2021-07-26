<?php

include "../../config/koneksi.php";

$token = @$_POST['token'];
$id_soal = @$_POST['id_soal'];
$jawaban = @$_POST['jawaban'];

// cek user

$cekuser = mysqli_fetch_row(mysqli_query($kon, "SELECT * FROM `peserta`
 WHERE `token` = '".$token."'")); 

if($cekuser > 0){
    $ceksoal = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM `soal`
     WHERE id_soal = '".$id_soal."'"));

    if($jawaban = $ceksoal){
        $kondisi = "benar";
        $skor = $ceksoal['skor'];
    }else{
        $kondisi = "salah";
        $skor = 0;
    }

    $cekjawaban = mysqli_fetch_row(mysqli_query($kon, "SELECT * FROM `jawab_peserta`
     WHERE `id_soal` = '".$id_soal."' && `nisn` = '". $cekuser[0] ."'"));

    if($cekjawaban > 0){
        $query = mysqli_query($kon, "UPDATE `jawab_peserta`
         SET `jawaban`='".$jawaban."',`kondisi`='".$kondisi."',
         `skor`='".$skor."'
          WHERE `id_jawaban`='". $cekjawaban[0] ."'");
    }else{
        $query = mysqli_query($kon, "INSERT INTO `jawab_peserta`
        (`nisn`, 
        `id_soal`, 
        `jawaban`, 
        `kondisi`, 
        `skor`) 
        VALUES 
        ('".$cekuser[0]."',
        '".$id_soal."',
        '".$jawaban."',
        '".$kondisi."',
        '".$skor."')");
    }
    
    if($query){
        $status = true;
        $pesan = "data Oke";
    }else{
        $status = false;
        $pesan = "data error";
    }
}else{
    $status = false;
    $pesan = "token tidak dikenali";
}

$json = [
    "status" => $status,
    "pesan" => $pesan,
];

header("Content-Type: application/json");
echo json_encode($json);

?>
