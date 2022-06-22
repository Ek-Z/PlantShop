<?php
include "db.php";

$id = (int)$_GET['id'];
$goods = mysqli_query($db, "SELECT * FROM `catalog` WHERE id = {$id}");
$item = mysqli_fetch_assoc($goods);

if ($_GET['action'] == 'add') {
    $id_goods = $id;
    $id_session = session_id();
    $sql = "INSERT INTO cart (id_session, id_goods) VALUES ('$id_session', '$id_goods')";
    mysqli_query($db, $sql);
    header("Location: /catalog.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title><?= $item['name'] ?></title>
</head>

<body>
    <div class="container-xxl item_background">
        <header class="container header">
            <?php include "menu.php" ?>
        </header>

        <form action="item.php?action=add&id=<?= $item['id'] ?>" method="post">
            <div class="container item_card">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/plants/<?= $item['image'] ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title item_title"><?= $item['name'] ?></h5>
                                <p class="card-text"><?= $item['description'] ?></p>
                                <p class="card-text"><?= $item['price'] ?> RUB</p>
                                <button type="submit" class="btn btn-success" name="ok">Add to my cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <footer class="container footer">
        <hr>
        <div class="row align-items-center">
            <div class="col">
                <img src="img/logo.png" alt="logo" width="150" height="150">
            </div>

            <div class="col">
                <p><b>#MakeLifeGreener</b></p>
                <p>We believe in the power of plants to lift the spirit, calm the mind and clean the air.</p>
                <p>We brings you the wellbeing benefits of greenery in style.</p>
            </div>
        </div>
        <hr>
        <p>© 2021 All right reserved</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>