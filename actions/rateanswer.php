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

	$helpful = get_input('helpful');
	$answer_guid = (int) get_input('answer_guid');
	$answer = new ElggObject($answer_guid);

	$user_id = get_loggedin_userid();

	if( !create_annotation($answer->getGUID(),"helpful",$helpful,"text",$user_id,$answer->getAccessID()) )
		register_error(elgg_echo("questions:rate:answer:error"));
	else
		system_message(elgg_echo("questions:rate:answer:submitted"));
	forward($_SERVER['HTTP_REFERER']);
?>