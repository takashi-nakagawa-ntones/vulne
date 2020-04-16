(function(){
    "use strict";
    //Valiable
      let selectMethodMsg = {
        '1':"想定されたケースで指定URLにアクセスします",
        '2':"GETパラメータに<span class='text-danger font-weight-bold'>リダイレクト先URL</span>を埋め込みます"
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
            $("#user_browsing_url").val("//" + domain + "/front/OpenRedirect.php?url=//" + domain + "/front/OpenRedirect.php");
            break;
          case "2":
            $("#user_browsing_url").val("//" + domain + "/front/OpenRedirect.php?url=//" + domain + "/front/fishing.php");
            break;
        }
      }

      function clickSendButton(){
        var url = $("#user_browsing_url").val();
        var redirectUrl = url.split("?url=")[1];
        if($("#mcode").val() == "2"){
          $("#form1").attr("target","_blank");
        }else{
          $("#form1").attr("target","_self");
        }
        $("#form1").attr("action", redirectUrl);
        $("#form1").submit();
      }

    //Init
      
  
  })();