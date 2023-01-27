<?php
//modifier
session_start();

$connexion = mysqli_connect('localhost', 'root', '', 'Stock');

if (isset($_POST['ajouter'])) {
    $NumV = $_POST['NumV'];
    $date = $_POST['date'];

    //modifier

    $idf = $_SESSION['fact'];
    if (!empty($NumV) && !empty($date)) {

        $query = "INSERT INTO facture (`NumFacture`,`Date`,`idF`)
Values ('$NumV','$date','$idf')";
        $result = mysqli_query($connexion, $query);
        if ($result) {
            echo "<script>
    alert('Data saved');
</script>";
            header("location: comptoire.php?fact=$idf");
        } else {
            echo "<script>
    alert('Ooops!');
</script>";
        }
    } else {
        echo "empty!";
    }
}


?>





<!DOCTYPE html>
<html lang="en" style="   overflow-y: scroll; overflow-x:hidden;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Boxicons -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- My CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="../home/home.css">
    <link rel="stylesheet" href="../produit/produit.css">

    <title>AdminHub</title>
</head>

<body>
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

        .btnn {
            padding: 10px;
            margin-bottom: 3px;
            font-size: 15px;
            position: relative;
            left: 18px;
        }

        .content-tab thead tr {
            background-color: #eee;
        }

        .content-tab th,
        .content-tab td {
            padding: 12px 10px;
        }

        .content-tab tbody tr {
            border-bottom: 1px solid black;
        }

        .content-tab tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
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
    <div class="list-prod">
        <div class="row">
            <h3>Facture</h3>
            <div class="lks">
                <a href="">Home <span>/</span></a>
                <a href="">Comptoire</a>
            </div>
        </div>
    </div>

    <div class="form">
        <div class="bt">
            <a href="../Vente/entre.php">
                <button type="button" id="btn1" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:grey ;border: none;">

                    Retour
                </button>
            </a>
            <button type="button" id="btn1" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color:rgb(36, 179, 36) ;border: none;">

                Ajouter
            </button>



        </div>
        <div class="search" style="position: relative; bottom:250px; left:710px;z-index:100;">


            <form class="d-flex" role="search" action="../Vente/searchFact.php?">
                <input class="form-control me-2" type="search" name="searchInput" placeholder="Search" aria-label="Search" style="width: 190px;">
                <button class="btn btn-outline-success" type="submit" name="searchBtn">Search</button>

            </form>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width:700px;">
                    <div class="modal-header" style="  background-color: #1DBF57;height:60px;">
                        <img src="../img/add.jpg" alt="" height="50px;" width="50px;">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">


                                <label class="form-label">Num Factute</label>
                                <input type="txt" class="form-control" name="NumV">

                            </div>

                            <div class="mb-3">
                                <label class="form-label">Date</label>

                                <input type="date" class="form-control" name="date">

                            </div>






                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:rgb(204, 44, 44);border: none;">Fermer</button>
                            <button type="submit" class="btn btn-primary" name="ajouter" style="background-color:rgb(36, 179, 36) ;border:none;">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg">
        <div class="list-prod">
            <table class="content-tab" style="width:70% ;position:relative;right:520px;">
                <?php









                if (isset($_GET['searchBtn'])) {
                    $searchValue = $_GET['searchInput'];


                    $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
                    $query = $connexion->query("SELECT * FROM facture where  NumFacture like '%$searchValue%'");
                    while ($row = $query->fetch_array()) {


                ?>

                        <thead>
                            <tr>
                                <th>Num Facture</th>
                                <th>Date</th>
                                <th>Validation</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr data-href="suiviAchat.php?fact=<?php echo $row['idF'] ?>&numFact=<?php echo $row['NumFacture'] ?>">



                                <a href="#">
                                    <td><?php echo $row['NumFacture'] ?></td>
                                    <td><?php echo $row['Date'] ?></td>
                                    <td><?php echo $row['Validation'] ?></td>

                                    <td>
                                        <?php if ($row['Validation'] != 1) : ?>
                                            <a href="deletefactur.php?delete=<?php $row['idF'] ?>&NumFact=<?php echo $row['NumFacture'] ?>" class="btnn"> <i class="fas fa-trash"></i> delete </a>
                                        <?php else : ?>

                                            <a href="factureSortie.php?fact=<?php $row['idF'] ?>&NumFact=<?php echo $row['NumFacture'] ?>" class="btnn" style="background-color:rgb(229, 171, 57) ;border: none;"> Imprimer </a>
                                    </td>

                                </a>

                            </tr>
                        <?php endif ?>
                <?php
                    }
                }

                ?>


                <tr>
                    <th>Num Facture</th>
                    <th>Date</th>
                    <th>Validation</th>

                    <th>Action</th>

                </tr>



                        </tbody>

            </table>





        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const rows = document.querySelectorAll("tr[data-href]");
        rows.forEach(row => {
            row.addEventListener("click", () => {
                window.location.href = row.dataset.href;
            });
        });
    });
</script>



</html>