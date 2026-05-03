<?php
include("../database.php");

if(isset($_POST["idcmd"])){

    $id = $_POST["idcmd"];

    $sql = "DELETE FROM commande WHERE id=$id";
    mysqli_query($conn, $sql);

    header("Location: commande.php");
    exit();
}
?>
