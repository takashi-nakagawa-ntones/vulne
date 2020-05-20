(function(){
    "use strict";
  
    //Valiable
      let selectMethodMsg = {
        //※ここに入力タイプを選択した際の説明を入力します
        '1':"",
        '2':"",
        '3':"",
        '4':"",
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
            //※ここに入力タイプを選択した際の入力値を指定します
            break;
          case "2":
            //※ここに入力タイプを選択した際の入力値を指定します
            break;
          case "3":
            //※ここに入力タイプを選択した際の入力値を指定します
            break;
          case "4":
            //※ここに入力タイプを選択した際の入力値を指定します
            break;
        }
      }

      function clickSendButton(){
        $("#form1").attr("action", "※ここに遷移先URLを入力します");
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