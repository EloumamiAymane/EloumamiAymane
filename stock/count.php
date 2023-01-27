<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connection));


    $sql = " SELECT count(*) as total from entree where status='Valider' and NmFact='00/14'";
    $rslt = mysqli_query($connexion, $sql);
    $values = mysqli_fetch_assoc($rslt);
    $num_rows = $values['total'];
    echo $num_rows;




    ?>
</body>

</html>