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

	$answer_guid = $_SESSION['answer_guid'];
	if( $answer = get_entity($answer_guid) )
		$form = elgg_view("forms/questions/addanswer",array('entity' => $answer));

	echo $form;
?>