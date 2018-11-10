$(function(){
'use strict';
    // Ajax
    // Asynchronous JavaScript + XML
    // サーバーと通信 + ページの書き換え

    $('#like').click(function() {
    	console.log('hoge');
        $('#result').load('/like');
    });
});