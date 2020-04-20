<?php include_once("parts/Include.php"); ?>
<?php include_once("./../back/SqlInjection/createtestdb.php");?>
<?php include_once("./../back/SqlInjection/selecttestdb.php");?>

<?php include_once("parts/PartsHead.php"); ?>

<div id="container">

    <div class="card m-2">
        <div class="card-body">
            <h4 class="card-title">Commentary</h4>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <div class="card-text font-size-08">
            アプリケーションのセキュリティ上の不備を意図的に利用し、<br>
            アプリケーションが想定しないSQL文を実行させることにより、データベースシステムを不正に操作する攻撃方法のこと。 <br>
            また、その攻撃を可能とする脆弱性のことである。<br>
            </div>
            <div class="text-danger font-size-08 mt-2">※ここでは意図的に脆弱性を含むプロセスが実装されています</div>
            <div class="text-danger font-size-08 mt-2">
                ※今回は、入力フォームにおいて攻撃コードを埋め込む検証となりますが<br>
                　攻撃者は Hidden要素やSelectBox, CheckBox, TextArea など、あらゆるフォーム要素において<br>
                　攻撃コードを埋め込む事が可能という事を念頭においてください。
            </div>
            <div class="text-primary font-size-08 mt-2">▼入力内容を選択して「SEND」ボタンをクリックしてください</div>
            <div class="card-text font-size-08 mt-3">
                <label for="method">入力タイプの選択</label><br>
                <select class="custom-select w-12" name="method" id="method">
                    <option value="1">通常</option>
                    <option value="2">個人情報全取得</option>
                    <option value="3">DBデータ破壊</option>
                </select>
                <span id="selectMsg" class="pl-3">想定されたケースでユーザー情報を表示します</span>
            </div>
        </div>
    </div>

    <div id="top_container" class="d-flex flex-row w-100">
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-orange">
                <h4 class="card-title">CLIENT</h4>
                <h6 class="card-subtitle mb-2 text-muted">Form</h6>
                <div class="card-text">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="user_id">User ID</label>
                            <input type="text" class="form-control" name="user_id" id="user_id" value="1">
                        </div>
                        <div class="form-group">
                            <label for="user_pw">User PW</label>
                            <input type="text" class="form-control" name="user_pw" id="user_pw" value="11">
                        </div>
                        <input type="hidden" name="update" id="update" value="1">
                        <button type="submit" class="btn btn-sm btn-primary w-100">SEND</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-blue">
                <h4 class="card-title">SERVER</h4>
                <h6 class="card-subtitle mb-2 text-muted">DataBase: (table) Personal Data</h6>
                <div class="card-text">
                    <table class="table table-sm">
                        <thead>
                            <th>ID</th><th>PW</th><th>NAME</th><th>AGE</th><th>ADDRESS</th><th>SALARY</th>
                        </thead>
                        <tbody>
                            <?php if(count($testData) === 0): ?>
                                <tr><td colspan="5" class="text-danger">※攻撃者によりDBデータは全て削除されました</td></tr>
                            <?php else: ?>
                                <?php foreach($testData as $key => $val): ?>
                                    <tr><td><?=$key?><td><?=$val[0]?></td><td><?=$val[1]?></td><td><?=$val[2]?></td><td><?=$val[3]?></td><td><?=$val[4]?></td></tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="btm_container" class="d-flex flex-row w-100">
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-orange">
                <h4 class="card-title">CLIENT RESULT</h4>
                <h6 class="card-subtitle mb-2 text-muted">Personal Data</h6>
                <div class="card-text">
                    <?php if(isset($selectData)): ?>
                        <?php foreach($selectData as $key => $val): ?>
                            <table class="table table-sm table-borderless w-100 m-2 bg-light">
                                <tbody>
                                    <tr><td class="w-25">ID:</td><td class="w-25 text-info font-weight-bold"><?=$key?></td><td class="w-25">PW:</td><td class="w-25 text-info font-weight-bold"><?=$val[0]?></td></tr>
                                    <tr><td class="w-25">NAME:</td><td class="w-25 text-info font-weight-bold"><?=$val[1]?></td><td class="w-25">AGE:</td><td class="w-25 text-info font-weight-bold"><?=$val[2]?></td></tr>
                                    <tr><td class="w-25">ADDRESS:</td><td class="w-25 text-info font-weight-bold"><?=$val[3]?></td><td class="w-25">SALARY:</td><td class="w-25 text-info font-weight-bold"><?=$val[4]?></td></tr>
                                </tbody>
                            </table>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-blue">
                <h4 class="card-title">SERVER EXECUTE CODE</h4>
                <div class="card-text">
                    <?=$selectSql;?>
                </div>
            </div>
        </div>
    </div>





</div>


<?php include_once("parts/PartsFoot.php"); ?>