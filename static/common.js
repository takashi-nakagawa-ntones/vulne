(function(){
  "use strict";

  //Valiable

  //Event

    $(".home_button").on("click", clickHomeIcon);


  //Method

    function clickHomeIcon(){
      var form = $("<form>").attr("method","post").attr("name","form1").attr("action","/vulne/");
      var page = $("<input>").attr("type", "hidden").attr("name", "page").val("index");
      var title = $("<input>").attr("type", "hidden").attr("name", "title").val("トップ");
      $(form).append(page).append(title);
      $("body").append(form);
      $(form).submit();
    }

  //Init

})();
