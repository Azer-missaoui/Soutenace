<?php
include("../database.php");

/* 🔍 récupérer messages + user */
$sql = "
SELECT 
    messages.id AS idmsg,
    messages.msg,
    user.id AS iduser,
    user.nom,
    user.gmail
FROM messages
JOIN user ON messages.iduser = user.id
ORDER BY messages.id DESC
";

$result = mysqli_query($conn, $sql);

if(!$result){
    die("Erreur SQL : " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Messages</title>
    <link rel="stylesheet" href="messages.css">
</head>
<body>

<header>
    <h1>📩 Messages des utilisateurs</h1>
</header>

<div class="container">

<table>
    <tr>
        <th>ID Message</th>
        <th>Utilisateur</th>
        <th>Email</th>
        <th>Message</th>
    </tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

    <tr>
        <td><?= $row["idmsg"] ?></td>
        <td><?= $row["nom"] ?></td>
        <td><?= $row["gmail"] ?></td>
        <td><?= $row["msg"] ?></td>
    </tr>

<?php } ?>

</table>

</div>

</body>
</html>
