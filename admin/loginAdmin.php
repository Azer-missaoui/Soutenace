<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];

    // 🔐 login admin fixe
    if($username === "admin" && $password === "admin"){

        // créer session admin
        $_SESSION["admin"] = true;
        $_SESSION["admin_name"] = "admin";

        // redirection vers page admin (IMPORTANT: PHP recommandé)
        header("Location: admin.php");
        exit();

    } else {

        echo "<h3 style='color:red;text-align:center;'>❌ Login ou mot de passe incorrect</h3>";
        echo "<div style='text-align:center;'><a href='adminLogin.html'>Retour</a></div>";
    }
}
?>
