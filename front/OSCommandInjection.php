<?php include_once("parts/Include.php"); ?>
<?php include_once("parts/PartsHead.php"); ?>

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
            <div class="text-danger font-size-08">入力内容を選択して「SEND」ボタンをクリックしてください</div>
            <div class="card-text font-size-08 mt-3">
                <label for="method">入力タイプの選択</label><br>
                <select class="custom-select w-12" name="method" id="method">
                    <option value="1">通常</option>
                    <option value="2">個人情報全取得</option>
                    <option value="3">DBデータ破壊</option>
                </select>
                <span id="selectMsg" class="pl-3">想定されたケースで自信の個人情報を表示します</span>
            </div>
        </div>
    </div>


<?php include_once("parts/PartsFoot.php"); ?>