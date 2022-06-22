<?php
include "db.php";

$action = "add";

if ($_GET['action'] == 'add') {
    $session = session_id();
    $id = (int)$_POST['id'];
    mysqli_query($db, "INSERT INTO cart (id_session, id_goods) VALUES ('{$session}', {$id})");
    header("Location: /catalog.php");
}

$goods = mysqli_query($db, "SELECT * FROM `catalog` WHERE 1");
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
    <title>Catalog</title>
</head>

<body>
    <div class="container">

        <header class="header">
            <?php include "menu.php" ?>
        </header>

        <hr>

        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
            <?php foreach ($goods as $item) : ?>
                <div class="col">
                    <form action="catalog.php?action=add" method="post">
                        <input hidden type="text" name="id" value="<?= $item['id'] ?>"><br>
                        <div class="card text-center p-3 bg-light">
                            <img src="img/plants/<?= $item['image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $item['name'] ?></h5>
                                <p class="card-text"><?= $item['price'] ?> RUB</p>
                                <p><a href="item.php?id=<?= $item['id'] ?>" class="card-link">Read more</a></p>
                                <button type="submit" class="btn btn-success" name="ok">Add to my cart</button>
                            </div>
                    </form>
                </div>
        </div>
    <?php endforeach; ?>
    </div>
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