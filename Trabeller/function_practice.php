<?php 
//練習問題１

//練習問題２
// nexseed("おはよう","seed");

//練習問題3


function plus($num1,$num2){
	echo $num1 + $num2;
	return $result;

	echo "足し算終わりました";
};

 function checkExam($score){
 	if ($score > 80) {
 		return "合格！";
 	}else{
 		return "不合格！";
 	}
 

	 $kekka = "";
	 if ($score > 80) {
	 	$kekka = "合格";
	 }else{
	 	$kekka = "不合格";
	 }
	 return $kekka;
};		

function nexseed($greeting,$name){
	return $greeting.",".$name."くん";
};

echo nexseed("カムバック","イマジン");

 ?>