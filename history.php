<?php
	include_once "checkGuess.php";
	
	// 如果收到送出及輸入框並非為空的話
	// 便建立陣列來儲存輸入的數字

	function historyNumber(){
		if( (isset($_POST['submit'])) && (empty($_POST['answer'] == false)) ){
			   $randomGuess = $_SESSION['answer'];
               $userGuess = $_POST['answer'];
               settype($_SESSION["record"], "array");

               if($randomGuess == $userGuess){
       			$_SESSION["record"][] = $userGuess . "：正解";
            
       		}else{

 			   $_SESSION["record"][] = $userGuess . checkAB();
 			}
		}

		display();
		
}
	// 顯示輸入過的數字

	function display(){
			if (isset($_SESSION["record"])){
 			 	foreach ($_SESSION["record"] as $total){
  			 		echo $total. "<br>";
  			}

		}
	}

?>