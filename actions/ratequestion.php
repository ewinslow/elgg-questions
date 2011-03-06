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

	$interesting = get_input('interesting');
	$question_guid = (int) get_input('question_guid');
	$question = new ElggObject($question_guid);

	$user_id = get_loggedin_userid();

	if( !create_annotation($question->getGUID(),"interesting",$interesting,"text",$user_id,$question->getAccessID()) )
		register_error(elgg_echo("questions:rate:question:error"));
	else
		system_message(elgg_echo("questions:rate:question:submitted"));
	forward($_SERVER['HTTP_REFERER']);
?>