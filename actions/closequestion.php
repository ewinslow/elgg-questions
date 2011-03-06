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
	$question = new ElggObject(get_input('question_guid'));
	$question->open = 'false';
	forward($vars['url'] . 'pg/questions/viewanswers/' . $question->guid);
?>