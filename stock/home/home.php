<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="home.css">

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

        .numberPannel {
            position: absolute;
            top: -10;
            left: 18px;
            height: 20px;
            width: 20px;
            font-size: 14px;
            text-align: center;
            color: white;
            background-color: red;
            border-radius: 50%;
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
        <div class="list" style="background-color:#eee ">
            <h2>Tableau de Bord</h2>
            <div class="right">
                <a href="" style="color:darkcyan;">Home /</a>
                <a href="">Tableau de Bord</a>
                <a href="prodEps.php" style="position: relative;bottom:65px;right:800px;font-size:25px; color:black;"><i class="far fa-bell"></i> <span class="numberPannel">
                        <?php
                        $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connection));


                        $sql = " SELECT count(*) as total from produit where QTE_Stock between 0 and 1 ";
                        $rslt = mysqli_query($connexion, $sql);
                        $values = mysqli_fetch_assoc($rslt);
                        $num_rows = $values['total'];
                        echo $num_rows;




                        ?>



                    </span></a>

            </div>
            <div class="col-sm-2">
                <h5 class="dt">Date :</h5>
                <h5 id="date"> </h5>
            </div>
            <div class="col-sm-2">

                <h5 id="time"> </h5>
            </div>

        </div>
        <a href="../produit/produits.php" style="text-decoration:none ; color:black;">
            <div class="col" style="background-color:white ; ">
                <img src="../img/bt.jpg" height="50" width="50" alt="">
                <div class="title">
                    <h5>Produits</h5>
                    <p><b><?php
                            $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connection));


                            $sql = " SELECT count(*) as total from produit ";
                            $rslt = mysqli_query($connexion, $sql);
                            $values = mysqli_fetch_assoc($rslt);
                            $num_rows = $values['total'];
                            echo $num_rows;




                            ?></b></p>
                </div>
            </div>
        </a>
        <a href="../Fournisseur/fournisseur.php" style="text-decoration:none ; color:black;">
            <div class="col" style="background-color:white ;position:relative;bottom:140px;left:640px;">
                <img src="../img/fournisseur.jpg" height="50" width="50" alt="">
                <div class="title">
                    <h5>Fourniseurs</h5>
                    <p><b><?php
                            $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connection));


                            $sql = " SELECT count(*) as total from fournisseur ";
                            $rslt = mysqli_query($connexion, $sql);
                            $values = mysqli_fetch_assoc($rslt);
                            $num_rows = $values['total'];
                            echo $num_rows;




                            ?></b></p>
                </div>
            </div>
        </a>

        <a href="../Client/client.php" style="text-decoration:none ; color:black;">
            <div class="col" style="background-color:white ;position:relative;bottom:230px;left:980px;">
                <img src="../img/client.fpg.jfif" height="50" width="50" alt="">
                <div class="title">
                    <h5>Clients</h5>
                    <p><b> <?php
                            $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connection));


                            $sql = " SELECT count(*) as total from client ";
                            $rslt = mysqli_query($connexion, $sql);
                            $values = mysqli_fetch_assoc($rslt);
                            $num_rows = $values['total'];
                            echo $num_rows;




                            ?></b></p>
                </div>
            </div>
        </a>
        <a href="../Societe/societe.php" style="text-decoration:none ; color:black;">
            <div class="col" style="background-color:white ; position:relative;bottom:220px;">
                <img src="../img/shop.jpg" height="50" width="50" alt="">
                <div class="title">
                    <h5> Information Societe</h5>

                </div>
            </div>
        </a>
        <!--
        <a href="../Caisse/listeClAch.php">
            <div class="col" style="background-color:white ;position:relative;bottom:310px;left:640px;text-decoration:none; color:black;">
                <img src=" ../img/bt.jpg" height="50" width="50" alt="">
                <div class="title">
                    <h5>Caisse</h5>

                </div>
            </div>
        </a>
    -->
    </section>

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
    <script>
        let date = document.getElementById('date');
        let today = new Date();
        let day = `${today.getDate() < 10 ? "0" : ""}${today.getDate()}`;
        let month = `${(today.getMonth()+1) < 10 ? "0" : ""}${today.getMonth()+1}`;
        let year = today.getFullYear();

        date.textContent = `${day}-${month}-${year}`;
    </script>
    <script>
        let time = document.getElementById('time');
        setInterval(function() {
            let date = new Date();
            time.innerHTML = date.toLocaleTimeString();
        });
    </script>




</body>

</html>