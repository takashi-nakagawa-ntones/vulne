(function(){
  "use strict";

  //Valiable
    let selectMethodMsg = {
      //※ここに入力タイプを選択した際の説明を入力します
      '1':"想定されたケースで通常ログインします",
      '2':"Cookieに管理者としてログインしているコードを埋めこみ、認証を回避します"
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
          $("#user_id").val("1");
          $("#user_pw").val("11");
          setCookie("","");
          break;
        case "2":
          $("#user_id").val("");
          $("#user_pw").val("");
          setCookie("Admin", true);
          break;
      }
      showCookie();
    }

    function deleteCookie(){
      var r = document.cookie.split(';');
      r.forEach(function(value) {
        var content = value.split('=');
        document.cookie = content[0] + "=;max-age=0";
      });
    }
    
    function setCookie(user, login){

      deleteCookie();
      document.cookie = "User=" + user;
      document.cookie = "loggedin=" + login;

    }

    function showCookie(){

      $("#cookies").html("");

      var r = document.cookie.split(';');

      var counter = 0;
 
      r.forEach(function(value) {

        var content = value.split('=');

        //session除外
        if(content[0].indexOf("PHPSESSID") !== -1){
          return true;
        }

        var rec = $("<div>").addClass("d-flex").addClass("flex-row").addClass("mb-2");
        var name = $("<div>").addClass("w-40").html(content[0] + " : ");
        var val = $("<div>").addClass("w-60").addClass("font-weight-bold").html(content[1]);
        $(rec).append(name).append(val);
        
        $("#cookies").append(rec);
        counter++;
      });
      if(counter === 0){
        $("#cookies").html("<span class='text-primary'>※Cookieには何も登録されていません</span>");
      }

    }

    function clickSendButton(){
      $("#form1").attr("action", "#");
      $("#form1").submit();

    }

    function scrollDown(){
      if($("#scroll_down").val() === "1"){
        $('html, body').animate({scrollTop:document.body.offsetHeight});
      }
    }

  //Init
    deleteCookie();
    scrollDown();

})();