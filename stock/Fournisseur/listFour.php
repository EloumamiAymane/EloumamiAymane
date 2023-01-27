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
Values ('$nom','$RS','$nom','$tel',' $email','  $fax','$ville',' $adrs')";
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
<html lang="en" style="   overflow-y: scroll;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Boxicons -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- My CSS -->
    <link rel="stylesheet" href="../home/style.css">
    <link rel="stylesheet" href="../produit/produit.css">

    <title>liste des fournisseurs</title>
</head>

<body>


    <div class="nav">
        <div class="heade" style="position:relative ; left:100px;">

        </div>
    </div>
    <div class="list-prod">
        <div class="row" style="position:relative ; right:300px;">
            <h3>Listes des Fournisseurs</h3>
            <div class="lks">
                &nbsp;

            </div>
        </div>
    </div>

    <div class="form">
        <div class="bt" style="position:relative;right:280px;">
            <a href="../Fournisseur/fournisseur.php"><button type="button" id="btn1" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:#ccc;border: none; position:relative;right:50px;">
                    Retour
                </button></a>
            <button type="button" onclick="window.print();" id="btn1" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:rgb(158, 158, 21);border: none; position:relative;left:50px;">
                Download
            </button>

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
    <div class="bg" style="position: relative;left:20px;">
        <div class="list-prod">
            <table class="content-tab" style="width:90%; position:relative;right:290px;">
                <?php
                $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
                $query = $connexion->query("SELECT * FROM fournisseur");
                while ($row = $query->fetch_array()) {




                ?>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Raison Sociale</th>

                            <th>Tel</th>

                            <th>Email</th>
                            <th>ville</th>
                            <th>adresse</th>



                        </tr>
                    </thead>
                    <tbody>
                        <tr data-href="factFou.php?fact=<?php echo $row['id']; ?>">
                            <td><?php echo $row['NameFour'] ?></td>
                            <td><?php echo $row['RaisonSocialefour'] ?></td>
                            <td><?php echo $row['telfour'] ?></td>

                            <td><?php echo $row['emailfour'] ?></td>
                            <td><?php echo $row['villefour'] ?></td>
                            <td><?php echo $row['adressefour'] ?></td>







                        </tr>
                    <?php
                }
                    ?>
                    <tr>
                        <th>Nom</th>
                        <th>Raison Sociale</th>

                        <th>Tel</th>

                        <th>Email</th>
                        <th>ville</th>
                        <th>adresse</th>


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