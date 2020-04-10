(function(){
  "use strict";

  //Valiable

  //Event
    $(".list-hover-primary").on("click", clickVulnerability)
  //Method

    /**
     * 指定ページへリダイレクト
     * @param {*}      e  イベントハンドラ 
     * @page  {String}    遷移画面名
     */
    function clickVulnerability(e){
      var page = $(e.target).attr("data-page");
      var title = $(e.target).attr("data-title");
      var form = $("<form>").attr("action", "front/" + page + ".php" ).attr("method","post").attr("name","redirect");
      var pageInput = $("<input>").attr("type", "hidden").attr("name","page").val(page);
      var titleInput = $("<input>").attr("type", "hidden").attr("name", "title").val(title);
      $("body").append($(form).append(pageInput).append(titleInput));
      $(form).submit();
    }

  //Init

})();