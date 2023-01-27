<?php


$connexion = mysqli_connect('localhost', 'root', '', 'Stock');
$limit = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
if ($page == 0) {
    header("Location:FactProd.php");
} else {
    $start = ($page - 1) * $limit;



    $result = $connexion->query("SELECT * FROM produit LIMIT $start, $limit");
    $prod = $result->fetch_all(MYSQLI_ASSOC);


    $result1 = $connexion->query("SELECT count(id) AS id FROM produit");
    $custCount = $result1->fetch_all(MYSQLI_ASSOC);
    $total = $custCount[0]['id'];
    $pages = ceil($total / $limit);

    $Previous = $page - 1;
    $Next = $page + 1;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Code-barre</title>
</head>


<body>
    <div class="header">
        <div class="title">
            <h1>Aetech Informatique</h1>
        </div>
    </div>
    <div class="prod">
        <div class="min-title">
            <h1>Liste des Produits</h1>
        </div>
    </div>

    <table style="border-collapse:collapse ;">
        <thead>
            <?php foreach ($prod as $prods) :  ?>
                <tr>
                    <th>Designation</th>
                    <th class="lft">Code Barre</th>
                </tr>
        </thead>
        <tr>
            <td><?php echo $prods['Designation'] ?></td>
            <td class="lft"><img src="../img/barcode .jpg" alt="" height="90" width="90" style="position:relative ; left:30px;"> <span class="bar" style="position:relative ; right:50px;top:45PX;"><?php echo $prods['Code barre'] ?></span></td>
        </tr>

    <?php endforeach; ?>
    </table>

    <nav aria-label="Page navigation example" style="position:relative ;top:90px;left:950px;">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="FactProd.php?page=<?= $Previous; ?> ">Previous</a></li>
            <?php for ($i = 1; $i <= $pages; $i++) : ?>
                <li class="page-item"><a class="page-link" href="FactProd.php?page=<?= $i; ?>"><?= $i; ?></a></li>
            <?php endfor; ?>
            <li class="page-item"><a class="page-link" href="FactProd.php?page=<?= $Next; ?>">Next</a></li>
        </ul>
    </nav>

    <div class="col-12">
        <button class="btn btn-primary" onclick="window.print();" id="btn2" type="submit" name="update" STYLE="position:absolute;left:1100px;bottom:500px;">Imprimer</button>
        <a href="../produit/produits.php"> <button class="btn btn-primary" id="btn2" type="submit" name="update" STYLE="position:absolute;left:1000px;bottom:500px;background-color:#ccc;border:none;">Retour</button></a>
    </div>

</body>
<style>
    body {
        overflow-x: hidden;
    }

    .title {


        position: relative;
        bottom: 20px;
        left: 500px;


    }

    .header {
        border-bottom: 1px solid #ccc;
        position: relative;
        top: 50px;

    }

    .min-title {
        width: 100%;
        position: relative;
        top: 40px;
        left: 0px;
        border-bottom: 1px solid #ccc;
        height: 70px;
        padding-left: 80px;
    }

    .min-title h1 {
        position: relative;
        top: 10px;
    }

    .content {
        position: relative;
        top: 250px;
    }

    table tr {
        padding-left: 40px;

        position: relative;
        top: 80px;

        height: 80px;


    }

    table tr th {
        padding-left: 80px;
        padding-top: 30px;


    }

    tr td {
        padding-left: 100px;
        position: relative;


    }

    .lft {
        position: relative;
        left: 430px;


    }
</style>
<script type="text/javascript">

</script>


</html>