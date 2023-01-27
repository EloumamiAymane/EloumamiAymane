<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'Stock');
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $id1 = $_SESSION['id'];


    //mysqli_query($conn, " UPDATE  produit SET QTE_Stock=QTE_Stock+$qte Where produit.id=  $idprod ");
    mysqli_query($conn, " DELETE FROM sortie Where sortie.idSor= $id ");
    header("location:suiviVente.php?clt=$id1");
};
