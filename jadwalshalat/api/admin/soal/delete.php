<?php

include "../../../config/koneksi.php";

$no_soal = @$_POST["no_soal"];

$query = mysqli_query($kon, "DELETE FROM `soal` WHERE `no_soal`='".$no_soal."'");
if($query){
    $status = true;
    $pesan = "data berhasil dihapus";
}else{
    $status = false;
    $pesan = "data gagal dihapus";
}

$json = [
    "status" => $status,
    "pesan" => $pesan,
    "data" => $query
];

header("Content-Type: application/json");
echo json_encode($json);

?>