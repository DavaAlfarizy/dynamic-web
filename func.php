<?php
$server = mysqli_connect ("localhost","root","","latihan_xpplg");
function select($query){
    global $conn;              
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }return $rows;
}function ubah($query){
    global $conn;

    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $rombel = $_POST["rombel"];
    $rayon = $_POST["rayon"];
    $gambar = $_POST["gambar"];


    $result ="  UPDATE 4latihan SET
                Nama = '$nama',
                Rombel = '$rombel',
                Rayon = '$rayon',
                gambar = '$gambar'
                WHERE id = $id ";

    mysqli_query($conn, $result);
    return mysqli_affected_rows($conn);
}
?>