<?php
session_start();

// 🔐 protection admin
if(!isset($_SESSION["admin"])){
    header("Location: adminLogin.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<header>
    <h1>⚙️ Admin Dashboard</h1>

    <p>Bienvenue 👋 <?= $_SESSION["admin_name"] ?? "Admin" ?></p>
</header>

<div class="container">

    <div class="card">
        <h2>📦 Produits</h2>
        <p>Gérer les produits</p>
        <a href="ManuplerProduit.php"><button>Gérer</button></a>
    </div>

    <div class="card">
        <h2>🛒 Commandes</h2>
        <p>Voir toutes les commandes clients</p>
        <a href="Allcommande.php"><button>Voir</button></a>
    </div>

    <div class="card">
        <h2>👤 Utilisateurs</h2>
        <p>Liste des utilisateurs inscrits</p>
        <a href="Allusers.php"><button>Voir</button></a>
    </div>

    <div class="card">
        <h2>📩 Messages</h2>
        <p>Messages envoyés depuis contact</p>
        <a href="messages.php"><button>Ouvrir</button></a>
    </div>

    <div class="card logout">
        <h2>🚪 Déconnexion</h2>
        <a href="../logout.php"><button>Se déconnecter</button></a>
    </div>

</div>

</body>
</html>
