<?php

session_start();



$connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connection));;
$user = $_SESSION['User'];

if (isset($_POST['update'])) {
    $old = $_POST['old'];
    $new = $_POST['new'];

    if (!empty($old) && !empty($new)) {



        $infoACCOUNT = "UPDATE `admin` SET   password='$new' where usernameadm='$user' ";
        $upload = mysqli_query($connexion, $infoACCOUNT);

        if ($upload) {


            header("location:../login/logout.php");
        }
    }
}









?>






<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Securite</title>
    <link rel="stylesheet" href="../home/home.css">

    <link rel="stylesheet" href="../produit/produit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Boxicons -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body style="background-color:#eee ;">
    <style>
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

        .nav {
            background-color: white;

            position: relative;
            width: 1100px;
            bottom: 150px;
            left: 290px;
        }

        .heade {
            position: relative;
            left: 50px;

        }

        .list {
            position: relative;
            left: 290px;
        }

        .right {
            position: relative;
            left: 840px;
            bottom: 20px;
        }

        .right a {
            text-decoration: none;
            color: gray;
        }

        .list h2 {
            font-size: 28px;
            position: relative;
            top: 10px;
            left: 10px;
        }

        #date {
            position: relative;
            left: 90px;
            bottom: 30px;
        }

        .dt {
            position: relative;
            left: 15px;
        }

        #time {
            position: relative;
            left: 300px;
            bottom: 60px;
        }

        .col {
            position: relative;
            height: 90px;
            width: 320px;
            left: 300px;
            bottom: 50px;
            box-sizing: 30px;



        }

        .col img {
            position: relative;
            top: 20px;
            left: 20px;
        }

        .title {
            position: relative;
            left: 80px;
            bottom: 30px;
        }
    </style>

    <div class="side-bar">

        <div class="menu">
            <img src="../img/admin.jpg" alt="" height="50" width="50">
            <p class="admin">Administrateur</p>
            <div class="brdr">

            </div>
            <div class="item"><a href="#"><i class="fas fa-desktop"></i>Dashboard</a></div>
            <div class="item">
                <a class="sub-btn"> <i class="fas fa-table"></i> Gestion<i class="fas fa-angle-right dropdown"></i></a>
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
                    <a href="../Vente/entre.php" class="sub-item">Achat</a>
                    <a href="../Achat/sortie.php" class="sub-item">Ventes</a>

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

    <section class="main" style="z-index: -1;overflow-x:hidden;">
        <div class="nav">
            <div class="heade">
                <i class='bx bx-menu' style="position:relative;top:30px;font-size:25px;right:35px;"></i>
                <h3>Home</h3>
            </div>
        </div>
        <div class="list-prod">
            <div class="row">
                <h3>Securite</h3>
                <div class="lks">
                    <a href="../home/home.php" style="color:darkcyan;text-decoration:none;">Home <span>/</span></a>
                    <a href="" style="text-decoration: none;color:grey;"> Securite</a>
                </div>
            </div>
        </div>


    </section>

    <!-- Button trigger modal -->
    <div class="block" style="transform:translate(500px,50px);position:fixed;background-color:#fff;width:500px;height:250px;">


        <!-- Modal -->


        <div class="modal-header" style="  background-color: #676867; height: 60px;">
            <img src="../img/password.jpg" alt="" height="60" width="60" style=" border-radius:30px; padding-left:10px;">
            <h3 style="position: relative; font-size:19px;right:350px;top:10px;color:#eee;">"Admin"</h3>







        </div>
        <form class="row g-3 needs-validation" method="post">
            <div class="col-md-4" style="position: relative; top:90px; left:50px;">
                <label for="validationCustom01" class="form-label" style="font-size: 15px;font-family:Arial, Helvetica, sans-serif;">Mot de Passe Actuel</label>
                <input type="password" class="form-control" id="validationCustom01" value="" name="old" required style="width: 220px;">
                <div class="valid-feedback">

                </div>
            </div>
            <div class="col-md-4" style="position: relative; top:90px;left: 130px;">
                <label for="validationCustom02" class="form-label" style="font-size: 15px;font-family:Arial, Helvetica, sans-serif;">Nouveau Mot de Passe</label>
                <input type="password" class="form-control" id="validationCustom02" name="new" value="" required style="width: 220px;">
                <div class="valid-feedback">

                </div>
            </div>









            <div class="col-12" style="position:relative ; top:100px; left:390px; ">
                <button class="btn btn-primary" type="submit" name="update" style="background-color:rgb(250, 194, 19);border:none;">Mettre a jour</button>
            </div>

        </form>
    </div>









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
</body>


</html>