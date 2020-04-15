<?php

if(isset($_POST)){
    if(isset($_POST["mcode"])){
        switch($_POST["mcode"]){
            case "1":
                $resultMessage = "<span class='text-primary'>Teddyからの投稿が正常に処理されました</span>";
            break;
            case "2":
                $resultMessage = "<span class='text-danger'>※個人情報を不正入手するための偽情報「Congratulations」が表示されてしまいました</span>";
            break;
            case "3":
                $resultMessage = "<span class='text-danger'>※個人情報を不正入手するためのコピーサイトへリダイレクトされました<br>※すべての閲覧者がコピーサイトへリダイレクトされます</span>";
            break;
        }
    }
}