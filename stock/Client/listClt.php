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

        $query = "INSERT INTO client (`Nameclt`,`RaisonSocialeClt`,`telclt`,`emailclt`,`faxclt`,`ville`,`adresseclt`) 
Values ('$nom','$RS','$nom','$tel',' $email','  $fax','$ville',' $adrs')";
        $result =  mysqli_query($connexion, $query);
        if ($result) {
            echo "<script> alert('Data saved');</script>";
            header('location:client.php');
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <title>Liste des clients</title>
</head>


<body>


    <div class="nav">
        <div class="heade" style="position:relative ; left:100px;">

        </div>
    </div>
    <div class="list-prod">
        <div class="row" style="position:relative ; right:300px;">
            <h3>listes des Clients</h3>
            <div class="lks">
                &nbsp;

            </div>
        </div>
    </div>

    <div class="form">
        <div class="bt" style="position:relative;right:280px;">
            <a href="../Client/client.php"><button type="button" id="btn1" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:#ccc;border: none; position:relative;right:50px;">
                    Retour
                </button></a>
            <button id="btn1" onclick="window.print();" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:rgb(158, 158, 21);border: none; position:relative;right:150px;">
                Download
            </button>
        </div>

        <div class="bg" style="position: relative;left:-350px;bottom:290px; " id="cnt">
            <div class="list-prod">
                <table class="content-tab" id="c" style="width:78%; position:relative;right:250px;">

                    <thead>
                        <tr style="background-color:white ;">
                            <th>Nom</th>
                            <th>Raison Sociale</th>

                            <th>Tel</th>

                            <th>Email</th>
                            <th>ville</th>
                            <th>adresse</th>



                        </tr>
                    </thead>
                    <?php
                    $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
                    $query = $connexion->query("SELECT * FROM client");
                    while ($row = $query->fetch_array()) {




                    ?>
                        <tbody>
                            <tr data-href="factFou.php?fact=<?php echo $row['id']; ?>">
                                <td><?php echo $row['Nameclt'] ?></td>
                                <td><?php echo $row['RaisonSocialeClt'] ?></td>
                                <td><?php echo $row['telclt'] ?></td>

                                <td><?php echo $row['emailclt'] ?></td>
                                <td><?php echo $row['ville'] ?></td>
                                <td><?php echo $row['adresseclt'] ?></td>







                            </tr>
                        <?php
                    }
                        ?>




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