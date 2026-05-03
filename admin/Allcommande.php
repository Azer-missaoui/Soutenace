<?php
include("../database.php");

$sql = "
SELECT 
    commande.id AS idcmd,
    user.gmail,
    produits.nom,
    produits.prix
FROM commande
JOIN user ON commande.iduser = user.id
JOIN produits ON commande.idproduit = produits.id
";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Commandes Admin</title>
<link rel="stylesheet" href="../commande.css">
</head>
<body>

<header>
    <h1>📦 Toutes les commandes</h1>
</header>

<div class="container">

<table>
    <tr>
        <th>ID Commande</th>
        <th>User</th>
        <th>Produit</th>
        <th>Prix</th>
    </tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
    <td><?= $row["idcmd"] ?></td>
    <td><?= $row["gmail"] ?></td>
    <td><?= $row["nom"] ?></td>
    <td><?= $row["prix"] ?> TND</td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>
