<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's sign-up!</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #0E8388;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 40px;
            text-align: center;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            padding: 40px;
            margin: 0 auto;
        }

        input[type="text"],
        input[type="password"] {
            background-color: #f5f5f5;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
            padding: 12px;
            width: 100%;
            color: #333;
        }

        button[type="submit"] {
            background-color: #0E8388;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 12px;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #0D6C72;
        }
    </style>
</head>

<body>
    <center>
        <h1>SIGN-UP</h1>
        <form action="" method="post">
            <input type="text" name="usn" placeholder="Username" autocomplete="off"><br><br>
            <input type="password" name="pw" placeholder="Password"><br><br>
            <input type="password" name="pw2" placeholder="Confirm the Password"><br><br>
            <button type="submit" name="done">done</button>
        </form>
    </center>

</body>

</html>

<?php
$connect = mysqli_connect("localhost", "root", "", "account");
if (isset($_POST['done'])) {

    $user = $_POST['usn'];
    $pass = $_POST['pw'];
    $pass2 = $_POST['pw2'];

    $sql = "SELECT * FROM acc WHERE Username = '$user'";

    $result = mysqli_query($connect, $sql);


    if (mysqli_num_rows($result) > 0) {
        echo "<script> alert('username already used.')</script>";
        die;
    }
    if ($pass == $pass2) {
        $connect = mysqli_connect("localhost", "root", "", "account");
        mysqli_query($connect, "INSERT INTO acc VALUES ('$user','$pass')");
        header('location: login.php');
    } else {
        echo "<script> alert('password1 dan password2 berbeda')</script>";
    }

    //
};
?>