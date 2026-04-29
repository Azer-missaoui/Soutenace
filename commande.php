<?php
session_start();
include("database.php");

if(!isset($_SESSION["user_id"])){
    die("Utilisateur non connecté");
}

$iduser = $_SESSION["user_id"];

$sql = "
SELECT 
    commande.id AS idcmd,
    produits.nom,
    produits.prix
FROM commande
JOIN produits ON commande.idproduit = produits.id
WHERE commande.iduser = $iduser
";

$result = mysqli_query($conn, $sql);

if(!$result){
    die("Erreur SQL : " . mysqli_error($conn));
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes commandes</title>
    <link rel="stylesheet" href="commande.css">
</head>
<body>

<header>
    <h1>🛒 Mes commandes</h1>
</header>

<div class="container">

<table>
    <tr>
        <th>ID</th>
        <th>Produit</th>
        <th>Prix</th>
        <th>Action</th>
    </tr>

<?php if(mysqli_num_rows($result) > 0): ?>

    <?php while($row = mysqli_fetch_assoc($result)): ?>

        <?php $total += $row["prix"]; ?>

        <tr>
            <td><?= $row["idcmd"] ?></td>
            <td><?= $row["nom"] ?></td>
            <td><?= $row["prix"] ?> TND</td>

            <td>
                <form method="POST" action="deleteCommande.php">
                    <input type="hidden" name="idcmd" value="<?= $row["idcmd"] ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>

    <?php endwhile; ?>

    <tr style="background:#f1f1f1;font-weight:bold;">
        <td colspan="2">Total</td>
        <td colspan="2"><?= $total ?> TND</td>
    </tr>

<?php else: ?>

    <tr>
        <td colspan="4">Aucune commande trouvée</td>
    </tr>

<?php endif; ?>

</table>

</div>

</body>
</html>
