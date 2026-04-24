<?php
session_start();
include("database.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST["email"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM users WHERE gmail='$email' AND password='$pass'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        $_SESSION["user_id"] = $row["id"];
        $_SESSION["gmail"] = $row["gmail"];

        header("Location: user.html");
        exit();

    } else {
        echo "Invalid email or password";
    }
}
?>
