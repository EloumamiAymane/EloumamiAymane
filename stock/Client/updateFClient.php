<?php






$connexion = mysqli_connect('localhost', 'root', '', 'Stock');
$id = $_GET['edit'];

if (isset($_POST['update'])) {
    $RS = $_POST['RS'];
    $nom = $_POST['nom'];
    $tel = $_POST['tel'];
    $fax = $_POST['fax'];
    $adrs = $_POST['adr'];
    $ville = $_POST['Ville'];
    $email = $_POST['mail'];

    $update_data = "UPDATE client SET 
 
    
      RaisonSocialeClt='$RS',
      telclt='$tel' ,
      emailclt='$email',
      faxclt='$fax',
      ville='$ville',
      adresseclt='$adrs' 
    
      WHERE id = '$id'";
    $upload = mysqli_query($connexion, $update_data);
    header('location:client.php');
};

?>



<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden;">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Boxicons -->
    <!-- Boxicons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- My CSS -->
    <link rel="stylesheet" href="../home/home.css">
    <link rel="stylesheet" href="/stock/produit/produit.css">
    <link rel="stylesheet" href="societe.css">

    <title> Modifier Client</title>
</head>

<body style="height: 250px;">


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
    <style>
        ::-webkit-scrollbar {
            display: none;
        }



        .image {
            position: relative;
            right: 10px;

            height: 850px;
            background-repeat: repeat;
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

        .block {
            background-color: #fff;
            position: relative;
            left: 320px;
            bottom: 780px;
            height: 680px;
            width: 1000px;
        }

        .nav {
            background-color: #fff;
            position: relative;
            top: 0px;
            height: 65px;
        }

        .heade {
            position: relative;
            left: 350px;
            display: flex;
        }

        .heade h3 {
            position: relative;
            top: 30px;
            font-size: 18px;
            right: 10px;
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

    <div class="image">

    </div>


    <div class="block" style="height: 540px;">
        <a href="../Client/client.php">
            <button type="button" id="btn1" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:grey ;border: none; position:relative; bottom:50px; ">

                Retour
            </button>
        </a>


        <!-- Modal -->


        <div class="modal-header" style="  background-color:#4D77FF; height: 60px; position:relative;bottom:38px;">

            <h3 style="position: relative; ;left:50px;top:5px;color:#fff;">Modifier Client</h3>



            <?php
            $idcl = $_GET['edit'];

            $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
            $query = $connexion->query("SELECT * FROM client where id='$idcl'");
            while ($row = $query->fetch_array()) {




            ?>



        </div>
        <form class="row g-3 needs-validation" method="post">
            <div class="col-md-4" style="position: relative; top:0px; left:50px;width:415px;">
                <label class="form-label">Raison Sociale</label>
                <input type="txt" class="form-control" name="RS" placeholder="<?php echo $row['RaisonSocialeClt'] ?>">
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4" style="position: relative; top:0px;left:90px; width: 400px;">

                <label for="formFile" class="form-label">Tel</label>
                <input type="txt" class="form-control" name="tel" placeholder="<?php echo $row['telclt'] ?>">


            </div>
            <div class="col-md-6" style="position: relative; top:80px;">
                <label for="validationCustom03" class="form-label" style="position: relative;left: 50px;bottom: 68px;">fax</label>
                <input type="txt" class="form-control" name="fax" id="validationCustom03" required style="width:400px;position: relative;left: 50px;bottom: 70px;" placeholder="<?php echo $row['faxclt'] ?>">
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-4" style="position: relative; top:10px; width: 400px;">
                <label for="validationCustomUsername" class="form-label">Adresse</label>
                <div class="input-group has-validation">

                    <input type="txt" class="form-control" name="adr" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required placeholder="<?php echo $row['adresseclt'] ?>">
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="position: relative; top:20px; left:50px;width: 418px;">
                <label for="validationCustom05" class="form-label">Ville</label>
                <input type="txt" class="form-control" name="Ville" id="validationCustom05" required placeholder="<?php echo $row['ville'] ?>">
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>
            <div class="col-md-3" style="position: relative; top:20px; left:90px;width: 400px;">
                <label for="validationCustom05" class="form-label">Email</label>
                <input type="text" class="form-control" name="mail" id="validationCustom05" required placeholder="<?php echo $row['emailclt'] ?>">
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>



        <?php } ?>


        <div class="bordr" style="border-top: 1px solid #ccc; position:relative; top:70px;left:8px;width: 1000px;">

        </div>





        <div class="col-12" style="position:relative ; top:80px; left:840px; ">
            <button class="btn btn-primary" type="submit" name="update">Mettre a jour</button>
        </div>

        </form>
    </div>








</body>

</html>