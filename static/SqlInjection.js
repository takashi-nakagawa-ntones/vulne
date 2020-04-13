(function(){
    "use strict";
  
    //Valiable
    let selectMethodMsg = {
      '1':"想定されたケースで自信の個人情報を表示します",
      '2':"攻撃コードを入力してDBに登録されている<span class='text-danger font-weight-bold'>個人情報全て</span>を表示します（個人情報漏洩）",
      '3':"攻撃コードを入力してDBに登録されている<span class='text-danger font-weight-bold'>全データを削除</span>します (システム停止)"
    };
  
    //Event
    $("select[name='method']").on("change", changeMethod);

    //Method

    function changeMethod(e){
      var mcode = $("select[name='method']").val();
      $("#selectMsg").html(selectMethodMsg[mcode]);
      //auto input
      switch(mcode){
        case "1":
          $("#user_id").val("1");
          $("#user_pw").val("11");
          break;
        case "2":
          $("#user_id").val("1");
          $("#user_pw").val("11 OR 1=1;");
          break;
        case "3":
          $("#user_id").val("1");
          $("#user_pw").val("11;DROP TABLE COMPANY;");


      }

    }
  
    //Init
  
  })();