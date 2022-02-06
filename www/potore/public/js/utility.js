/**
 * 
 * 基本的な関数 
 * 
 */

 /**
  * パラメータの存在確認
  * @param {*} data 
  */
 var isset = function(data){
  if(data === "" || data === null || data === undefined){
      return false;
  }else{
      return true;
  }
};


window.onload = function () {

/**
 * 無限scroll初期化
 */
  var elem = document.querySelector(".scroll_area");
  if (elem != null) {
    var infScroll = new InfiniteScroll( elem, {
      // options
      path : ".pagination a[rel=next]",
      append : ".comment",
      status: '.page-load-status',
      hideNav: '.pagination',
      elementScroll: true, //scrollする物につかう設定
      history: false,
    });
  }


  /**
   * カルーセル設定
   */
  $('.carousel').carousel({
    interval: false,
    
  })

  /**
   * 通常のサブミットボタンのloading表示
   */
  $('.form-loading').on('submit', function(e) {
    console.log("tt");
    $("#loading").fadeIn(500);
  })


};