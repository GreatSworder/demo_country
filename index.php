<?php
require_once('countries.php');

$countries=new countries();
if($_POST)
{
    $countries->form();
    die();
}
$countries_dict=$countries->show_countries();
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
        <div class="row">
            <div class="col-3">Название страны</div>
            <div class="col-9">Описание страны</div>
        </div>
        <?php
            foreach ($countries_dict as $item)
            {
                ?>
                <div class="row">
                    <div class="col-3"><?=htmlspecialchars($item['country_name'])?></div>
                    <div class="col-9"><?=htmlspecialchars($item['country_descr'])?></div>
                </div>
                <?php
            }
        ?>
    </div>
    <form action="index.php" method="post">
        <input type="text" name="country_name" placeholder="Название страны" maxlength="50">
        <textarea name="country_descr" cols="25" rows="2" placeholder="Краткое описание страны"></textarea>
        <button name="country_add" value="add">Добавить страну</button>
    </form>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/tooltip.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>