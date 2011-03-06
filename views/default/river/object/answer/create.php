<?php
/**
 *	QUESTIONS PLUGIN
 *	@package questions
 *	@author Javier Luces jluces@df-digital.com
 *	@license GNU General Public License (GPL) version 2
 *	@copyright (c) DF-Digital 2009
 *	@link http://www.df-digital.com
 **/
?>
<?php

	$statement = $vars['statement'];
	$performed_by = $statement->getSubject();
	$object = $statement->getObject();

	$list_with_question = get_entities_from_relationship('answer',$object->guid,true);
	$question = $list_with_question[0];
	$question_url = $vars['url'] . "pg/questions/viewanswers/" . $question->guid . "#" . $object->getGUID();

	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string = sprintf(elgg_echo("questions:river:answer:created"),$url) . " ";
	$string .= "<a href=\"" . $question_url . "\">" . elgg_echo("questions:river:answer:create") . "</a>";

?>

<?php echo $string; ?>