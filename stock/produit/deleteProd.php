<?php

$conn = mysqli_connect('localhost', 'root', '', 'Stock');
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, " DELETE FROM produit Where id= $id ");
    header("location:produits.php");
};
