
<!-- 寫入檔案及下載 -->
<?php
	include_once "guessingGame.php";

	function txt(){
	  	  $file_name = "record.txt"; //檔案名稱
		  $file = @file("$file_name"); //讀取檔案
		  $open = @fopen("$file_name","w"); //開啟檔案，沒有檔案則建立檔案
		  $total = implode(PHP_EOL,$_SESSION["record"]);  //陣列轉換為字串並加入換行

		  @fwrite($open, $total); //寫入
		  fclose($open); //關閉檔案
	 	 }


// 如果按了下載便執行寫入的函式

	 if(isset($_POST['download'])){
	  		txt();
	 }

?>