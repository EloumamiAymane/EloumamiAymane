<?php





$connexion = mysqli_connect('localhost', 'root', '', 'Stock');

if (isset($_POST['ajouter'])) {
    $des = $_POST['Des'];
    $code = $_POST['Code'];
    $Img = $_POST['Img'];
    $cat = $_POST['cat'];
    $quantite = $_POST['qt'];
    $unite = $_POST['unt'];
    $PrixU = $_POST['prix_U'];
    $PrixV = $_POST['PrixV'];
    $mag = $_POST['idMg'];
    if (!empty($des) && !empty($code) && !empty($Img) && !empty($cat) && !empty($quantite) && !empty($unite) && !empty($PrixU) && !empty($PrixV)) {

        $query = "INSERT INTO produit (`Designation`,`Code barre`,`Img`,`Categorie`,`QTE_Stock`,`Unite`,`Prix_U`,`Prix_Vente`,`idMag`) 
Values ('$des','$code','$Img','$cat','$quantite','$unite','$PrixU','$PrixV','$mag')";
        $result =  mysqli_query($connexion, $query);
        if ($result) {
            echo "<script> alert('Data saved');</script>";
            header('location: produits.php');
        } else {
            echo "<script> alert('Ooops!');</script>";
        }
    } else {
        echo "empty!";
    }
}


?>





<!DOCTYPE html>
<html lang="en" style="   overflow-y: scroll;">

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
    <link rel="stylesheet" href="produit.css">

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

<body style="overflow-x:hidden ;">
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
    </style>
    <!-- SIDEBAR -->


    <div class="nav">
        <div class="heade">
            <i class='bx bx-menu' style="position:relative;top:30px;font-size:25px;right:35px;"></i>
            <h3>Home</h3>
        </div>
    </div>
    <div class="list-prod">
        <div class="row">
            <h3>Produits</h3>
            <div class="lks">
                <a href="">Home <span>/</span></a>
                <a href="">Lists Produit</a>
            </div>
        </div>
    </div>

    <div class="form">
        <div class="bt">
            <a href="../home/home.php">
                <button type="button" id="btn1" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:grey ;border: none;">

                    Retour
                </button>
            </a>
            <button type="button" id="btn1" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color:rgb(36, 179, 36) ;border: none;">

                Ajouter
            </button>
            <a href="../produit/FactProd.php">
                <button id="btn2" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:rgb(158, 158, 21);border: none;">
                    Code Barre
                </button>`
            </a>
        </div>
        <div class="search" style="position: relative; bottom:250px; left:710px;z-index:100;">


            <form class="d-flex" role="search" action="../produit/searchProd.php">
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


                                <label class="form-label">Designation</label>
                                <input type="txt" class="form-control" name="Des">

                            </div>

                            <div class="mb-3">
                                <label class="form-label">Code barre</label>
                                <input type="txt" class="form-control" name="Code">

                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image</label>
                                <input class="form-control" type="file" id="formFile" name="Img">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Categorie</label>
                                <input type="txt" class="form-control" name="cat" id="">


                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">QTE_STOCK</label>
                                <input type="number" class="form-control" id="" name="qt">

                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">UNITE</label>
                                <input type="txt" class="form-control" id="" name="unt">

                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">prix_U</label>
                                <input type="number" class="form-control" id="" name="prix_U">

                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Prix_Vente</label>
                                <input type="number" class="form-control" id="" name="PrixV">

                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">id_Magasin</label>
                                <input type="number" class="form-control" id="" name="idMg">

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
            <table class="content-tab" style="width:75% ;position:relative;right:530px;">
                <?php
                if (isset($_GET['searchBtn'])) {
                    $searchValue = $_GET['searchInput'];


                    $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
                    $query = $connexion->query("SELECT * FROM produit where  Designation like '%$searchValue%' or Categorie like '%$searchValue%'");
                    while ($row = $query->fetch_array()) {


                ?>
                        <thead>
                            <tr>
                                <th>Designation</th>
                                <th>Code barre</th>
                                <th>Categorie</th>
                                <th>QTE_STOCK</th>
                                <th>Unite</th>


                                <th>Prix_U</th>
                                <th>Prix_Vente</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr data-href="print.php?fact=<?php echo $row['id']; ?>">
                                <a href="#">
                                    <td><?php echo $row['Designation'] ?></td>
                                    <td><?php echo $row['Code barre'] ?></td>
                                    <td><?php echo $row['Categorie'] ?></td>
                                    <td><?php echo $row['QTE_Stock'] ?></td>
                                    <td><?php echo $row['Unite'] ?></td>
                                    <td><?php echo $row['Prix_U'] ?></td>
                                    <td><?php echo $row['Prix_Vente'] ?></td>
                                    <td>
                                        <a href="UpdateProd.php?edit=<?php echo $row['id']; ?>" class="btnn1"> <i class="fas fa-edit"></i> edit </a>
                                        <a href="deleteProd.php?delete=<?php echo $row['id']; ?>" class="btnn"> <i class="fas fa-trash"></i> delete </a>
                                    </td>

                                </a>

                            </tr>

                    <?php
                    }
                }
                    ?>
                    <tr>
                        <th>Designation</th>
                        <th>Code barre</th>
                        <th>Categorie</th>
                        <th>QTE_STOCK</th>
                        <th>Unite</th>


                        <th>Prix_U</th>
                        <th>Prix_Vente</th>
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