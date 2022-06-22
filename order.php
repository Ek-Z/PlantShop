<?php
include "db.php";

$login = $_SESSION['login'];
if ($login != 'admin') {
    die('Доступ к странице запрещен');
}

$id = (int)$_GET['id'];
$orders = mysqli_query($db, "SELECT * FROM `orders` WHERE id = {$id}");
foreach ($orders as $unit) {
    $session = $unit['id_session'];
}
$orderInfo = mysqli_query($db, "SELECT cart.id cart_id, catalog.image, catalog.id catalog_id, catalog.name, catalog.description, catalog.price FROM cart,catalog WHERE cart.id_goods=catalog.id AND id_session = '{$session}'");

$result = mysqli_query($db, "SELECT SUM(catalog.price) as summ  FROM cart,catalog WHERE cart.id_goods=catalog.id AND  id_session = '{$session}'");
$row = mysqli_fetch_assoc($result);
$summ = $row['summ'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Admin</title>
</head>

<body>
    <header class="container header">
        <?php include "menu.php" ?>
    </header>
    <div class="container">
        <table class="table">
            <tbody>
                <?php foreach ($orderInfo as $item) : ?>
                    <tr>
                        <td><img src="img/plants/<?= $item['image'] ?>" width="60" height="60"></td>
                        <td><b><?= $item['name'] ?></b></td>
                        <td><?= $item['price'] ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><strong>Итого: <?= $summ ?></strong></td>
                </tr>
            </tbody>
        </table>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>