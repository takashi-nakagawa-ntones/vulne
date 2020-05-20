
<?php include_once("parts/Include.php"); ?>

<?php include_once("./../back/SSIInjection/ssiinjection.php");?>


<?php include_once("parts/PartsHead.php"); ?>

<div id="container">

    <div class="card m-2">
        <div class="card-body">
            <h4 class="card-title">Commentary</h4>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <div class="card-text font-size-08">
            サーバ側に打撃を与える 技術で、攻撃者が Web アプリケーションにコードを送り込めるようにし、 <br>
            送り込まれた後に Web サーバは、ローカルでコードを実行してしまいます<br>
            攻撃者は取得したシステム情報を悪用して、脆弱性に対し的確な攻撃が可能になる場合がある
            </div>
            <div class="card-text m-2">
                <div class="text-primary">◆攻撃成立条件◆</div>
                <div class="text-primary"><small>・Apacheの設定でPHPからSSI を実行可能にしている</small></div>
                <div class="text-primary"><small>・実行コマンドの制限をしていない</small></div>
                <div class="text-primary"><small>・ユーザーから送信される入力値をエスケープ処理していない</small></div>
            </div>
            <div class="text-danger font-size-08 mt-2">※ここでは意図的に脆弱性を含むプロセスが実装されています</div>
            <div class="text-danger font-size-08">入力内容を選択して「SEND」ボタンをクリックしてください</div>
            <div class="card-text font-size-08 mt-3">
                <label for="method">入力タイプの選択</label><br>
                <select class="custom-select w-12" name="method" id="method">
                    <option value="1">通常</option>
                    <option value="2">システム情報取得</option>
                    <option value="3">システム破壊</option>
                </select>
                <span id="selectMsg" class="pl-3">※入力タイプの説明を記載します</span>
            </div>
        </div>
    </div>

    <div id="top_container" class="d-flex flex-row w-100">
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-orange">
                <h4 class="card-title">CLIENT</h4>
                <h6 class="card-subtitle mb-2 text-muted">user input form</h6>
                <div class="card-text">
                    <form name="form1" id="form1" action="#" method="post">
                        <div class="form-group">
                            <label for="user_name">NAME</label>
                            <input type="text" class="form-control" name="user_name" id="user_name" value="poul">
                        </div>
                        <input type="hidden" name="mcode" id="mcode" value="1">
                        <input type="hidden" name="update" id="update" value="1">
                        <input type="hidden" name="send_mcode" id="send_mcode" value="<?=$_POST['mcode'];?>">
                        <button type="submit" id="send_button" class="btn btn-sm btn-primary w-100">SEND</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-blue">
                <h4 class="card-title">SERVER</h4>
                <h6 class="card-subtitle mb-2 text-muted">infomatation</h6>
                <div class="card-text text-info m-2">
                    PHPからSSIが使用できる設定になっています
                </div>
            </div>
        </div>
    </div>

    <div id="btm_container" class="d-flex flex-row w-100">
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-orange">
                <h4 class="card-title">CLIENT RESULT</h4>
                <h6 class="card-subtitle text-muted mt-4">Your Name</h6>
                <div class="card-text m-2">&nbsp;<?=$resultUserName;?></div>
                <h6 class="card-subtitle text-muted mt-4">Result Message</h6>
                <div class="card-text m-2">&nbsp;<?=$resultClMessage;?></div>
                <input type="hidden" id="scroll_down" name="scroll_down" value="<?=$scrollDown;?>">
            </div>
        </div>
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-blue">
                <h4 class="card-title">SERVER RESULT</h4>
                <h6 class="card-subtitle text-muted mt-4">Result Message</h6>
                <div class="card-text text-info m-2">&nbsp;<?=$resultSvMessage;?></div>
            </div>
        </div>
    </div>

</div>


<?php include_once("parts/PartsFoot.php"); ?>