<?php

include "../../../config/koneksi.php";

$id_soal = @$_POST["id_soal"];
$no_soal = @$_POST["no_soal"];
$pertanyaan= @$_POST["pertanyaan"];
$pilihan_a = @$_POST["pilihan_a"];
$pilihan_b = @$_POST["pilihan_b"];
$pilihan_c = @$_POST["pilihan_c"];
$pilihan_d = @$_POST["pilihan_d"];
$pilihan_e = @$_POST["pilihan_e"];
$kunci = @$_POST["kunci"];
$skor = @$_POST["skor"];

$query = mysqli_query ($kon, "INSERT INTO `soal`(`id_soal`, `no_soal`, `pertanyaan`,  `pilihan_a`, 
`pilihan_b`, `pilihan_c`, `pilihan_d`, `pilihan_e`, `kunci`, `skor`) VALUES ('".$id_soal."', '".$no_soal."', 
'".$pertanyaan."','".$pilihan_a."','".$pilihan_b."', '".$pilihan_c."', 
'".$pilihan_d."', '".$pilihan_e."' , '".$kunci."', '".$skor."')");

if($query){
    $status = true;
    $pesan = "data berhasil disimpan";
}else{
    $status = false;
    $pesan = "data gagal disimpan";
}

$json = [
    "status" => $status,
    "pesan" => $pesan,
    "data" => $query
];

header("Content-Type: application/json");
echo json_encode($json);

?>