<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'Stock');
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $fact = $_GET['NumFact'];
    mysqli_query($conn, " DELETE FROM facturesortie Where idclt= $id and idFClt='$fact' ");
    header("location:sortie.php");
}
