<?php
include("../database.php");

$message = "";

/* ➕ AJOUT */
if(isset($_POST["ajouter"])){
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $descr = $_POST["descr"];
    $image = $_POST["image"];

    $sql = "INSERT INTO produits (nom,  descr,prix, img)
            VALUES ('$nom', '$descr', '$prix', '$image')";

    if(mysqli_query($conn, $sql)){
        $message = "✔ Produit ajouté avec succès";
    }
}

/* ✏️ MODIFIER */
if(isset($_POST["modifier"])){
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $descr = $_POST["descr"];

    $sql = "UPDATE produits 
            SET nom='$nom', prix='$prix', descr='$descr'
            WHERE id=$id";

    if(mysqli_query($conn, $sql)){
        $message = "✔ Produit modifié avec succès";
    }
}

/* ❌ SUPPRIMER */
if(isset($_POST["supprimer"])){
    $id = $_POST["id"];

    $sql = "DELETE FROM produits WHERE id=$id";

    if(mysqli_query($conn, $sql)){
        $message = "✔ Produit supprimé avec succès";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits</title>
    <link rel="stylesheet" href="ManuplerProduits.css">
</head>
<body>

<header>
    <h1>📦 Gestion Produits</h1>
</header>

<div class="container">

<!-- ⭐ MESSAGE -->
<?php if($message != ""): ?>
    <p class="msg"><?= $message ?></p>
<?php endif; ?>

<!-- ➕ AJOUT -->
<div class="card">
    <h2>Ajouter Produit</h2>

    <form method="POST">
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="text" name="prix" placeholder="Prix" required>
        <textarea name="descr" placeholder="Description" required></textarea>
        <input type="text" name="image" placeholder="Image">

        <button type="submit" name="ajouter">Ajouter</button>
    </form>
</div>

<!-- ✏️ MODIFIER -->
<div class="card">
    <h2>Modifier Produit</h2>

    <form method="POST">
        <input type="number" name="id" placeholder="ID produit" required>
        <input type="text" name="nom" placeholder="Nouveau nom">
        <input type="text" name="prix" placeholder="Nouveau prix">
        <textarea name="descr" placeholder="Nouvelle description"></textarea>

        <button type="submit" name="modifier">Modifier</button>
    </form>
</div>

<!-- ❌ SUPPRIMER -->
<div class="card">
    <h2>Supprimer Produit</h2>

    <form method="POST">
        <input type="number" name="id" placeholder="ID produit" required>

        <button type="submit" name="supprimer" style="background:red;">
            Supprimer
        </button>
    </form>
</div>




</div>

</body>
</html>
