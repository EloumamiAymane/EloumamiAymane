<?php
session_start();
$connexion = mysqli_connect('localhost', 'root', '', 'Stock');
if (isset($_POST['ajouter'])) {
    $name = $_POST['select'];
    $idf = $_GET['fact'];

    $idprod = substr($name, 0, 2);
    $_SESSION['idprd'] =   $idprod;
    //modifier
    //  $idfour = $_GET['fact'];
    //$idfour = $_SESSION['id'];
    $qte = $_POST['qt'];
    $_SESSION['qt'] = $qte;
    $prix = $_POST['achat'];
    $numAchat = $_POST['numachat'];
    $total = (float) $qte * (float) $prix;
    $status = "en cours";
    $factr = $_GET['numFact'];


    $sql = " SELECT count(*) as total from entree where idEnt='$numAchat'";
    $rslt = mysqli_query($connexion, $sql);
    $values = mysqli_fetch_assoc($rslt);
    $num_rows = $values['total'];

    if (!$num_rows) {










        if (!empty($idprod) && !empty($idf) && !empty($qte) && !empty($prix) && !empty($total)) {

            $query = "INSERT INTO entree (`idEnt`,`idfour`,`prixAchat`,`QTE`,`total`,`status`,`NmFact`) 
Values ('$numAchat','$idf','$prix','$qte','$total','$status','$factr')";
            $result =  mysqli_query($connexion, $query);

            $status = "en cours";
            $query1 = "INSERT INTO ligneentre (`idpd`,`ident`,`quantite`,`Totale`,`state`) 
Values ('$idprod','  $numAchat','$qte','$total','$status')";
            $result1 =  mysqli_query($connexion, $query1);
            if ($result) {


                echo "<script> alert('Data saved');</script>";
                $idf = $_GET['fact'];
                $idc = $_GET['numFact'];
                header("location: suiviAchat.php?fact=$idf&numFact=$idc");
            } else {
                echo "<script> alert('Ooops!');</script>";
            }
        } else {
            echo "empty!";
        }
    } else {
        echo "<script> alert('Duplicate id');</script>";
    }
}
?>

<?php





$connexion = mysqli_connect('localhost', 'root', '', 'Stock');

