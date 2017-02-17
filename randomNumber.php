
<!-- 不重複的數字答案 -->
<?php

	session_start();

	function generateAnswer() {
	    $numberStack = range(0, 9);
	    shuffle($numberStack);
	    $answer = '';
	    for($i = 0; $i < 4; $i++) {
	        $answer .= $numberStack[$i];
	    }
	    return $answer;
	}

	if(empty($_SESSION['answer'])) {
	    /*  如果答案不存在就產生一個 */
	    $_SESSION['answer'] = generateAnswer();
	}

?>