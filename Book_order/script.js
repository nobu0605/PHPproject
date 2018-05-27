$(function(){
  
  $('.title').click(function(){
    $('html,body').animate({ 
      'scrollTop': 0 
    }, 300);
    });

  $('header a').click(function(){
    var id = $(this).attr('href');
    var position = $(id).offset().top;
    $('html,body').animate({ 
      'scrollTop':position 
    }, 300);
  });

      // カルーセルスライダー
  $('.carousel').carousel({
    interval: 2500
  });
  

  

});