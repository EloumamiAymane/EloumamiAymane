<?php

$conn = mysqli_connect('localhost', 'root', '', 'Stock');
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, " DELETE FROM fournisseur Where id= $id ");
    header("location:fournisseur.php");
};
