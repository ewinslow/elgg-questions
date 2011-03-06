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
	//action_gatekeeper();

	$title = get_input('title');
	$the_question = get_input('question');
	$tags = get_input('tags');
	$whoanswers = get_input('whoanswers');
	$access_id = get_input('access_id');

	$tags_array = string_to_tag_array($tags);

	$_SESSION['title'] = $title;
	$_SESSION['question'] = $the_question;
	$_SESSION['tags'] = $tags;
	$_SESSION['whoanswers'] = $whoanswers;
	$_SESSION['access_id'] = $access_id;

	if (empty($the_question))
	{
		register_error(elgg_echo("questions:error:question:empty"));
		forward($_SERVER['HTTP_REFERER']);
	}
 	else
    {
		// Initialise a new ElggObject to be the question
		$question = new ElggObject();
		$question->subtype = "question";
		$question->owner_guid = $_SESSION['user']->getGUID();  //set owner
		$question->title = $title;
		$question->description = "Question made by user ".$_SESSION['user']->getGUID();;
		$question->access_id = $access_id;

		// Save the new object
		if (!$question->save())
		{
			register_error(elgg_echo("questions:error:question:save"));
			forward($_SERVER['HTTP_REFERER']);
		}
		$question->question = $the_question;
		$question->answered = 'false';
		$question->open = 'true';
		$question->whoanswers = $whoanswers;
		$question->tags = $tags_array;

		// Success message
		system_message(elgg_echo("questions:alert:question:submitted"));

		// Remove the cache
		unset($_SESSION['title']); unset($_SESSION['question']); unset($_SESSION['tags']);
		unset($_SESSION['whoanswers']); unset($_SESSION['access_id']);

		forward($vars['url'] . 'pg/questions/yournotanswered');

	}

?>