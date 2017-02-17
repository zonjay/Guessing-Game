<?php


	function check(){
		$message;
		if(isset($_POST['submit'])){
        $randomGuess = $_SESSION['answer'];
        $userGuess = $_POST['answer'];

        //檢查是否是重複的數字

         for($i=0;$i<strlen($userGuess);$i++){
            for($j=$i+1;$j<strlen($userGuess);$j++){
             if($userGuess[$i] == $userGuess[$j]){
             		$message = "請輸入4個不重複的數字 </br>";
                    return $message;
            }
          }
        }

          //猜對答案便回傳正解

       		if($randomGuess == $userGuess){

       			$message = $userGuess . "：正解";
            return $message;     

       		}else{

            //沒有輸入數字時就按送出的情況

            if(empty($_POST['answer'])){
              $message = "請輸入4個不重複的數字!!! </br>";
              return $message;
            }else{

              $message = "您輸入的答案是" . $userGuess;
              return $message . checkAB();
            }
       			
       		} 
          	

      }

	}

  //檢查是否是先前就輸入過的數字
  function sameNumber(){
        if (isset($_SESSION["record"]) && isset($_POST['answer'])){
             foreach ($_SESSION["record"] as $total){
                if ((substr($total, 0, 4) == $_POST['answer']) && ($_POST['answer'] != $_SESSION['answer'])){
                  echo "</br>";
                  echo "!!!----此答案已經輸入過了----!!!";
                  break;
                }
           }
           }
  }


  //判斷MANB

  function checkAB(){
      $a = 0;
      $b = 0;
      if( (isset($_POST['submit'])) && (empty($_POST['answer'] == false)) ){
        $randomGuess = $_SESSION['answer'];
        $userGuess = $_POST['answer'];
          for($i = 0; $i<= 3; $i++){
              if($userGuess[$i] == $randomGuess[$i]){
                $a++;
              }

              for($j = 0; $j<= 3; $j++){
                if(($userGuess[$i] == $randomGuess[$j]) && ($i != $j)) {
                $b++;
              }
            }
          }


          return "：" . $a . "A" . $b . "B";
      }
  }

?>