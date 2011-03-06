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

	$new_title = get_input('title');
	$new_question = get_input('question');
	$new_tags = get_input('tags');
	$new_who = get_input('whoanswers');
	$new_access_id = get_input('access_id');

	$new_tags_array = string_to_tag_array($new_tags);

	$_SESSION['title'] = $new_title;
	$_SESSION['question'] = $new_question;
	$_SESSION['tags'] = $new_tags;
	$_SESSION['whoanswers'] = $new_who;
	$_SESSION['access'] = $new_access_id;

	if (empty($new_question))
	{
		register_error(elgg_echo("questions:error:question:empty"));
		forward($_SERVER['HTTP_REFERER']);
	}
 	else
 	{
 		$question->title = $new_title;
		$question->access_id = $new_access_id;

 	// Save the new object
		if (!$question->save())
		{
			register_error(elgg_echo("questions:error:question:edit"));
			forward($_SERVER['HTTP_REFERER']);
		}
 		$question->question = $new_question;
		$question->whoanswers = $new_who;
		$question->tags = $new_tags_array;

		// Success message
		system_message(elgg_echo("questions:alert:question:edited"));

		// Remove the cache
		unset($_SESSION['title']); unset($_SESSION['question']); unset($_SESSION['tags']);
		unset($_SESSION['whoanswers']); unset($_SESSION['access']);


		forward($vars['url'] . 'pg/questions/allquestions');
	}



?>