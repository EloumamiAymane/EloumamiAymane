<?php
$connexion = mysqli_connect('localhost', 'root', '', 'Stock');
session_start();
?>
<style>
    ::-webkit-scrollbar {
        display: none;
    }

    .content-tab {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        width: 900px;
        position: relative;
        overflow: hidden;
        bottom: 105px;
        left: 10px;
        border: 1px solid #eee;
        width: 99%;

    }



    .content-tab th,
    .content-tab td {
        padding: 13px 85px;
        border-right: 1px solid grey;
        border-bottom: 1px solid #eee;
    }

    .content-tab tbody tr {}

    p {
        font-size: 16px;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $idf = $_GET['clt'];
    $factr = $_GET['NumFact'];
    $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
    $query = $connexion->query("SELECT * FROM produit,societe,sortie,client,facturesortie where produit.idMag=societe.id 
    and produit.id=sortie.idProd and sortie.idClt=client.id and facturesortie.idclt=client.id and sortie.NFS='$factr'");
    while ($row = $query->fetch_array()) {


    ?>
        <div class="main-head" style="text-align:center ;">
            <h1><?php echo $row['Name'] ?></h1>
            <h5 style="font-size: 20px;color:grey;position:relative;bottom:25px;right:20px;">vente outils Informatique</h5>

        </div>

        <div class="left-head" style="padding-left:30px; padding-top:30px;">
            <p><b>Adress:</b><?php echo $row['Adresse'] ?> / <b>Mob:</b><?php echo $row['Mobile'] ?> </p>

            <p><b>Fax:</b> <?php echo $row['fax'] ?> / <b>Activite Principale:</b><?php echo $row['ActivitePrincipale'] ?></p>

            <p><b>Email:</b> <?php echo $row['Email'] ?> /<b>Ville:</b><?php echo $row['ville'] ?> </p>

            <p><b>Zip:</b><?php echo $row['zip'] ?></p>


        </div>
        <div class="right-head" style="position:relative;bottom:130px;left:880px;">
            <p><b>Name:</b><?php echo $row['Nameclt'] ?> / <b>Mob:</b><?php echo $row['telclt'] ?></p>

            <p><b>email:</b><?php echo $row['emailclt'] ?> /<b>Ville:</b><?php echo $row['ville'] ?> </p>


            <p><b>Activite principale:</b><?php echo $row['RaisonSocialeClt'] ?> / <b>Adress:</b><?php echo $row['adresseclt'] ?></p>


        </div>
        <div class="middle" style="border:1px solid #000; width:300px; text-align:left; padding-left:15px;position:relative;left:510px;bottom:100px;">
            <p><b>Facture N:</b><?php echo $row['NFS'] ?></p>
            <p><b> le :</b><?php echo $row['Date'] ?></p>

        </div>
    <?php
        break;
    } ?>






</body>

</html>