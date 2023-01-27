<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Boutique N°1 d'achat et vente en ligne au Maroc ✓ TVs, smartphones, électroménager, mode, jouets, sport, jeux vidéos, déco et bien plus !" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/57a42140fc.js" crossorigin="anonymous"></script>
    <title>ligne achat</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/57a42140fc.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css" />
    <!--icon set up-->
</head>


<body>















    <h1 class="heading" id="Gestion-des-commandes" style="text-align:center;margin-top:200px;font-size:35px;margin-bottom:100px">Gestion des Achats</h1>



    <table class="table table-light" style="font-size:17px">
        <thead>
            <tr>

                <th class="text-center">IdProd</th>
                <th class="text-center">Designation</th>
                <th class="text-center">QTE_Achete</th>

                <th class="text-center">Total_prix</th>

                <th class="text-center">Id Entree</th>

                <th class="text-center">State Of Order</th>
                <th class="text-center">Action</th>

            </tr>
        </thead>
        <tbody>

        <tbody>

            <tr>
                <?php
                session_start();
                $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));;

                $ident = $_GET['ent'];
                $query1 = $connexion->query("SELECT * FROM `ligneentre`,`produit` WHERE produit.id=ligneentre.idpd 
 and ligneentre.ident='$ident' ");






                while ($row = $query1->fetch_array()) {

                ?>
                    <td class="text-center align-middle"><?php echo $row['idpd'] ?></td>
                    <td class="text-center align-middle"><?php echo $row['Designation'] ?></td>
                    <td class="text-center align-middle"><?php echo $row['quantite'] ?></td>
                    < <td class="text-center align-middle"><?php echo $row['Totale'] ?></td>
                        <td class="text-center align-middle"><?php echo $row['ident'] ?></td>
                        <td class="text-center align-middle"><?php echo $row['state'] ?></td>



                        <td class="text-center align-middle" style="display:flex;flex-direction:column;">
                            <a href="stateCommande.php?ent=<?php echo $row['ident']; ?>&valid=true&quantiter=<?php echo $row['quantite']; ?>&prod=<?php echo $row['idpd']; ?>&fact=<?php echo $_GET['fact'] ?>&numFact=<?php echo $_GET['NumFact'] ?>" style="text-decoration:none;">
                                <button type="button" class="btn btn-success btnnn">Valide</button></a>

                            <a href="stateCommande.php?ent=<?php echo $row['ident']; ?>&valid=supprimer&fact=<?php echo $_GET['fact'] ?>&quantiter=<?php echo $row['quantite']; ?>&numFact=<?php echo $_GET['NumFact'] ?>&prod=<?php echo $row['idpd']; ?>" style="text-decoration:none;">
                                <button type="button" class="btn btn-danger btnnn">Delete</button>
                            </a>
                            </a>
                        </td>
            </tr>



        <?php break;
                } ?>












        </tbody>
    </table>
</body>

</html>