if (isset($_POST['ajout'])) {
    $des = $_POST['Des'];
    $code = $_POST['Code'];
    $Img = $_POST['Img'];
    $cat = $_POST['cat'];
    $quantite = $_POST['qt'];
    $unite = $_POST['unt'];
    $PrixU = $_POST['prix_U'];
    $PrixV = $_POST['PrixV'];
    $mag = $_POST['idMg'];
    if (!empty($des) && !empty($code) && !empty($Img) && !empty($cat) && !empty($quantite) && !empty($unite) && !empty($PrixU) && !empty($PrixV) && !empty($mag)) {

        $query = "INSERT INTO produit (`Designation`,`Code barre`,`Img`,`Categorie`,`QTE_Stock`,`Unite`,`Prix_U`,`Prix_Vente`,`idMag`) 
Values ('$des','$code','$Img','$cat','$quantite','$unite','$PrixU','$PrixV','  $mag')";
        $result =  mysqli_query($connexion, $query);
        if ($result) {
            echo "<script> alert('Data saved');</script>";
            $idf = $_GET['fact'];
            $idc = $_GET['numFact'];
            header("location: suiviAchat.php?fact=$idf&numFact=$idc");
        } else {
            echo "<script> alert('Ooops!');</script>";
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

    <title>achat</title>
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
                    <a href="../Achat/sortie.php" class="sub-item">Ventes</a>
                    <a href="../Vente/entre.php" class="sub-item">Achat</a>

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
    <?php

    function Achat()
    {
        $idf = $_GET['fact'];
        $total = 0;
        $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
        $query = $connexion->query("SELECT  * FROM produit,ligneentre,entree where  produit.id=ligneentre.idpd and entree.idEnt=ligneentre.ident and  idfour='$idf'");
        while ($row = $query->fetch_array()) {
            if ($row['status'] == "Valider") {
                $total += $row['Total'];
            }
        }
        echo $total;
    }
    ?>
    <div class="brde" style="border-bottom: 2px solid #eee;">

    </div>
    <div class="list-prod">

        <div class="row" style="background-color:#fff ;height:80px;position:relative;bottom:100px;right:60px;">

            <h5 style="position: relative;top:20px;">Total Achat </h5>
            <div class=" col-auto" style="position: relative;bottom:20px;left:110px;">

                <input type="text" class=" form-control" min="" id="inputPassword2" style="background-color: #eee; border-radius:none;position:relative;left:20px;" placeholder="<?php echo Achat(); ?> DH  ">

            </div>

        </div>
    </div>


    <form method="post">
        <div class="bt" style=" position:relative;left:280px;top:220px;height:150px;">
            <a href="../Vente/comptoire.php?fact=<?php echo $_GET['fact']; ?>">
                <button type="button" id="btn1" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:grey ;border: none;">

                    Retour
                </button>
            </a>

            <button type="button" id="btn1" name="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color:rgb(10, 161, 221) ;border: none;">

                Ajouter
            </button>

            <a href="factureSortie.php?fact=<?php echo $_GET['fact'] ?>&NumFact=<?php echo $_GET['numFact'] ?>">
                <button type="button" id="btn1" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:rgb(229, 171, 57) ;border: none;">

                    facture
                </button>
            </a>

        </div>
    </form>

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
                        <button type="submit" class="btn btn-primary" name="ajout" style="background-color:rgb(36, 179, 36) ;border:none;">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="brde" style="border-bottom: 2px solid #eee;position:relative;bottom:80px;">

    </div>
    <div class="ajout">
        <form method="post">
            <div class="inf" style="position: relative;bottom:70px;">
                <p style="position: relative;left:300px;">Produit</p>
                <select class="form-select" aria-label="Default select example" name="select" style="position:relative;left:300px;width: 500px;background-color:#eee;">

                    <?php
                    $val = '';

                    $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
                    $query = $connexion->query("SELECT * FROM produit");
                    while ($row = $query->fetch_array()) {

                        //   $val .= '<option value="">' . $row['id'] . '/des:' . $row["Designation"] . '/qte:' . $row["QTE_Stock"] . '/cb:' . $row["Code barre"] . '/prix:' . $row["Prix_Vente"] . ' </option>';
                        //$_SESSION['id'] = substr($val, 17, 2);

                    ?>
                        <option hidden>choisissez l'un des produits Suivants</option>
                        <option value="<?php echo $row['id']; ?><?php echo $row['Designation']; ?><?php echo $row['QTE_Stock']; ?><?php echo $row['Prix_Vente']; ?>"><?php echo $row['id']; ?> /des:<?php echo $row['Designation']; ?>/qte:<?php echo $row['QTE_Stock']; ?>/Prix:<?php echo $row['Prix_Vente']; ?> </option>


                    <?php } ?>

                </select>


                <div class="col-auto">
                    <p style="position: relative;left:850px;bottom:75px;">QTE</p>
                    <input type="number" class="form-control" min="0" id="inputPassword2" name="qt" style="position:relative;left:850px;width: 90px;bottom:78px;">
                </div>
                <div class="col-auto">
                    <p style="position: relative;left:980px;bottom:150px;">Prix Achat</p>
                    <input type="number" class="form-control" id="inputPassword2" min="0" name="achat" style="position:relative;left:980px;width: 90px;bottom:155px;">
                    <p style="position: relative;left:1100px;bottom:229px;">Num_Achat</p>
                    <input type="number" class="form-control" id="inputPassword2" min="1" name="numachat" style="position:relative;left:1100px;width: 110px;bottom:235px;">
                </div>
                <a href="" style="position:relative;left:1230px;top:-65px;">
                    <button type="submit" id="btn1" class="btn btn-primary" name="ajouter" style="background-color:green ;border: none;">

                        Ajouter
                    </button>
                </a>
            </div>
        </form>

        <div class="brde" style="border-bottom: 2px solid #eee;position:relative;bottom:240px;">

        </div>


        <div class="bg" style="position:relative ;bottom:250px;">

            <div class="list-prod">
                <table class="content-tab" style="width:75% ;position:relative;right:530px;bottom:30px;">
                    <?php
                    $numfact = $_GET['fact'];
                    $factr = $_GET['numFact'];
                    $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
                    $query = $connexion->query("SELECT * FROM produit,entree,facture,fournisseur,ligneentre where 
                    fournisseur.id=facture.idF
                    and fournisseur.id=entree.idfour
                    and entree.NmFact=facture.NumFacture
                    and entree.idEnt=ligneentre.ident
                    and ligneentre.idpd=produit.id
                    and facture.NumFacture='$factr'
                    and fournisseur.id='$numfact'");
                    while ($row = $query->fetch_array()) {








                    ?>
                        <thead>
                            <tr>
                                <th>Designation</th>

                                <th>Categorie</th>
                                <th>QTE</th>
                                <th>Prix Achat</th>


                                <th>Total</th>

                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr data-href="LigneAchat.php?ent=<?php echo $row['idEnt']; ?>&NumFact=<?php echo $_GET['numFact'] ?>&fact=<?php echo $_GET['fact'] ?>">
                                <a href="#">
                                    <td><?php echo $row['Designation'] ?></td>

                                    <td><?php echo $row['Categorie'] ?></td>
                                    <td><?php echo $row['QTE'] ?></td>
                                    <td><?php echo $row['prixAchat'] ?></td>

                                    <td><?php echo $row['Total'] ?></td>
                                    <td>

                                        <?php if ($row['status'] == 'Valider') : ?>
                                            <a href="" class="btnn" style="background-color:#1DBF57;text-decoration:none;color:black;padding-left:15px;"> </i><?php echo $row['status'] ?> </a>

                                        <?php else : ?>
                                            <a href="" class="btnn" style="background-color:rgb(153, 0, 0) ;text-decoration:none;color:black;padding-left:15px;"> </i><?php echo $row['status'] ?> </a>
                                    </td>

                                </a>

                            </tr>
                        <?php endif ?>
                    <?php
                    }

                    ?>
                    <tr>
                        <th>Designation</th>

                        <th>Categorie</th>
                        <th>QTE</th>
                        <th>Prix Achat</th>


                        <th>Total</th>

                        <th>Status</th>

                    </tr>



                        </tbody>

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