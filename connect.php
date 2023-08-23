<?php
session_start();

if(isset($_SESSION["uname"])){
    header("location: final.php");
    exit;
}

$server = mysqli_connect("localhost", "root", "", "account");

$uname = $_POST['uname'];
$pass = $_POST['password'];

$sql = "SELECT * FROM acc WHERE Username = '$uname'" ;
$result = mysqli_query($server, $sql);
$sql2 = "SELECT * FROM acc WHERE Password = '$pass'" ;
$result2 = mysqli_query($server, $sql2);


if(mysqli_num_rows($result) > 0 && mysqli_num_rows($result2) > 0) {
    $_SESSION['uname'] = $uname ;
    echo "<script>
    alert ('Login succesful !');
    document.location.href = 'final.php';
    </script>";

} else if (mysqli_num_rows($result)==0){
    echo "<script>
    alert ('incorrect username!');
    document.location.href = 'login.php';
    </script>";
}
else if(mysqli_num_rows($result2)==0){
    echo "<script>
    alert ('incorrect Password!');
    document.location.href = 'login.php';
    </script>";
}



?>