<?php include_once("parts/Include.php"); ?>
<?php include_once("./../back/createtestdb.php");?>
<?php include_once("./../back/selecttestdb.php");?>

<?php include_once("parts/PartsHead.php"); ?>

<div id="container">

    <div class="card m-2">
        <div class="card-body">
            <h4 class="card-title">Commentary</h4>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <div class="card-text font-size-08">
            アプリケーションのセキュリティ上の不備を意図的に利用し、<br>
            アプリケーションが想定しないSQL文を実行させることにより、データベースシステムを不正に操作する攻撃方法のこと。 <br>
            また、その攻撃を可能とする脆弱性のことである。
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
                            <input type="text" class="form-control" name="user_id" id="user_id">
                        </div>
                        <div class="form-group">
                            <label for="user_pw">User PW</label>
                            <input type="text" class="form-control" name="user_pw" id="user_pw">
                        </div>
                        <div class="form-group">
                            <label for="hidden_attr">Hidden</label>
                            <input type="hidden" class="form-control" id="hidden_attr">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary w-100">SEND</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-blue">
                <h4 class="card-title">SERVER</h4>
                <h6 class="card-subtitle mb-2 text-muted">DataBase: (table)Personal Data</h6>
                <div class="card-text">
                    <table class="table table-sm">
                        <thead>
                            <th>ID</th><th>PW</th><th>NAME</th><th>AGE</th><th>ADDRESS</th><th>SALARY</th>
                        </thead>
                        <tbody>
                            <?php if(isset($testData) === false): ?>
                                <tr><td colspan="5" class="text-danger">DBテーブルは削除されました</td></tr>
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
                    <table class="table table-sm table-borderless w-100">
                        <tbody>
                            <?php if(isset($selectData)): ?>
                                <?php foreach($selectData as $key => $val): ?>
                                    <tr><td class="w-30">ID:</td><td class="w-70"><?=$key?></td></tr>
                                    <tr><td class="w-30">PW:</td><td class="w-70"><?=$val[0]?></td></tr>
                                    <tr><td class="w-30">NAME:</td><td class="w-70"><?=$val[1]?></td></tr>
                                    <tr><td class="w-30">AGE:</td><td class="w-70"><?=$val[2]?></td></tr>
                                    <tr><td class="w-30">ADDRESS:</td><td class="w-70"><?=$val[3]?></td></tr>
                                    <tr><td class="w-30">SALARY:</td><td class="w-70"><?=$val[4]?></td></tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-blue">
                <h4 class="card-title">SERVER</h4>
                <h6 class="card-subtitle mb-2 text-muted">Result</h6>
                <div class="card-text">
                </div>
            </div>
        </div>
    </div>





</div>


<?php include_once("parts/PartsFoot.php"); ?>