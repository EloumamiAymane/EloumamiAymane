<?php

session_start();

$connexion = mysqli_connect('localhost', 'root', '', 'Stock');
$NumClt = $_GET['clt'];
$factr = $_GET['NumFact'];
if (isset($_POST['ajouter'])) {


    $NumClt = $_GET['clt'];
    $date = $_POST['date'];
    $vers = $_POST['Ver'];
    $credit = $_POST['credit'];
    $statut = 'Regle';




    if (!empty($vers) && !empty($date) && !empty($NumClt)) {

        $query = "INSERT INTO reglement (`idC`,`Versement`,`Date`,`Credit`,`state`)
Values ('$NumClt','$vers','$date','$credit','$statut')";
        $result = mysqli_query($connexion, $query);
        if ($result) {
            echo "<script>
    alert('Data saved');
</script>";
            header("location: listeClAch.php?clt=$NumClt&NumFact=$factr&state=Regle");
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <!-- My CSS -->
    <link rel="stylesheet" href="../home/home.css">
    <link rel="stylesheet" href="../produit/produit.css">

    <title>AdminHub</title>
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

    <div class="brde" style="border-bottom: 2px solid #eee;">

    </div>
    <div class="brde" style="border-bottom: 2px solid #eee;position:relative; top:80px;z-index:100;left:290px;">

    </div>
    <?php
    $idf = $_GET['NumFact'];
    $idc = $_GET['clt'];
    $total = 0;
    $query = $connexion->query("SELECT * FROM `sortie` where 
 NFS='$idf' and idClt='$idc'");
    while ($row = $query->fetch_array()) {
        $total += $row['Totale'];
    }


    ?>





    <div class="list-prod">

        <div class="row" style="background-color:#fff ;height:80px;position:relative;bottom:100px;right:60px;">

            <h5 style="position: relative;top:20px; left:8px;">Total Vente </h5>
            <div class="mb-3">


                <input type="txt" class="form-control" name="Vente" style="width:100px ;position:relative;left:130px;bottom:15px;background-color:#eee;" placeholder="<?php echo $total ?>">

            </div>







        </div>

    </div>


    <form method="post">
        <div class="bt" style=" position:relative;left:280px;top:220px;height:150px;">
            <a href="">
                <button type="button" id="btn1" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:grey ;border: none;">

                    Retour
                </button>
            </a>

            <button type="button" id="btn1" name="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color:rgb(10, 161, 221) ;border: none;">

                Payement
            </button>


            <a href="../Caisse/facture.php">
                <button type=" button" id="btn1" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:rgb(229, 171, 57) ;border: none;">

                    Facture
                </button>
            </a>



        </div>
    </form>


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


                            <label class="form-label">Nom Client</label>
                            <input type="txt" class="form-control" name="Nom">

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Date</label>

                            <input type="date" class="form-control" name="date">

                        </div>

                        <div class="mb-3">


                            <label class="form-label">Versement</label>
                            <input type="txt" class="form-control" name="Ver">

                        </div>

                        <div class="mb-3">


                            <label class="form-label">Credit</label>
                            <input type="txt" class="form-control" name="credit">

                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:rgb(204, 44, 44);border: none;">Annuler</button>
                        <button type="submit" class="btn btn-primary" name="ajouter" style="background-color:rgb(36, 179, 36) ;border:none;">Payer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



















    <div class="ajout">




        <div class="bg" style="position:relative ;bottom:50px;">

            <div class="list-prod">
                <table class="content-tab" style="width:75% ;position:relative;right:530px;top:-80px;">











                    <thead>

                        <tr>
                            <th>Num_Reglement</th>
                            <th>Nom_Client</th>

                            <th>Verement</th>
                            <th>Credit</th>
                            <th>Num_Facture</th>






                        </tr>
                    </thead>
                    <?php
                    $clt = $_GET['clt'];
                    $factr = $_GET['NumFact'];
                    $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
                    $query = $connexion->query("SELECT * FROM `client`,`facturesortie`,`reglement` where facturesortie.idclt=client.id
                    and client.id=reglement.idC
 and reglement.idC= '$clt' and facturesortie.idFClt='$factr' ");
                    while ($row = $query->fetch_array()) {








                    ?>
                        <tbody>

                            <tr data-href="facture.php?NumFact=<?php echo $_GET['NumFact']; ?>&clt=<?php echo $_GET['clt']; ?>">
                                <a href="#">
                                    <td>

                                        <?php echo $row['id'] ?>
                                    </td>
                                    <td><?php echo $row['Nameclt'] ?></td>

                                    <td><?php echo $row['Versement'] ?></td>
                                    <td><?php echo $row['Credit'] ?></td>
                                    <td><?php echo $row['idFClt'] ?></td>




                                </a>

                            </tr>

                            <tr>
                                <th>Num_Reglement</th>
                                <th>Nom_Client</th>

                                <th>Verement</th>
                                <th>Credit</th>
                                <th>Num_Facture</th>






                            </tr>



                        </tbody>
                    <?php } ?>
                </table>





            </div>
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