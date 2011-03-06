<?php

$description = get_input('description');
$question_guid = get_input('container_guid');

if (!isset($description)) {
	register_error("You must provide an answer body.");
	forward(REFERER);
}

if (!isset($question_guid)) {
	register_error("You must specify a question to answer.");
	forward(REFERER);
}

$question = get_entity($question_guid);

if (!$question || !$question->canWriteToContainer(0, 'object', 'forum_answer')) {
	register_error("You do not have permission to do that.");
	forward(REFERER);
}

$answer = new ElggForumAnswer();
$answer->description = $description;
$answer->container_guid = $question->guid;
$answer->access_id = $question->access_id;
if ($answer->save()) {
	$answer->unreadAll();
	$answer->read(get_loggedin_userid());
	system_message("Answer posted successfully.");
} else {
	register_error("Failed to post your answer.");
}

forward(REFERER);
