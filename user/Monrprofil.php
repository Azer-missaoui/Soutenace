<?php
session_start();
include("../database.php");

if(!isset($_SESSION["user_id"])){
    header("Location: login.php");
    exit();
}

$iduser = $_SESSION["user_id"];

$sql = "SELECT * FROM user WHERE id=$iduser";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paramètres</title>
    <link rel="stylesheet" href="MonProfil.css">
</head>
<body>

<header>
    <h1>⚙️ Paramètres du compte</h1>
</header>

<div class="container">

    <div class="card">
        <h2>👤 Informations utilisateur</h2>

        <p><strong>ID :</strong> <?= $user["id"] ?></p>
        <p><strong>Nom :</strong> <?= $user["nom"] ?></p>
        <p><strong>Email :</strong> <?= $user["gmail"] ?></p>
    </div>

    <div class="card">
        <h2>⚙️ Actions</h2>

        <a href="logout.php">
            <button class="logout">Déconnexion</button>
        </a>

        <button class="edit">Modifier profil</button>
    </div>

</div>

</body>
</html>
