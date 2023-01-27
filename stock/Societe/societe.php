<?php





$connexion = mysqli_connect('localhost', 'root', '', 'Stock');

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $activite = $_POST['Act'];
    $mbl = $_POST['mobile'];
    $adr = $_POST['Adr'];
    $mail = $_POST['mail'];
    $ville = $_POST['ville'];
    $zip = $_POST['zip'];
    $fax = $_POST['fax'];
    $logo = $_POST['Img'];
    if ( !empty($name) && !empty($activite) && !empty($mbl)
        && !empty($adr) && !empty($mail) && !empty($ville) && !empty($zip) && !empty($fax) 
    ) {

        $query = "INSERT INTO societe (`Name`,`ActivitePrincipale`,`Mobile`,`Adresse`,`Email`,`ville`,`zip`,`fax`,`logo`) 
Values ('$name','$activite','$mbl','$adr','$mail','$ville','$zip','$fax','$logo')";
        $result =  mysqli_query($connexion, $query);
        if ($result) {
           echo "<script> alert('Data saved');</script>";
           	$_SESSION['message'] = " ajoutée !"; 
            header('location: societe.php');
        } else {
           echo "<script> alert('Ooops!');</script>";
                       $_SESSION['msgErreur'] = "Erreur !"; 
        }
    } else {
        echo "empty!";
    }
}


?>




<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden ;">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Boxicons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- My CSS -->
    <link rel="stylesheet" href="../home/home.css">
    <link rel="stylesheet" href="/stock/produit/produit.css">
    <link rel="stylesheet" href="societe.css">

    <title>Societe</title>
</head>

<body style="height:300px;">

    <style>
        ::-webkit-scrollbar {
            display: none;
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


        .image {
            position: relative;
            right: 10px;
            background-image: url("../img/shop.jpg");
            height: 850px;
            background-repeat: repeat;
        }

        .block {
            background-color: #fff;
            position: relative;
            left: 320px;
            bottom: 780px;
            height: 750px;
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
        .msgerr{
    position:relative;
    top:0;
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #ff0000; 
    background: #fcc6c7; 
    border: 1px solid #c78585;
    width: 50%;
    text-align: center;
}
.msg {
    position:relative;
    top:0;
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
}
    </style>



    <!-- SIDEBAR -->
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
            <i class='bx bx-menu' style="position:relative;top:30px;font-size:25px;right:20px;"></i>
            <h3>Home</h3>
        </div>
    </div>

    <div class="image">

    </div>


    <div class="block" style="transform:translateX(0px)">
        <a href="../home/home.php">
            <button type="button" id="btn1" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:grey ;border: none; position:relative; bottom:65px; ">

                Retour
            </button>
        </a>


        <!-- Modal -->

        <div class="modal-header" style="  background-color: #676867; height: 60px; position:relative;bottom:37px;">
            <i class="fas fa-home-lg-alt" style="font-size: 30px; padding-left:10px;color:#fff;"></i>
            <h3 style="position: relative; right:850px;top:5px;color:#fff;">Societe</h3>







        </div>
        <?php if(isset($_SESSION['message'])){ ?>
	<div class="msg">
        
		<?php 
        
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php } ?>


<?php if(isset($_SESSION['msgErreur'])): ?>
	<div class="msgerr">
		<?php 
			echo $_SESSION['msgErreur']; 
			unset($_SESSION['msgErreur']);
		?>
	</div>
<?php endif ?>
        <form class="row g-3 needs-validation" method="post">
            <div class="col-md-4" style="position: relative; top:90px; left:50px;">
                <label for="validationCustom01" class="form-label">Nom de Societe</label>
                <input type="text" class="form-control" id="validationCustom01" value="" name="name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4" style="position: relative; top:90px;left: 50px;">
                <label for="validationCustom02" class="form-label">Activite Principale</label>
                <input type="text" class="form-control" id="validationCustom02" name="Act" value="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4" style="position: relative; top:90px;left:50px; width: 280px;">
                <label for="validationCustomUsername" class="form-label">Mobile</label>
                <div class="input-group has-validation">

                    <input type="text" class="form-control" id="validationCustomUsername" name="mobile" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="position: relative; top:180px;">
                <label for="validationCustom03" class="form-label" style="position: relative;left: 50px;bottom: 68px;">Adresse</label>
                <input type="text" class="form-control" id="validationCustom03" name="Adr" required style="width:400px;position: relative;left: 50px;bottom: 70px;">
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-4" style="position: relative; top:110px; width: 400px;">
                <label for="validationCustomUsername" class="form-label">Email</label>
                <div class="input-group has-validation">

                    <input type="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="mail" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="position: relative; top:120px; left:50px;width: 418px;">
                <label for="validationCustom05" class="form-label">Ville</label>
                <input type="text" class="form-control" id="validationCustom05" name="ville" required>
                <div class="invalid-feedback">
                    Please provide a valid ville.
                </div>
            </div>
            <div class="col-md-3" style="position: relative; top:120px; left:90px;width: 400px;">
                <label for="validationCustom05" class="form-label">Zip</label>
                <input type="number" class="form-control" id="validationCustom05" name="zip" required>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>




            <div class="col-md-3" style="position: relative; top:120px; left:50px;width: 418px;">
                <label for="validationCustom05" class="form-label">Fax</label>
                <input type="text" class="form-control" id="validationCustom05" name="fax" required>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>
            <div class="col-md-3" style="position: relative; top:120px; left:90px;width: 400px;">
                <label for="formFile" class="form-label">Logo</label>
                <input class="form-control" type="file" id="formFile" name="Img">
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>

            <div class="bordr" style="border-top: 1px solid #ccc; position:relative; top:150px;left:8px;width: 1000px;">

            </div>





            <div class="col-12" style="position:relative ; top:150px; left:870px; ">
                <button   type="submit" class="btn btn-primary" name="update" style="position:relative;right:50px;background-color:#676867;border:none;">Mettre a jour</button>
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