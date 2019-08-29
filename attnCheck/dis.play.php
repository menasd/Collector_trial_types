//AUTHOR CREDIT: Inez Zung, Shangshang Wang

//Please read description for instructions on how to use. 
// As is, if participant gets question incorrectly, Collector leaves study and redirects participant to Google.

<?php

	$pResp = $_SESSION['Trials'][$_SESSION['Position']-1]['Response']['Response'];
	
	if($text!=$pResp) {
		header("Location: http://google.com");
        exit();
	} else {
		echo "Processing...";
	}
	
 ?>
