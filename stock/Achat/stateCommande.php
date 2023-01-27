
   
<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'Stock');
$quantiter = $_GET['quantiter'];
$date = date('Y-m-d');
$prod = $_GET['prod'];
$factr = $_GET['NumFact'];
$idr = $_GET['clt'];
$id = $_GET['sor'];
if (isset($_GET['valid'])) {
    if ($_GET['valid'] == 'true') {
  
        $conn->query("UPDATE `sortie` SET statut='Valider' WHERE idSor='$id'");

        $query = $conn->query("SELECT * FROM sortie where idSor='$id'");
   
        $row = $query->fetch_array();
        if ($row['statut'] == 'Valider') {

            $conn->query("UPDATE `facturesortie` SET validation=1 WHERE idFClt='$factr'");
        }
    
   

        $conn->query("UPDATE `produit` SET QTE_Stock=QTE_Stock-$quantiter WHERE id='$prod'");
    
    } else if ($_GET['valid'] == 'supprimer') {
        $conn->query("UPDATE `sortie` SET statut='supprimer' WHERE idSor='$id'");
        $quantiter = $_GET['quantiter'];

        $factr = $_GET['NumFact'];
        $sql = " SELECT count(*) as total from sortie where statut='Valider' and NFS='$factr'";
        $rslt = mysqli_query($conn, $sql);
        $values = mysqli_fetch_assoc($rslt);
        $num_rows = $values['total'];
        if ($num_rows > 0) {
            $conn->query("UPDATE `facturesortie` SET validation=1 WHERE idFClt='$factr'");
        } else if ($num_rows == 0) {
            $conn->query("UPDATE `facturesortie` SET Validation=0 WHERE idFClt='$factr'");
        }
        $conn->query("DELETE FROM sortie WHERE idSor='$id'");

        $conn->query("UPDATE `produit` SET QTE_Stock =(QTE_Stock+$quantiter) WHERE id=$prod");
    }

    $id = $_GET['clt'];
    $nm = $_GET['NumFact'];
    header("location:suiviVente.php?clt=$id&NumFact=$nm");
}
