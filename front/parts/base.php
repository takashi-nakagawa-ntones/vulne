
<?php include_once("parts/Include.php"); ?>
<?php include_once("parts/PartsHead.php"); ?>

<div id="container">

    <div class="card m-2">
        <div class="card-body">
            <h4 class="card-title">Commentary</h4>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <div class="card-text font-size-08">※ここに脆弱性の解説を記載します</div>
            <div class="text-danger font-size-08 mt-2">※ここは前提条件などを記載します
            </div>
            <div class="text-danger font-size-08 mt-2">※ここでは意図的に脆弱性を含むプロセスが実装されています</div>
            <div class="text-danger font-size-08">入力内容を選択して「SEND」ボタンをクリックしてください</div>
            <div class="card-text font-size-08 mt-3">
                <label for="method">入力タイプの選択</label><br>
                <select class="custom-select w-12" name="method" id="method">
                    <option value="1">通常</option>
                    <option value="2">偽情報表示</option>
                    <option value="3">釣り</option>
                </select>
                <span id="selectMsg" class="pl-3">※入力タイプの説明を記載します</span>
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
                            <input type="text" class="form-control" name="user_browsing_url" id="user_browsing_url" value="//<?=$_SERVER['SERVER_NAME'];?>/front/XSSReflective.php?userid=1001">
                        </div>
                        <input type="hidden" name="server_name" id="server_name" value="<?=$_SERVER['SERVER_NAME'];?>">
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
                <div class="card-text text-info m-2">
                    ※サーバーの状況を表示します
                </div>
            </div>
        </div>
    </div>

    <div id="btm_container" class="d-flex flex-row w-100">
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-orange">
                <h4 class="card-title">CLIENT RESULT</h4>
                <h6 class="card-subtitle text-muted">※ここは攻撃結果のサブタイトルを記載します</h6>
                <div class="card-text m-2 text-info">&nbsp;※ここは攻撃結果を表示します</div>
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