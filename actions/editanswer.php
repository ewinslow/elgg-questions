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

	$answer = get_entity(get_input('answer_guid'));
	$new_answer = get_input('answer');
	$new_tags = get_input('tags');
	$new_tags_array = string_to_tag_array($new_tags);

	$question = new ElggObject($_REQUEST['question_guid']);

	$_SESSION['answer'] = $new_answer;
	$_SESSION['tags'] = $new_tags;

	if (empty($new_answer))
	{
		register_error(elgg_echo("questions:error:answer:empty"));
		forward($_SERVER['HTTP_REFERER']);
	}
	else
    {
		if (!$answer->save())
		{
			register_error(elgg_echo("questions:error:answer:edit"));
			forward($_SERVER['HTTP_REFERER']);
		}

		$answer->answer = $new_answer;
		$answer->tags = $new_tags_array;

		send_mail_to_question_owner($question,$answer);

		// Success message
		system_message(elgg_echo("questions:alert:answer:edited"));

		unset($_SESSION['answer']); unset($_SESSION['tags']);

		forward($vars['url'] . 'pg/questions/viewanswers/' . $question->guid);

    }

    function send_mail_to_question_owner($question, $answer)
    {
    	global $CONFIG;
    	$question_owner = get_user($question->owner_guid);
    	$answer_owner = get_user($answer->owner_guid);

    	$mailto = $question_owner->email;
		$site = get_entity($CONFIG->site_guid);
		$sitename = $site->name;

		$sitenamesubject = utf8_decode($sitename);

		if (is_callable('mb_encode_mimeheader'))
			$sitenamefrom = mb_encode_mimeheader(utf8_decode($sitename),"UTF-8", "B");
		else $sitenamefrom = $sitename;

		$sitenamebody = utf8_decode($sitename);

		$subject = sprintf(elgg_echo("questions:email:subject"), $answer_owner->name, $sitenamesubject);
		if (is_callable('mb_encode_mimeheader'))
			$subject = mb_encode_mimeheader($subject,"UTF-8", "B");

		$from = 'noreply@' . get_site_domain($CONFIG->site_guid);

		$link = $CONFIG->site->url . "pg/questions/viewanswer/" . $question->guid;

		$headers = "From: \"$sitenamefrom\" <$from>\r\n"
			. "Content-Type: text/plain; charset=UTF-8; format=flowed\r\n"
    		. "MIME-Version: 1.0\r\n"
    		. "Content-Transfer-Encoding: 8bit\r\n";

    	$message = sprintf(elgg_echo('questions:email:mailbody'), $question_owner->name, $answer_owner->name, $sitenamebody, $question->question, $answer->answer, $link);
		//if ($message)
		//	$cmessage .= sprintf(elgg_echo('invitations:email:mailbodyuser:message'), utf8_decode($message));
		$message = utf8_encode(html_entity_decode($message));

		mail($mailto,$subject,$message,$headers);
    }
?>