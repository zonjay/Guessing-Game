<!-- 主要的頁面 -->
<?php
include_once "checkGuess.php";
include_once "randomNumber.php";
include_once "history.php";
include_once "record.php";
?>
<html>
<head>
	<title>PIXNET</title>
   <link rel="stylesheet" type="text/css" href="css\mycss.css">
   <!-- 如果是正確的答案，便引入hidecss.php，隱藏輸入框和GO按鈕-->
   <?php
        if(isset($_POST['submit'])){
        $randomGuess = $_SESSION['answer'];
        $userGuess = $_POST['answer'];
        if($randomGuess == $userGuess){
   ?>
   <link rel="stylesheet" type="text/css" href="css\hidecss.php">

   <?php
        }
    }
  ?>
</head>
<body>
    <div>
        <div id="reset">
            <form method="post" action="#">
                <h1>猜數字 </h1>
                 <span id="correctAnswer">答案提示: <?=$_SESSION['answer'] ?></span>
                <button name="reset" type="submit">重新遊戲</button>
            </form>
        </div>
        <?php
            if(isset($_POST['reset']))
                {

                 header("Location:guessingGame.php" ); 
                 session_unset();
             };
        ?>
    	
    </div>
    <br>
        <div id="input">
        	<form method="post" action="">
        		<input type="text" name="answer" placeholder="請輸入不重複的數字">
        		<input type="submit" name="submit" value="GO">
        	</form>
        </div>

    <div id="answer">
        <?php
            echo check();
            sameNumber();  
    ?>
    </div>
<form method="post" action="record.php">
    <div id="record">
    	<h5>作答記錄</h5>
            <?php 
                historyNumber();
            ?>
    </div>
    
            <button class="button" name="download" type="submit">下載作答記錄</button>
    </form>

</body>
</html>