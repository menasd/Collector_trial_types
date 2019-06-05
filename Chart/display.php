<div class=""><?php //echo $text; ?></div>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	
}

table.a {
	table-layout:fixed;
	width: 250px;
}
</style>


<?php
$prompt = str_ireplace(array($answer, $spanish), array('$answer', '$spanish'), $text);
$prompts = explode('|', $prompt);
?>

<style>
#content { width: auto; }
</style>


<?php
if (isset($prompts[1])) {
$infinitives = explode('|', $answer);
$spanishWords = explode('|', $spanish);
}

$form = "<h1>";
$cform = "</h1>";
echo $form . $infinitives[0] . $cform;
?>

<table class = "a">
  <tr>	
  	<th><?php echo 'Yo'?> </th>
    <th><?php echo$spanishWords[0]?></th>
  </tr>
  <tr>
  	<th><?php echo 'Tu'?> </th>
    <th><?php echo$spanishWords[1]?></th>
  </tr>
  <tr>
  	<th><?php echo 'Nosotros'?> </th>
    <th><?php echo$spanishWords[2]?></th>
  </tr>
  
</table>
