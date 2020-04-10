<?php
    header('Content-Type: text/html; charset=UTF-8');

    include_once("back/constants.php");

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" href="static/bootstrap.css">
    <link rel="stylesheet" href="static/style.css">
    <title>脆弱性　体験型学習サイト</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <h3 class="text-light">Experience-Based Learning</h3>
    </nav>
    <ul class="list-group">
        <?php foreach(constants::VULNERABILITY_LIST as $key => $val): ?>
            <li class="list-group-item js-select-pages list-hover-primary" data-page="<?=$val;?>"><?=$key;?></li>
        <?php endforeach; ?>
    </ul> 


    <script type="text/javascript" src="static/jquery.js"></script>
    <script type="text/javascript" src="static/bootstrap.js"></script>
    <script type="text/javascript" src="static/index.js"></script>
</body>
</html>