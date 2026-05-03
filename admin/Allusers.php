<?php
include("../database.php");

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

if(!$result){
    die("Erreur SQL : " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="users.css">
</head>
<body>

<header>
    <h1>👤 Liste des utilisateurs</h1>
</header>

<div class="container">

<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Gmail</th>
    </tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

    <tr>
        <td><?= $row["id"] ?></td>
        <td><?= $row["nom"] ?></td>
        <td><?= $row["gmail"] ?></td>
    </tr>

<?php } ?>

</table>

</div>

</body>
</html>
