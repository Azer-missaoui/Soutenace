<?php
session_start();

// 🔐 vérifier login
if(!isset($_SESSION["user_name"])){
    header("Location: login.php");
    exit();
}

$username = $_SESSION["user_name"];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Home</title>
<link rel="stylesheet" href="user.css">
</head>

<body>

<nav>
    <h1>MyShop</h1>

    <!-- 👤 AFFICHAGE USER -->
    <div class="user">👤 <?= $username ?></div>
</nav>

<section class="hero">
    <h2>Bienvenue <?= $username ?> 👋</h2>
    <p>Gérez vos commandes et votre profil facilement</p>
</section>

<section class="dashboard">

    <div class="card">
        <h3>🛒 Mes commandes</h3>
        <a href="commande.php"><button>Voir</button></a>
    </div>

    <div class="card">
        <h3>❤️ Favoris</h3>
        <p>Vos produits préférés</p>
        <button>Voir</button>
    </div>

    <div class="card">
        <h3>📦 Produits</h3>
        <a href="produit.html"><button>Voir</button></a>
    </div>

    <div class="card">
        <h3>⚙️ Paramètres</h3>
        <a href="Monrprofil.php"><button >Ouvrir</button></a>
    </div>

</section>

</body>
</html>
