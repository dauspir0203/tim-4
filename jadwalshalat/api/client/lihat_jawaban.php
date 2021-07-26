<?php

include "../../config/koneksi.php";

$token = @$_POST['token'];

// 
$dataArray = [];

// cek user

$cekuser = mysqli_fetch_row(mysqli_query($kon, "SELECT * FROM `peserta`
 WHERE `token` = '".$token."'"));

if($cekuser > 0){
    $query = mysqli_query($kon, "SELECT kondisi,
     COUNT(kondisi) AS jumlah, SUM(skor) AS skor
      FROM `jawab_peserta`
       WHERE `nisn` = '".$cekuser[0]."'
        GROUP BY`kondisi`  ");
$dataArray = [];
    while($row = mysqli_fetch_assoc($query)){
        array_push($dataArray, $row);
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
    "data" => $dataArray
];

header("Content-Type: application/json");
echo json_encode($json);

?>