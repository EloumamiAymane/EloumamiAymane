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
    <link rel="stylesheet" href="../home/home.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Boxicons -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <title>Facture Sortie</title>
</head>

<body>
    <?php
    $idf = $_GET['fact'];
    $factr = $_GET['NumFact'];
    $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
    $query = $connexion->query("SELECT * FROM societe,fournisseur,facture where 
     facture.idF=fournisseur.id and facture.NumFacture='$factr' and fournisseur.id= '$idf'");
    while ($row = $query->fetch_array()) {


    ?>
        <div>
            <div class="main-head" style="text-align:center ;">
                <h1><?php echo $row['Name'] ?></h1>


            </div>

            <div class="left-head" style="padding-left:30px; padding-top:30px;">
                <p><b>Adress:</b><?php echo $row['Adresse'] ?> / <b>Mob:</b><?php echo $row['Mobile'] ?> </p>

                <p><b>Fax:</b> <?php echo $row['fax'] ?> / <b>Activite Principale:</b><?php echo $row['ActivitePrincipale'] ?></p>

                <p><b>Email:</b> <?php echo $row['Email'] ?> /<b>Ville:</b><?php echo $row['ville'] ?> </p>

                <p><b>Zip:</b><?php echo $row['zip'] ?></p>


            </div>
            <div class="right-head" style="position:relative;bottom:160px;left:700px;">
                <p><b>Fournisseur:</b><?php echo $row['NameFour'] ?> / <b>Mob:</b><?php echo $row['telfour'] ?></p>

                <p><b>email:</b><?php echo $row['emailfour'] ?> /<b>Ville:</b><?php echo $row['villefour'] ?> </p>


                <p><b>Activite principale:</b><?php echo $row['RaisonSocialefour'] ?></p>
                <p><b>Adress:</b><?php echo $row['adressefour'] ?></p>


            </div>
            <div class="middle" style="border:1px solid #000; width:300px; text-align:left; padding-left:15px;position:relative;left:440px;bottom:100px;">
                <p><b>Facture N:</b><?php echo $row['NumFacture'] ?></p>
                <p><b> le :</b><?php echo $row['Date'] ?></p>

            </div>
        <?php
        break;
    }
        ?>

        <table class="content-tab">
            <thead>
                <tr>
                    <th>Num</th>
                    <th>Designation</th>
                    <th>Unite</th>
                    <th>QTE</th>
                    <th>Prix</th>
                    <th>Totale</th>
                </tr>
            </thead>
            <?php

            $idf = $_GET['fact'];
            $factr = $_GET['NumFact'];

            $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
            $query = $connexion->query("SELECT * FROM produit,entree,facture,fournisseur,ligneentre where 
                    fournisseur.id=facture.idF
                    and fournisseur.id=entree.idfour
                    and entree.NmFact=facture.Numfacture
                    and entree.idEnt=ligneentre.ident
                    and ligneentre.idpd=produit.id
                    and facture.NumFacture='$factr'
                    and fournisseur.id='$idf'
                  
                    
                    
                    
                    
                     ");
            while ($row = $query->fetch_array()) {
                if ($row['status'] == 'Valider') {



            ?>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><?php echo $row['Designation'] ?></td>
                            <td><?php echo $row['Unite'] ?></td>
                            <td><?php echo $row['QTE'] ?></td>
                            <td><?php echo $row['prixAchat'] ?></td>
                            <td><?php echo $row['Total'] ?></td>
                        </tr>
                        <tr>

                    </tbody>
            <?php }
            } ?>
        </table>


        </div>
        <?php

        $total = 0;
        $idf = $_GET['fact'];
        $factr = $_GET['NumFact'];
        $total = 0;
        $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
        $query = $connexion->query("SELECT * FROM produit,entree,facture,fournisseur,ligneentre where 
                    fournisseur.id=facture.idF
                    and fournisseur.id=entree.idfour
                    and entree.NmFact=facture.Numfacture
                    and entree.idEnt=ligneentre.ident
                    and ligneentre.idpd=produit.id
                    and facture.NumFacture='$factr'
                    and fournisseur.id='$idf'
                  
                    
                    
                    
                    
                     ");

        while ($row = $query->fetch_array()) {
            if ($row['status'] == 'Valider') {
                $total += $row['Total'];
            }
        }
        ?>
        <div class="foot" style="position: relative;bottom:80px;left:900px;">
            <p><b>TotalHT :</b><?php echo $total ?> DH</p>
            <a href="entre.php">
                <button type="button" id="btn1" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:grey ;border: none;position:relative;bottom:610px;right:880px;">

                    Retour
                </button>
            </a>
        </div>
        <button id="btn1" onclick="window.print();" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:rgb(158, 158, 21);border: none; position:relative;left:1200px;bottom:90px;">
            Download
        </button>

</body>

</html>