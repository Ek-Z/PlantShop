<?php
include "db.php";

$login = $_SESSION['login'];
if ($login != 'admin') {
    die('Доступ к странице запрещен');
}

$orders = mysqli_query($db, "SELECT * FROM `orders` WHERE 1");
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
                <?php foreach ($orders as $unit) : ?>
                    <tr>
                        <td><?= $unit['id'] ?></td>
                        <td><?= $unit['name'] ?></td>
                        <td><?= $unit['phone'] ?></td>
                        <td><?= $unit['status'] ?></td>
                        <td><a href="order.php?id=<?= $unit['id'] ?>">Order details</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>