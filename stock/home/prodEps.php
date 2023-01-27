<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar menu With Sub-menus | Using HTML, CSS & JQuery</title>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
</head>





<script type="text/javascript">
    window.onload = function() {
        document.getElementById("generatePDF")
            .addEventListener("click", () => {
                const invoice = this.document.getElementById("content");

                var opt = {
                    margin: 1,
                    filename: 'produit-Epuises.pdf',
                    image: {
                        type: 'jpg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                };
                html2pdf().from(invoice).set(opt).save();
            })
    }
</script>

<body style="overflow-x:hidden;">
    <?php
    $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
    $query = $connexion->query("SELECT * FROM societe where id =1");
    while ($row = $query->fetch_array()) {




    ?>
        <div class="head">
            <div class="name">
                <h1><?php echo $row['Name']; ?></h1>
            </div>
            <div class="info">
                <p><strong>Address:</strong><?php echo $row['Adresse']; ?></p>
                <p><strong>Mob:</strong><?php echo $row['Mobile']; ?></p>
                <p><strong>Email:</strong><?php echo $row['Email']; ?></p>
            </div>
        </div>
    <?php } ?>
    <style>
        .head {
            position: relative;
            padding: 20px 20px;
            left: 400px;
        }

        .info {
            position: relative;
            top: 10px;
            left: 15px;
        }

        .h5 {
            position: relative;
            top: 10px;
            left: 20px;
        }
    </style>
    <div class="brder" style="border-bottom:2px solid #000;"></div>
    <div class="h5">Liste Produit épuisé</div>
    <div class="bt" style="position: relative;top:250px;">
        <a href="../home/home.php">
            <button type="button" id="btn1" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:grey ;border: none;">

                Retour
            </button>
        </a>
        <button id="generatePDF" class="btn btn-primary" style="background-color:rgb(36, 179, 36) ;border: none;position:relative;bottom:210px;left:50px; width:68px;">

            PDF
        </button>


    </div>
    <button id="btn1" onclick="window.print();" class="btn btn-primary" data-bs-target="#exampleModal" style="background-color:rgb(158, 158, 21);border: none; position:relative;left:230px;top:5px;">
        Print
    </button>
    <div class="bg" id="content">
        <div class="list-prod">
            <table class="content-tab" style="width:78% ;position:relative;right:800px;">
                <thead>
                    <tr>
                        <th>Designation</th>
                        <th>Code barre</th>
                        <th>Categorie</th>





                        <th>Prix_Vente</th>
                        <th>QTE_STOCK</th>


                    </tr>
                </thead>
                <?php
                $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connexion));
                $query = $connexion->query("SELECT * FROM produit where QTE_Stock between 0 and 1");
                while ($row = $query->fetch_array()) {




                ?>

                    <tbody>

                        <tr data-href="print.php?fact=<?php echo $row['id']; ?>">
                            <a href="#">
                                <td><?php echo $row['Designation'] ?></td>
                                <td><?php echo $row['Code barre'] ?></td>
                                <td><?php echo $row['Categorie'] ?></td>


                                <td><?php echo $row['Prix_Vente'] ?></td>
                                <td><?php echo $row['QTE_Stock'] ?></td>


                            </a>

                        </tr>

                    <?php
                }
                    ?>




                    </tbody>

            </table>





        </div>
    </div>

</body>

</html>