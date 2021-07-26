<?php

include "../../../config/koneksi.php";

$id_daerah = @$_POST["id_daerah"];
$nama_shalat = @$_POST["nama_shalat"];
$waktu_shalat = @$_POST["waktu_shalat"];


$query = mysqli_query ($kon, "INSERT INTO `nama_shalat`(`id_daerah`, `nama_shalat`, `waktu_shalat`)
 VALUES ('".$id_daerah."', '".$nama_shalat."' , '".$waktu_shalat."')");




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