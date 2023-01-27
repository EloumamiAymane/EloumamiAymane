<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'Stock');
if (isset($_GET['delete'])) {
    $id = $_SESSION['delete'];
    $id1 = $_SESSION['id'];
    $qte = $_GET['delete'];
    $idprod = $_SESSION['idprd'];

    mysqli_query($conn, " DELETE FROM entree Where entree.idEnt= $id ");
    header("location:suiviAchat.php?fact=$id1");
};
