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

	require_once(dirname(dirname((__FILE__)))."/utilities/utilities.php");

	global $CONFIG;
	gatekeeper();

	$answer_guid = (int) get_input('answer_guid');
	$question_guid = (int) get_input('question_guid');

	$question = new ElggObject($question_guid);
	$answer = new ElggObject($answer_guid);

	if(!$answer->delete())
	{
		register_error(elgg_echo('questions:error:answer:delete'));
		forward($vars['url'] . 'pg/questions/viewanswers/' . $question->guid);
	}

	// Success message
	system_message(elgg_echo("questions:alert:answer:deleted"));

	if( $question->countEntitiesFromRelationship('answer') == 0 )
	{
		create_metadata($question->guid,'answered','false','text',$question->owner_guid,$question->access_id);
		forward($vars['url'] . 'pg/questions/notanswered');
	}
	else
		forward($vars['url'] . 'pg/questions/viewanswers/' . $question->guid);
?>