
<?php
$prompt = str_ireplace(array($answer, $sentence), array('$answer', '$sentence'), $text);
$prompts = explode('|', $prompt);
?>

<style>
#content { width: auto; }
</style>


<?php
if (isset($prompts[1])) {
$infinitives = explode('|', $answer);
$sentences = explode('|', $sentence);
}

$form1 = "<h1>";
$cform1 = "</h1>";

$form3 = "<h3>";
$cform3 = "</h3>";

//echo $form1 . $infinitives[0] . $cform1;
?>

<?php 
echo $form3 . $sentences[0] . $cform3;
echo $form3 . $sentences[1] . $cform3;
echo $form3 . $sentences[2] . $cform3;
?>
