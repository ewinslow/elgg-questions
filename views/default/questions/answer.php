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
	gatekeeper();
	global $CONFIG;
	$question = new ElggObject($_SESSION['question_guid']);
	$form = elgg_view("forms/questions/addanswer");
?>
<h3>
		<?php echo elgg_echo('questions:viewanswers:question'); ?>
</h3>
<?php
	echo elgg_view_entity($question);
	echo $form;
?>