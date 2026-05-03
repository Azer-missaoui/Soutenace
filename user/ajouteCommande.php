<?php
session_start();
include("../database.php");


if(!isset($_SESSION["user_id"])){
    die("Utilisateur non connecté");
}

$iduser = $_SESSION["user_id"];
$idproduit = $_POST["idproduit"];

$sql = "INSERT INTO commande (iduser, idproduit)
        VALUES ($iduser, $idproduit)";

if(mysqli_query($conn, $sql)){
    echo "Produit ajouté avec succès";
} else {
    echo "Erreur";
}
?>
