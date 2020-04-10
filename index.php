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
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="static/bootstrap.css">
    <link rel="stylesheet" href="static/style.css">
    <title>脆弱性　体験型学習サイト</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <h3 class="text-light">Experience-Based Learning</h3>
    </nav>

    <div class="card m-2">
        <div class="card-body">
            <h4 class="card-title">Purpose</h4>
            <p class="card-text">            
                <span data-toggle="tooltip" data-placement="top" title="ここでは、あなたが攻撃者となり脆弱性に関する危険性や攻撃手法を学びます">
                    Here, you become an attacker and learn the dangers and vulnerabilities of vulnerabilities.
                </span><br>
                <span data-toggle="tooltip" data-placement="top" title="また、攻撃方法を理解し「ペネトレーションテスト」に役立てる目的もあります">
                    It also has the purpose of understanding the attack method and using it for "penetration tests".
                </span>
            </p>
        </div>
    </div>
    <ul class="list-group m-2">
        <?php foreach(constants::VULNERABILITY_LIST as $key => $val): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center js-select-pages list-hover-primary" data-page="<?=$key;?>" data-title="<?=$val;?>">
                <?=$val;?><span>></span>
            </li>
        <?php endforeach; ?>
    </ul> 


    <script type="text/javascript" src="static/jquery.js"></script>
    <script type="text/javascript" src="static/bootstrap.js"></script>
    <script type="text/javascript" src="static/index.js"></script>
    <script type="text/javascript" src="static/popper.js"></script>
</body>
</html>