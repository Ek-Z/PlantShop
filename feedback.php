<?php
include "db.php";

$messages = [
    'OK' => 'Сообщение добавлено',
    'DELETE' => 'Сообщение удалено',
    'EDIT' => 'Сообщение изменено',
    'ERROR' => 'Ошибка'
];

$buttonText = "Добавить";
$action = "add";
$range = [];

if ($_GET['action'] == 'add') {
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
    $sql = "INSERT INTO feedback (name, feedback) VALUES ('{$name}','{$feedback}')";
    mysqli_query($db, $sql);
    header("Location: /feedback.php?message=OK");
    die();
}

if ($_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM `feedback` WHERE `feedback`.`id` = {$id}";
    $result = mysqli_query($db, $sql);
    header("Location: /feedback.php?message=delete");
}

if ($_GET['action'] == 'edit') {
    $id = (int)$_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM feedback WHERE id = {$id}");
    if ($result) $range = mysqli_fetch_assoc($result);
    $buttonText = "Править";
    $action = "save";
}

if ($_GET['action'] == 'save') {
    $id = (int)$_POST['id'];
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
    $sql = "UPDATE feedback SET name='{$name}',feedback='{$feedback}' WHERE id ={$id}";
    $result = mysqli_query($db, $sql);
    header("Location: /feedback.php?message=edit");
    die();
}

$result = mysqli_query($db, "SELECT * FROM `feedback` WHERE 1 ORDER BY id DESC ");
if (isset($_GET['message'])) {
    $message = $messages[$_GET['message']];
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
    <title>Feedback</title>
</head>

<body>
    <header class="container header">
        <?php include "menu.php" ?>
    </header>

    <?= $message ?><br>
    <div class="container form">
        <form action="/feedback.php?action=<?= $action ?>" method="post">
            <input hidden type="text" name="id" value="<?= $range['id'] ?>"><br>
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="<?= $range['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Feedback</label>
                <input type="text" name="feedback" class="form-control" value="<?= $range['feedback'] ?>">
            </div>
            <button type="submit" class="btn btn-success" name="ok"><?= $buttonText ?></button>
        </form>
    </div>

    <div class="container table_feedback">
        <table class="table table-striped">
            <tbody>
                <?php foreach ($result as $feedback) : ?>
                    <tr>
                        <td><b><?= $feedback['name'] ?>:</b></td>
                        <td><?= $feedback['feedback'] ?></td>
                        <td><a href="/feedback.php?action=edit&id=<?= $feedback['id'] ?>">[edit]</a></td>
                        <td><a href="/feedback.php?action=delete&id=<?= $feedback['id'] ?>">[x]</a><br></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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

</body>

</html>