<?php

include "../../../config/koneksi.php";

$no_soal = @$_POST["no_soal"];
$pertanyaan= @$_POST["pertanyaan"];
$pilihan_a = @$_POST["pilihan_a"];
$pilihan_b = @$_POST["pilihan_b"];
$pilihan_c = @$_POST["pilihan_c"];
$pilihan_d = @$_POST["pilihan_d"];
$pilihan_e = @$_POST["pilihan_e"];
$kunci = @$_POST["kunci"];
$skor = @$_POST["skor"];


$query = mysqli_query($kon, "UPDATE `soal` SET `no_soal`='".$no_soal."',`pertanyaan`='".$pertanyaan."',
`pilihan_a`='". $pilihan_a ."',`pilihan_b`='". $pilihan_b ."',
`pilihan_c`='". $pilihan_c ."',`pilihan_d`='". $pilihan_d ."',
`pilihan_e`='". $pilihan_e ."',`kunci`='". $kunci ."',
`skor`='". $skor ."' WHERE `no_soal`='".$no_soal."'");


if($query){
    $status = true;
    $pesan = "data berhasil diedit";
}else{
    $status = false;
    $pesan = "data gagal diedit";
}

$json = [
    "status" => $status,
    "pesan" => $pesan,
    "data" => $query
];

header("Content-Type: application/json");
echo json_encode($json);

?>