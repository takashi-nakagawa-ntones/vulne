<?php include_once("parts/Include.php"); ?>
<?php include_once("./../back/XSSPersistence/createtestdb.php");?>
<?php include_once("./../back/XSSPersistence/selecttestdb.php");?>
<?php include_once("./../back/XSSPersistence/xsspersistence.php");?>

<?php include_once("parts/PartsHead.php"); ?>

<div id="container">

    <div class="card m-2">
        <div class="card-body">
            <h4 class="card-title">Commentary</h4>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <div class="card-text font-size-08">
            クロスサイトスクリプティング脆弱性の中でも、特に、ターゲットのサイトにスクリプトが持続的に埋め込まれ、効果が永続するタイプのもの<br>
            ユーザが入力した内容をサイトに表示する機能があり、その表示の処理に不具合がある場合にこの問題が発生します。反射型XSSと大きく異なるのは、<br>
            サイトに訪れた全てのユーザに対してスクリプトが実行されるという点です<br>
            罠サイトや罠メールを経由する必要がなく、普通にサイトを訪れたユーザが被害に遭います。そのため、反射型に比べて脅威は大きなものとなります
            </div>
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
                <span id="selectMsg" class="pl-3">想定されたケースでSNSにメッセージを投稿します</span>
            </div>
        </div>
    </div>

    <div id="top_container" class="d-flex flex-row w-100">
        <div class="card w-50 m-2">
            <div class="card-body bg-thin-orange">
                <h4 class="card-title">CLIENT</h4>
                <h6 class="card-subtitle mb-2 text-muted">Account Name : Teddy</h6>
                <div class="card-text">
                    <form name="form1" id="form1" action="#" method="post">
                        <div class="form-group">
                            <label for="user_content">CONTENT</label>
                            <textarea class="form-control" name="user_content" id="user_content">My name is Teddy. Please join me in the conversation</textarea>
                        </div>
                        <input type="hidden" name="user_id" id="user_id" value="3">
                        <input type="hidden" name="user_pw" id="user_pw" value="33">
                        <input type="hidden" name="user_name" id="user_name" value="Teddy">

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
                <div class="card-text text-info m-2">
                    <table class="table table-sm">
                        <thead>
                            <th>ID</th><th>PW</th><th>NAME</th><th>DATE</th><th>CONTENT</th>
                        </thead>
                        <tbody>
                            <?php foreach($testData as $key => $val): ?>
                                <?php if(mb_strlen($val[2]) > 0 && mb_strlen($val[3]) > 0): ?>
                                    <tr><td><?=$key?><td><?=$val[0]?></td><td><?=$val[1]?></td><td><?=$val[2]?></td><td><?=$val[3]?></td></tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
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
                <h6 class="card-subtitle text-muted">▼DBに登録された投稿内容を表示します</h6>
                <div class="card-text m-2 text-info">
                    <div class="list-group">
                        <?php foreach($testData as $key => $val): ?>
                            <?php if(mb_strlen($val[2]) > 0 && mb_strlen($val[3]) > 0): ?>
                                <a href="#!" class="list-group-item list-group-item-action flex-column align-items-start mt-2">
                                    <div class="d-flex w-100 justify-content-between">
                                        <small><?=$val[1]?></small>
                                        <small><?=$val[2]?></small>
                                    </div>
                                    <hr>
                                    <p class="m-1"><?=$val[3]?></p>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
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