<?php
include "db.php";
$action = "delete";

if ($_GET['action'] == 'delete') {
    $id_session = session_id();
    $id = (int)$_GET['id'];
    $result = mysqli_query($db, "SELECT `id_session` FROM `cart` WHERE `id`={$id}");
    $row = mysqli_fetch_assoc($result);
    if ($session == $row['id_session'])
        mysqli_query($db, "DELETE FROM `cart` WHERE `cart`.`id` = {$id}");
    header("Location: /cart.php");
}

if ($_GET['action'] == 'order') {
    $id_session = session_id();
    $name = htmlspecialchars(strip_tags(mysqli_real_escape_string($db, $_POST['name'])));
    $phone = htmlspecialchars(strip_tags(mysqli_real_escape_string($db, $_POST['phone'])));
    $sql = "INSERT INTO `orders`(`name`, `phone`, `id_session`) VALUES ('{$name}','{$phone}','{$id_session}')";
    session_regenerate_id();
    mysqli_query($db, $sql);
    header("Location: /cart.php?message=order");
}

$goods = mysqli_query($db, "SELECT * FROM `catalog`");
$cart = mysqli_query($db, "SELECT cart.id cart_id, catalog.image, catalog.id catalog_id, catalog.name, catalog.description, catalog.price FROM cart,catalog WHERE cart.id_goods=catalog.id AND id_session = '{$session}'");

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Cart</title>
</head>

<body>
    <header class="container header">
        <?php include "menu.php" ?>
    </header>
    <div class="container">
        <h3 class="cart_header">Товары в корзине</h3>
        <table class="table">
            <tbody>
                <?php foreach ($cart as $item) : ?>
                    <tr>
                        <td><img src="img/plants/<?= $item['image'] ?>" width="60" height="60"></td>
                        <td><b><?= $item['name'] ?></b></td>
                        <td><?= $item['price'] ?></td>
                        <td><a href="/cart.php?action=delete&id=<?= $item['cart_id'] ?>">[x]</a><br></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><strong>Итого: <?= $summ ?></strong></td>
                </tr>
            </tbody>
        </table>
        <p>Оформите заказ</p>
        <form action="?action=order" method="POST">
            <input type="text" name="name">
            <input type="text" name="phone">
            <input type="submit" value="Оформить заказ">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>