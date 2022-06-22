<?php
include "db.php";
$goods = mysqli_query($db, "SELECT * FROM `catalog` WHERE  id <= 9");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>

<body>
    <div class="container wrapper">
        <header class="header">
            <?php include "menu.php" ?>
        </header>
        <hr>
        <div class="top_text">
            <h4 class="top_heading">The Most Important Things Aren't Things<br>
                So We'll Design Expiriences</h4>
            <a href="catalog.php"><button type="button" class="btn btn-success top_button">Catalog</button></a>

        </div>
    </div>

    <div class="container carousel">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="row justify-content-between">
                        <?php foreach ($goods as $item) : ?>
                            <?php if ($item['id'] <= 3) : ?>
                                <div class="col">
                                    <div class="card w-100">
                                        <img src="img/plants/<?= $item['image'] ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $item['name'] ?></h5>
                                            <p class="card-text"><?= $item['price'] ?> RUB</p>
                                            <p><a href="item.php?id=<?= $item['id'] ?>" class="card-link">Read more</a></p>
                                            <button type="submit" class="btn btn-success" name="ok">Add to my cart</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row justify-content-between">
                        <?php foreach ($goods as $item) : ?>
                            <?php if ($item['id'] > 3 && $item['id'] <= 6) : ?>
                                <div class="col">
                                    <div class="card w-100">
                                        <img src="img/plants/<?= $item['image'] ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $item['name'] ?></h5>
                                            <p class="card-text"><?= $item['price'] ?> RUB</p>
                                            <p><a href="item.php?id=<?= $item['id'] ?>" class="card-link">Read more</a></p>
                                            <button type="submit" class="btn btn-success" name="ok">Add to my cart</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row justify-content-between">
                        <?php foreach ($goods as $item) : ?>
                            <?php if ($item['id'] > 6 && $item['id'] <= 9) : ?>
                                <div class="col">
                                    <div class="card w-100">
                                        <img src="img/plants/<?= $item['image'] ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $item['name'] ?></h5>
                                            <p class="card-text"><?= $item['price'] ?> RUB</p>
                                            <p><a href="item.php?id=<?= $item['id'] ?>" class="card-link">Read more</a></p>
                                            <button type="submit" class="btn btn-success" name="ok">Add to my cart</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>



            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>

    <footer class="container footer">
        <hr>
        <div class="row align-items-center">
            <div class="col">
                <img src="img/logo.png" alt="logo" width="150" height="150">
            </div>

            <div class="col">
                <h4 class="footer__heading">Information</h4>
                <a class="footer__link" href="#">
                    <p>About Us</p>
                </a>
                <a class="footer__link" href="#">
                    <p>How To Plant Houseplants</p>
                </a>
                <a class="footer__link" href="#">
                    <p>Pot & Planter Size Guide</p>
                </a>
                <a class="footer__link" href="#">
                    <p>Privacy & Cookies</p>
                </a>



            </div>

            <div class="col">
                <h4 class="footer__heading">#MakeLifeGreener</h4>
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