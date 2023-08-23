<?php 

session_start();
if (!isset($_SESSION["uname"])) {
header("Location: login.php");
exit;
}
$con =mysqli_connect("localhost","root","","latihan_xpplg");

// ambil data dari url
$id = $_GET["id"];
$assoc=mysqli_query($con,"SELECT * FROM data_siswa WHERE id = $id");
$mhs=mysqli_fetch_assoc($assoc);

if (isset($_POST["ganti"])) {

global $con;
$gambarLama=$_POST["GambarLama"];
$gambar=$_FILES["Gambar"]["name"];
$gambar_tmp=$_FILES["Gambar"]["tmp_name"];
$gambar_error=$_FILES["Gambar"]["error"];

move_uploaded_file($gambar_tmp,'gambar/'.$gambar);

global $id;
$nama =$_POST["Nama"];
$nis =$_POST["Nis"];
$rayon =$_POST["Rayon"];
$rombel =$_POST["Rombel"];

if ($gambar_error===4) {
  $gambar=$gambarLama;
}

$query = "UPDATE data_siswa SET 

Nama='$nama',
Gambar ='$gambar',
Nis='$nis',
Rayon='$rayon',
Rombel='$rombel'

WHERE id ='$id'";

mysqli_query($con,$query) or  die(mysqli_error($con));

if (mysqli_affected_rows($con)==1) {
  echo "<script>alert('berhasil Mengganti')
  document.location.href='final.php'</script>";


}else{
  echo "<script>alert('Anda tidak mengubah apapun')
  </script>";
  
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="ubah.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update ur data.</title>
</head>
<body>
<center>
  <form action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="GambarLama" value="<?=$mhs["Gambar"];?>">
<ul>

<input  type="text"  class="form-control" name="Nama" id="Nama" value="<?=$mhs["Nama"] ?>" required autocomplete="off"></br>
<input type="text" class="form-control" name="Nis" id="Nis" value="<?=$mhs["Nis"] ?>" required autocomplete="off"></br>
<input type="text"  class="form-control" name="Rayon" id="Rayon" value="<?=$mhs["Rayon"] ?>" required autocomplete="off"></br>
<input type="text"  class="form-control" name="Rombel" id="Rombel" value="<?=$mhs["Rombel"] ?>" required ></br>
<img src="gambar/<?=$mhs["Gambar"];?>" class="poto" alt="" width="150px" height="150px" style="margin-left:   250px;" ></br>
<input type="file" name="Gambar" class="form-control"></br>
<button type="submit" name="ganti" class="btn btn-danger">Submit</button>
</ul>
</center>




  </form>
</body>
</html>