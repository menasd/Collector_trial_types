<?php
    $data = $_POST;
	
	$test_answer = null;
	
	$texts = explode('|', $cue);
	foreach ($texts as &$t) {
		$t = trim($t);
		if (substr($t,0, 1) === '*') {
			$text_answer = substr($t, 1);
		}
	}
	unset($t);
	
	if ($data['Response'] === $text_answer){
	$data['Acc'] = 100;
	$data['lenientAcc'] = 1;
	$data['strictAcc'] = 1;
	} else {
	$data['Acc'] = 0;
	$data['lenientAcc'] = 0;
	$data['strictAcc'] = 0;
	}
 ?>
