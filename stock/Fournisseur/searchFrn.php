<?php





$connexion = mysqli_connect('localhost', 'root', '', 'Stock');

if (isset($_POST['ajouter'])) {
    $RS = $_POST['RS'];
    $nom = $_POST['nom'];
    $tel = $_POST['tel'];
    $fax = $_POST['fax'];
    $adrs = $_POST['adr'];
    $ville = $_POST['Ville'];
    $email = $_POST['mail'];

    if (!empty($RS) && !empty($nom) && !empty($tel) && !empty($fax) && !empty($adrs) && !empty($ville) && !empty($email)) {

        $query = "INSERT INTO fournisseur (`NameFour`,`RaisonSocialefour`,`telfour`,`emailfour`,`faxfour`,`villefour`,`adressefour`) 
Values ('$nom','$RS','$tel',' $email','  $fax','$ville',' $adrs')";
        $result =  mysqli_query($connexion, $query);
        if ($result) {
            echo "<script> alert('Data saved');</script>";
            header('location:fournisseur.php');
        } else {
            echo "<script> alert('Ooops!');</script>";
        }
    } else {
        echo "empty!";
    }
}


?>






<!DOCTYPE html>
<html lang="en" style="   overflow-y: scroll;overflow-x:hidden; width:1500px; ">

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
</style>

<body>


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
            <div class="item"><a href="../login/logOut.php" <i class="fas fa-info-circle"></i>Log Out</a></div>
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
            <h3>Fournisseur</h3>
            <div class="lks">
                <a href="">Home <span>/</span></a>
                <a href="">Lists Fournisseur</a>
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
            <a href="../Fournisseur/listFour.php"> <button type="button" id="btn1" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:rgb(158, 158, 21);border: none;">
                    Download
                </button></a>

        </div>
        <div class="search" style="position: relative; bottom:250px; left:710px;z-index:100;">


            <form class="d-flex" role="search" action="../Fournisseur/searchFrn.php">
                <input class="form-control me-2" type="search" name="searchInput" placeholder="Search" aria-label="Search" style="width: 190px;">
                <button class="btn btn-outline-success" type="submit" name="searchBtn">Search</button>

            </form>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width:700px;">
                    <div class="modal-header" style="  background-color: #1DBF57;height:60px;">
                        <img src="../img/fournisseur.jpg" alt="" height="50px;" width="50px;" style="border-radius:20px ;">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Raison Sociale</label>
                                <input type="txt" class="form-control" name="RS">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input type="txt" class="form-control" name="nom">

                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tel</label>
                                <input type="txt" class="form-control" name="tel">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fax</label>
                                <input type="txt" class="form-control" name="fax">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Adresse</label>
                                <input type="txt" class="form-control" name="adr">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ville</label>
                                <input type="txt" class="form-control" name="Ville">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail">

                            </div>



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:rgb(204, 44, 44);border: none;">Fermer</button>
                            <button type="submit" class="btn btn-primary" style="background-color:rgb(36, 179, 36) ;border:none;" name="ajouter">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg">
        <div class="list-prod">
            <table class="content-tab" style="width:75%; position:relative;right:560px;">
                <?php
                if (isset($_GET['searchBtn'])) {
                    $searchValue = $_GET['searchInput'];


                    $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
                    $query = $connexion->query("SELECT * FROM fournisseur where  NameFour like '%$searchValue%'");
                    while ($row = $query->fetch_array()) {


                ?>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Raison Sociale</th>

                                <th>Tel</th>

                                <th>Email</th>
                                <th>ville</th>

                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr data-href="factFou.php?fact=<?php echo $row['id']; ?>">
                                <td><?php echo $row['NameFour'] ?></td>
                                <td><?php echo $row['RaisonSocialefour'] ?></td>
                                <td><?php echo $row['telfour'] ?></td>

                                <td><?php echo $row['emailfour'] ?></td>
                                <td><?php echo $row['villefour'] ?></td>




                                <td style="position: relative; right:40px;">
                                    <a href="updateFour.php?edit=<?php echo $row['id']; ?>" class="btnn1"> <i class="fas fa-edit"></i> edit </a>
                                    <a href="deletFour.php?del=<?php echo $row['id']; ?>" class="btnn"> <i class="fas fa-trash"></i> delete </a>
                                </td>



                            </tr>
                    <?php
                    }
                }
                    ?>
                    <tr>
                        <th>Nom</th>
                        <th>Raison Sociale</th>

                        <th>Tel</th>

                        <th>Email</th>
                        <th>ville</th>

                        <th>Action</th>

                    </tr>



                        </tbody>
            </table>





        </div>
    </div>
</body>
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