<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'Stock');
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $nmf = $_GET['NumFact'];
    mysqli_query($conn, " DELETE FROM facture Where idF= '$id' and NumFacture='$nmf'; ");

    header("location:entre.php");
};
