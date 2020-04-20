
<?php include_once("parts/Include.php"); ?>

<?php include_once("./../back/AuthenicationCredentials/createtestdb.php");?>
<?php include_once("./../back/AuthenicationCredentials/selecttestdb.php");?>
<?php include_once("./../back/AuthenicationCredentials/authenicationcredentials.php");?>

<?php include_once("parts/PartsHead.php"); ?>

<div id="container">

    <div class="card m-2">
        <div class="card-body">
            <h4 class="card-title">Commentary</h4>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <div class="card-text font-size-08">
            攻撃者は認証情報を入力せずにCookieを書き換え、認証通過。<br>
            認証後に閲覧できる個人情報を不正入手したり、<br>
            他人になりすまし投稿するなどの被害が予想されます
            </div>
            <div class="card-text m-2">
                <div class="text-primary">◆攻撃成立条件◆</div>
                <div class="text-primary"><small>・認証にCookieを利用している</small></div>
                <div class="text-primary"><small>・認証済みのフラグをCookieに保存している</small></div>
                <div class="text-primary"><small>・ログイン試行回数を制限していない</small></div>
            </div>
            <div class="text-danger font-size-08 mt-2">※ここは前提条件などを記載します
            </div>
            <div class="text-danger font-size-08 mt-2">※ここでは意図的に脆弱性を含むプロセスが実装されています</div>
            <div class="text-danger font-size-08">入力内容を選択して「SEND」ボタンをクリックしてください</div>
            <div class="card-text font-size-08 mt-3">
                <label for="method">入力タイプの選択</label><br>
                <select class="custom-select w-12" name="method" id="method">
                    <option value="1">通常</option>
                    <option value="2">認証回避</option>
                </select>
                <span id="selectMsg" class="pl-3">想定されたケースで通常ログインします</span>
            </div>
        </div>
    </div>

    <div id="top_container" class="d-flex flex-row w-100">
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-orange">
                <h4 class="card-title">CLIENT</h4>
                <h6 class="card-subtitle mb-2 text-muted">Authenication</h6>
                <div class="card-text">
                    <form name="form1" id="form1" action="#" method="post">
                        <div class="form-group">
                            <label for="user_id">USER ID</label>
                            <input type="text" class="form-control" name="user_id" id="user_id" value="1" placeholder="未入力です">
                        </div>
                        <div class="form-group">
                            <label for="user_pw">USER PW</label>
                            <input type="text" class="form-control" name="user_pw" id="user_pw" value="11" placeholder="未入力です">
                        </div>
                        
                        <h6 class="card-subtitle mb-2 text-muted">Cookie<span id="cookies_subtitle" class="pl-3"></span></h6>
                        <div id="cookies" class="card-text w-50 mb-3"><span class='text-primary'>※Cookieには何も登録されていません</span></div>
                        <input type="hidden" name="mcode" id="mcode" value="1">
                        <input type="hidden" name="update" id="update" value="1">
                        <button type="submit" id="send_button" class="btn btn-sm btn-primary w-100">SEND</button>
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
                    <input type="hidden" id="scroll_down" name="scroll_down" value="<?=$scrollDown;?>">
                </div>
                <h6 class="card-subtitle text-muted mt-4">Result Message</h6>
                <div class="card-text m-2">&nbsp;<?=$resultMessage;?></div>
            </div>
        </div>
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-blue">
                <h4 class="card-title">SERVER RESULT</h4>
                <div class="card-text text-info m-2">
                    ※サーバーへの影響などを記載します
                </div>
            </div>
        </div>
    </div>

</div>


<?php include_once("parts/PartsFoot.php"); ?>