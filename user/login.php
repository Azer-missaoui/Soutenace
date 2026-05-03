<?php
session_start();
include("../database.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST["email"];
    $pass = $_POST["password"];

    
    $sql = "SELECT * FROM user WHERE gmail='$email' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    if(!$result){
        die("Erreur SQL: " . mysqli_error($conn));
    }

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        // 🔐 session user
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["user_name"] = $row["nom"]; // 👈 important

        header("Location: user.php");
        exit();

    } else {
        echo "❌ Email ou mot de passe incorrect";
    }
}
?>
