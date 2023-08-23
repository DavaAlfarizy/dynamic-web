
<?php
session_start();
if(!isset($_SESSION["uname"])){
    header("location: login.php");
}

// if($_SESSION['uname'] == ''){
//     header("location: final.php");
// }


$server = mysqli_connect ("localhost","root","","latihan_xpplg");

$sql = "SELECT * FROM data_siswa";

$query = mysqli_query($server, $sql);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Result</title>

<style>
    body{
background-image: url(bg.jpeg) ;
background-repeat:no-repeat ;
background-size: 1600px ;


}

img{
    margin-bottom:50px ;
    border: solid 5px ;
}

h1{
    color:  #439A97 ;
}

table{
    border-radius: 5px;
}
.btn{
    background-color: #474E68;
    color: #439A97;
    padding: 10px;
    border-radius: 5px;
    float: left;
    color: aliceblue;
}
.btnn{
    background-color: #474E68;
    color: #439A97;
    padding: 10px;
    border-radius: 5px;
    float: right  ;
    color: aliceblue;
}
<?php foreach($query as $show):?>
</style>

</head>
<body>
    <center>

<h1> Wellcome, <?= $show["Nama"] ?>
</h1>
<br>
<hr>
<br>
    

            <h1>PROFILE</h1>
            
<br>
<br>

    <table = border="0">
    <center><img src="gambar/<?=$show["Gambar"];?>" alt="" width="250px" height="250px" style="border-radius:190px  ;"  ></center>

        <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $show["Nama"]?></td>
        </tr>
        <tr>
            <td>Nis</td>
            <td>:</td>
            <td><?= $show["Nis"]?></td>
        </tr>
        <tr>
            <td>Rayon</td>
            <td>:</td>
            <td><?= $show["Rayon"]?></td>
        </tr>
        <tr>
            <td>Rombel</td>
            <td>:</td>
            <td><?= $show["Rombel"]?></td>
        </tr>
        <tr>
            <td>Usia</td>
            <td>:</td>
            <td><?= $show["Umur"]?></td>
        </tr>
    </table>
    <?php endforeach;?>
<div class="button" >
    
<a class="btn" href="logout.php">logout</a>
<a class="btnn" href="update.php?id=<?=$show['id'] ?> ">update bang</a>
</div>
    </center>
</body>
</html>