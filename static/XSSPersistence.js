(function(){
    "use strict";
  
    //Valiable
      let selectMethodMsg = {
        '1':"想定されたケースでSNSにメッセージを投稿します",
        '2':"攻撃コードをDBに登録させて<span class='text-danger font-weight-bold'>偽情報</span>を表示します（Webページ改ざん）",
        '3':"攻撃コードをDBに登録させて<span class='text-danger font-weight-bold'>すべての閲覧者をコピーサイトへ遷移</span>させます (フィッシング)"
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
            $("#user_content").val("My name is Teddy. Please join me in the conversation");
            break;
          case "2":
            $("#user_content").val('<div class="card"><div class="card-body"><h4 class="card-title text-info">Congratulations</h4><h6 class="card-subtitle mb-2 text-muted">Your 100th post</h6><p class="card-text">We will give you a prize of $10000</p><a href="#!" class="card-link text-primary">Click here for details</a></div></div>');
            break;
          case "3":
            $("#user_content").val('<script>window.open("fishing.php")</script>');
            break;
        }

      }
    //Init
  
  })();