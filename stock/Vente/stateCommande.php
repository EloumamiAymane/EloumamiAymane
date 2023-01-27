
   
<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'Stock');

$quantiter = $_GET['quantiter'];
$date = date('Y-m-d');
$prod = $_GET['prod'];
$factr = $_GET['numFact'];
$id = $_GET['ent'];
$factr = $_GET['numFact'];
if (isset($_GET['valid'])) {

    if ($_GET['valid'] == 'true') {

        $conn->query("UPDATE `entree` SET status='Valider' WHERE idEnt='$id'");

        $query = $conn->query("SELECT * FROM entree where idEnt='$id'");
        $row = $query->fetch_array();
        if ($row['status'] == 'Valider') {

            $conn->query("UPDATE `facture` SET Validation=1 WHERE NumFacture='$factr'");
        }


        $conn->query("UPDATE `produit` SET QTE_Stock=QTE_Stock+$quantiter WHERE id='$prod'");
    } else if ($_GET['valid'] == 'supprimer') {
        $conn->query("UPDATE `entree` SET status='supprimer' WHERE idEnt='$id'");
        $quantiter = $_GET['quantiter'];
        $idr = $_GET['fact'];
        $factr = $_GET['numFact'];
        $sql = " SELECT count(*) as total from entree where status='Valider' and NmFact='$factr'";
        $rslt = mysqli_query($conn, $sql);
        $values = mysqli_fetch_assoc($rslt);
        $num_rows = $values['total'];
        if ($num_rows > 0) {
            $conn->query("UPDATE `facture` SET Validation=1 WHERE NumFacture='$factr'");
        } else if ($num_rows == 0) {
            $conn->query("UPDATE `facture` SET Validation=0 WHERE NumFacture='$factr'");
        }
        $conn->query("DELETE FROM entree WHERE idEnt='$id'");

        $conn->query("UPDATE `produit` SET QTE_Stock =(QTE_Stock-$quantiter) WHERE id=$prod");
    }
    $id = $_GET['fact'];
    $nm = $_GET['numFact'];
    header("location:suiviAchat.php?fact=$id&numFact=$nm");
}
