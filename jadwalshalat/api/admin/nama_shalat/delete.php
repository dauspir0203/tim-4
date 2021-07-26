<?php

include "../../../config/koneksi.php";

$nisn = @$_POST["id_nama"];

$query = mysqli_query($kon, "DELETE FROM `nama_shalat` WHERE `id_nama`='".$id_nama."'");


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

