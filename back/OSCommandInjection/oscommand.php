<?php
mb_language("Japanese");
mb_internal_encoding("UTF-8");
error_reporting(0);

$osExecuteCode = "";
$mailResult = "";
$procMessage = "";

// $subject = "VULNEから送信テスト";
// $body = "これはテストメールです。\n";
// $to = 'alchemy.allconnect@gmail.com';
 
// $result = mb_send_mail($to, $subject, $body);
 
// if ($result){
//     $mailResult = '成功';
// }else {
//     $mailResult = '失敗';
// }

// $rtn = exec('echo "これはテストです" | mail -s "テストメール" alchemy.allconnect@gmail.com');


// $rtn = exec('mail -s ' . $title . ' ' . $address . '< ' . $message_file);

if(isset($_POST)){
    if(isset($_POST["mcode"])){
        
        $address = $_POST["user_mail_address"];
        $title = $_POST["user_mail_subject"];
        $message = $_POST["user_mail_body"];

        switch($_POST["mcode"]){
            case "1":
                $result = mb_send_mail($address, $title, $message);
                $mailResult = ($result) ? 'Success': 'Failed';
                $procMessage = "想定通りメール送信されました";
                $msgColor = "text-primary";
            break;
            case "2":
                $msgs = "これはシステム情報の一部です";
                $result = mb_send_mail("alchemy.allconnect@gmail.com", $title, $msgs);
                $mailResult = ($result) ? 'Success': 'Failed';
                $procMessage = "システム情報が攻撃者指定のメールアドレスに送信されました";
                $msgColor = "text-danger";
            break;
            case "3":
                $msgs = "メール送信後、アクセスログが削除されました";
                $result = mb_send_mail("alchemy.allconnect@gmail.com", $title, $msgs);
                $mailResult = ($result) ? 'Success': 'Failed';
                $procMessage = "アクセスログが削除されました";
                $msgColor = "text-danger";
            break;


        }

        if(count($address) && count($title) && count($message)){
            $osExecuteCode = 'mail -s ' . $title . ' ' . $address . '< ' . $message;
        }

    }

}