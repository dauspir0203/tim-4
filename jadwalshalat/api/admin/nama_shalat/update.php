<?php

include "../../../config/koneksi.php";

$id_daerah= @$_POST["id_daerah"];
$nama_shalat = @$_POST["nama_shalat"];
$waktu_shalat = @$_POST["waktu_shalat"];

$query = mysqli_query($kon, "UPDATE `nama_shalat` SET `id_daerah`='".$id_daerah."',
`nama_shalat`='".$nama_shalat."',`waktu_shalat`='". $waktu_shalat ."'
WHERE `id_nama`='".$id_nama."'");


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