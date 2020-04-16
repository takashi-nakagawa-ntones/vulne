
<?php include_once("parts/Include.php"); ?>

<?php include_once("./../back/RemoteFileInclusion/remotefileinclusion.php");?>

<?php include_once("parts/PartsHead.php"); ?>

<div id="container">

    <div class="card m-2">
        <div class="card-body">
            <h4 class="card-title">Commentary</h4>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <div class="card-text font-size-08">
            プログラムの中で別ファイルを参照するコードがあった場合に、<br>
            実際に参照すべきファイルとは別のファイルやデータを読み込ませて、<br>
            本来意図しない不正なデータ処理を行わせる攻撃
            </div>
            <div class="text-danger font-size-08 mt-2">※ここは前提条件などを記載します
            </div>
            <div class="text-danger font-size-08 mt-2">※ここでは意図的に脆弱性を含むプロセスが実装されています</div>
            <div class="text-danger font-size-08">入力内容を選択して「SEND」ボタンをクリックしてください</div>
            <div class="card-text font-size-08 mt-3">
                <label for="method">入力タイプの選択</label><br>
                <select class="custom-select w-12" name="method" id="method">
                    <option value="1">通常</option>
                    <option value="2">システム情報取得</option>
                    <option value="3">Webページ改竄</option>
                    <option value="4">個人情報取得</option>
                </select>
                <span id="selectMsg" class="pl-3">想定されたケースで外部ファイルを読み込み画面表示します</span>
            </div>
        </div>
    </div>

    <div id="top_container" class="d-flex flex-row w-100">
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-orange">
                <h4 class="card-title">CLIENT</h4>
                <h6 class="card-subtitle mb-2 text-muted">SUB TITLE</h6>
                <div class="card-text">
                    <form name="form1" id="form1" action="#" method="post">
                        <div class="form-group">
                            <label for="user_browsing_url">URL</label>
                            <input type="text" class="form-control" name="user_browsing_url" id="user_browsing_url" value="//<?=$_SERVER['SERVER_NAME'];?>/front/RemoteFileInclusion.php?page=http://valune/include.php">
                        </div>
                        <input type="hidden" name="server_name" id="server_name" value="<?=$_SERVER['SERVER_NAME'];?>">
                        <input type="hidden" name="mcode" id="mcode" value="1">
                        <input type="hidden" name="update" id="update" value="1">
                        <button type="button" id="send_button" class="btn btn-sm btn-primary w-100">SEND</button>
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
                <input type="hidden" id="scroll_down" name="scroll_down" value="<?=$scrollDown;?>">
                <h6 class="card-subtitle text-muted mt-4">Result Message</h6>
                <div class="card-text m-2">&nbsp;<?=$resultMessage;?></div>
            </div>
        </div>
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-blue">
                <h4 class="card-title">SERVER RESULT</h4>
                <h6 class="card-subtitle text-muted">Execute</h6>
                <div class="card-text text-info m-2"><?=$resultSvMessage;?></div>
                <h6 class="card-subtitle text-muted mt-2">Include File Content</h6>
                <div class="card-text bg-light m-2">&nbsp;<?=$fileContent;?></div>
            </div>
        </div>
    </div>

</div>


<?php include_once("parts/PartsFoot.php"); ?>