<?php
require_once('countries.php');
$countries = new countries();
if ($_POST)
{
    $countries->form();
    die();
}
$countries_dict = $countries->show_countries();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row header">
        <div class="col-3">Название страны</div>
        <div class="col-9">Описание страны</div>
    </div>
    <div class="row">
        <div class="content">
            <?php
            foreach ($countries_dict as $item)
            {
                ?>
                <div class="row">
                    <div class="col-3 left-column"><?= htmlspecialchars($item['country_name']) ?></div>
                    <div class="col-9 right-column"><?= htmlspecialchars($item['country_descr']) ?></div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="row add-country-form">
        <div class="col-10 offset-1">
            <div class="form-row">
                <form action="index.php" method="post">
                    <input type="text" class="form-control-inline country_name" name="country_name"
                           placeholder="Название страны" maxlength="50" required>
                    <textarea class="form-control-inline country_descr" name="country_descr" cols="30" rows="1"
                              placeholder="Описание страны"
                              maxlength="200"></textarea>
                    <button class="btn btn-primary country_add" name="country_add" value="add">Добавить страну</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/tooltip.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>