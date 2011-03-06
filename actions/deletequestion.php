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
	global $CONFIG;
	gatekeeper();

	$question_guid = (int) get_input('question_guid');

	$question = new ElggObject($question_guid);

	$answers = get_entities_from_relationship('answer',$question_guid);

	$question->clearRelationships();

	foreach($answers as $answer)
	{
		if(!$answer->delete())
		{
			register_error(elgg_echo('questions:error:answer:delete'));
			forward($vars['url'] . 'pg/questions/viewanswers/' . $question->guid);
		}
	}

	$question->delete();

	// Success message
	system_message(elgg_echo("questions:alert:question:deleted"));

	forward($vars['url'] . 'pg/questions/allquestions');
?>