<!DOCTYPE html>
<html lang="en" style="   overflow-y: scroll; overflow-x:hidden">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Boxicons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- My CSS -->
    <link rel="stylesheet" href="../home/home.css">
    <link rel="stylesheet" href="../produit/produit.css">

    <title>fiche_client</title>
</head>
<script type="text/javascript">
    $(document).ready(function() {
        //jquery for toggle sub menus
        $('.sub-btn').click(function() {
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
        });

        //jquery for expand and collapse the sidebar
        $('.menu-btn').click(function() {
            $('.side-bar').addClass('active');
            $('.menu-btn').css("visibility", "hidden");
        });


    });
</script>

<body>

    <style>
        #btn2 {
            position: relative;
            bottom: 210px;
            z-index: 1;
            left: 20px;
        }

        .menu img {
            position: relative;
            left: 15px;
            border-radius: 30px;
            bottom: 45px;
        }

        .admin {
            color: white;
            font-size: 19px;
            font-family: Arial, Helvetica, sans-serif;
            position: relative;
            left: 75px;
            bottom: 70px;
        }

        .brdr {
            border-bottom: 1px solid grey;
            position: relative;
            bottom: 30px
        }

        #btn {

            margin-bottom: 3px;
            font-size: 15px;
            position: relative;
            left: 10px;
            cursor: pointer;
            height: 40px;
            width: 70px;
            border-radius: 0.5rem;
            background: grey;
            color: black;
        }

        .page {
            height: 550px;
            border: 1px solid #000;
            position: relative;
            width: 50%;
            left: 450px;
            bottom: 85px;
        }

        .contenu p {
            padding-left: 10px;

        }

        .adr {
            position: relative;
            left: 300px;
            bottom: 80px;
            ;
        }

        .titleFac h2 {
            text-align: center;
            position: relative;
            bottom: 20px;
        }

        .desPro p {
            text-align: center;
            position: relative;

            top: 20px;
            font-size: 23px;

        }

        .left {
            padding-left: 30px;
            padding-top: 40px;
        }

        .right {
            float: right;
            position: relative;
            right: 80px;
            bottom: 140px;
        }

        .center {
            text-align: center;
            position: relative;

            bottom: 20px;
        }

        .center p {
            padding-left: 40px;
        }

        .footFact p {
            padding-left: 30px;
            padding-top: 30px;
            ;
        }
    </style>
    <div class="side-bar" style="z-index: 100;">

        <div class="menu">
            <img src="../img/admin.jpg" alt="" height="50" width="50">
            <p class="admin">Administrateur</p>
            <div class="brdr">

            </div>
            <div class="item"><a href="../home/home.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
            <div class="item">
                <a class="sub-btn"><i class="fas fa-table"></i>Gestion<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="../Client/client.php" class="sub-item">Clients</a>
                    <a href="../Fournisseur/fournisseur.php" class="sub-item">Fournisseurs</a>
                    <a href="../produit/produits.php" class="sub-item">produits</a>
                    <a href="../Societe/societe.php" class="sub-item">Societe</a>
                </div>
            </div>
            <div class="item">


                <a class="sub-btn"><i class="fas fa-table"></i>Achat/Vente<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="../Achat/sortie.php" class="sub-item">Achat</a>
                    <a href="../Vente/entre.php" class="sub-item">Ventes</a>

                </div>

            </div>
            <div class="item">
                <a class="sub-btn"><i class="fas fa-cogs"></i>Settings<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="../login/securite.php" class="sub-item">Securite</a>

                </div>
            </div>
            <div class="item"><a href="../login/logOut.php"><i class="fas fa-info-circle"></i>Log Out</a></div>
        </div>
    </div>

    <div class="nav">
        <div class="heade">
            <i class='bx bx-menu' style="position:relative;top:30px;font-size:25px;right:35px;"></i>
            <h3>Home</h3>

        </div>
    </div>
    <div class="list-prod" style="height:150px ;">
        <div class="row">
            <a href="../Client/client.php">
                <input type="submit" id="btn" value="Retour">

            </a>

        </div>
    </div>


    <div class="page">
        <div class="header">
            <div class="contenu">
                <?php
                $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
                $query = $connexion->query("SELECT * FROM produit,societe where produit.idMag=societe.id");
                while ($row1 = $query->fetch_array()) {




                ?>
                    <p> <b><?php echo $row1['Name'] ?></b>
                    </p>
                    <p> <b>Tel :</b>
                        <?php echo $row1['Mobile'] ?></p>
                    <p> <b>Email:</b><?php echo $row1['Email'] ?></p>
                    <p class="adr"> <b>Adress:</b><?php echo $row1['Adresse'] ?></p>
            </div>
        <?php break;
                } ?>
        <div class="bordr" style="border-top: 1px solid #ccc; position:relative;bottom:30px;left:0px;width: 100%px;">
        </div>
        <div class="titleFac">
            <h2>Fiche Client</h2>
        </div>
        <div class="bordr" style="border-top: 1px solid #ccc; position:relative;bottom:15px;left:0px;width: 100%px;">
        </div>
        </div>
        <?php
        $id = $_GET['fact'];
        $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
        $query = $connexion->query("SELECT * FROM client WHERE id='$id'");
        while ($row = $query->fetch_array()) {




        ?>
            <div class="bodyFact">
                <div class="desPro">
                    <p style="font-size: 20px; position:relative;right:50px;"> <b style=" font-size: 20px;"> Raison Sociale :</b>
                        <?php echo $row['RaisonSocialeClt'] ?></p>
                </div>
                <div class="champs">
                    <div class="left">
                        <p><b>Nom:</b><?php echo $row['Nameclt'] ?></p>
                        <p><b>Tel:</b><?php echo $row['telclt'] ?> </p>
                        <p><b>Email:</b><?php echo $row['emailclt'] ?></p>
                        <p><b>Adresse:</b><?php echo $row['adresseclt'] ?></p>
                    </div>

                    <div class="right">
                        <p><b>Ville:</b><?php echo $row['ville'] ?></p>
                        <p><b>fax:</b><?php echo $row['faxclt'] ?></p>

                    </div>
                </div>
            </div>
            <div class="footFact">

            </div>

    </div>
<?php
        }
?>

</body>

</html>