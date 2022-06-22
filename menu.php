<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-xxl">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="catalog.php">Catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="feedback.php">Feedback</a>
                </li>
            </ul>

            <?if (!$auth) :?>
            <form method="post">
                <input type='text' name='login'>
                <input type='password' name='pass'>
                <input type='submit' name='send' value='Login'>
            </form>
            <? else: ?>
            Добро пожаловать <?= $user ?>! <a href="/?logout">[x]</a><br>
            <? endif; ?>
            <a href="cart.php" class="cart_link"><img src="img/cart.svg" alt="Cart" width="20" height="20">Cart <?= $count ?></a>
        </div>
    </div>
</nav>