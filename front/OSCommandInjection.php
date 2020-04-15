<?php include_once("parts/Include.php"); ?>

<?php include_once("./../back/OSCommandInjection/oscommand.php");?>

<?php include_once("parts/PartsHead.php"); ?>
<div id="container">

    <div class="card m-2">
        <div class="card-body">
            <h4 class="card-title">Commentary</h4>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <div class="card-text font-size-08">
            ユーザーからデータや数値の入力を受け付けるようなWebサイトなどにおいて、<br>
            プログラムに与えるパラメータにOSへの命令文を紛れ込ませて不正に操作する攻撃です。<br>
            本来想定されていない命令文を強制的に実行させてしまいます。<br>
            主にWebアプリケーションがWebサーバのシェルを呼び出してコマンドを実行する動作が狙われます。<br>
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
                <span id="selectMsg" class="pl-3">想定されたケースで入力されたメールアドレスに登録完了メールを送信します</span>
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
                            <label for="user_mail_address">User Mail Address</label>
                            <input type="text" class="form-control" name="user_mail_address" id="user_mail_address" value="alchemy.allconnect@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="user_mail_subject">User Mail Subject</label>
                            <input type="text" class="form-control" name="user_mail_subject" id="user_mail_subject" value="これはテストメールです">
                        </div>
                        <div class="form-group">
                            <label for="user_mail_body">User Mail Body</label>
                            <textarea class="form-control" name="user_mail_body" id="user_mail_body">VULNEからのテストメールです</textarea>
                        </div>
                        <input type="hidden" name="mcode" id="mcode" value="1">
                        <input type="hidden" name="update" id="update" value="1">
                        <button type="submit" class="btn btn-sm btn-primary w-100">SEND</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-blue">
                <h4 class="card-title">SERVER</h4>
                <h6 class="card-subtitle mt-2 text-muted">Code</h6>
                <div class="card-text text-info m-2">exec('mail -s ' . $MAIL_TITLE . ' ' . $MAIL_ADDRESS . '< ' . $MAIL_BODY);</div>
                <h6 class="card-subtitle mt-2 text-muted">Command Execute</h6>
                <div class="card-text text-info m-2">&nbsp;<?=$osExecuteCode;?></div>
                <h6 class="card-subtitle mt-2 text-muted">Send Mail</h6>
                <div class="card-text text-info m-2">&nbsp;<?=$mailResult;?></div>
                <h6 class="card-subtitle mt-2 text-muted">Result</h6>
                <div class="card-text text-info m-2 <?=$msgColor;?>">&nbsp;<?=$procMessage;?></div>
            </div>
        </div>
    </div>


</div>


<?php include_once("parts/PartsFoot.php"); ?>