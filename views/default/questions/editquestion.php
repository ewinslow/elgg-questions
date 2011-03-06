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

	$question_guid = $_SESSION['question_guid'];
	if( $question = get_entity($question_guid) )
		$form = elgg_view("forms/questions/addquestion",array('entity' => $question));

	echo $form;
?>